<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showCustomerLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function customerLogin(Request $request)
    {
        $credentials = $request->validateWithBag('login', [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('success', 'Logged in successfully.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ], 'login')->onlyInput('email');
    }

    public function customerRegister(Request $request)
    {
        $validated = $request->validateWithBag('register', [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'accepts_privacy' => ['accepted'],
            'newsletter' => ['nullable', 'boolean'],
            'special_offers' => ['nullable', 'boolean'],
        ]);

        $user = User::create([
            'name' => trim($validated['first_name'].' '.$validated['last_name']),
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'accepts_privacy' => true,
            'newsletter' => $request->boolean('newsletter'),
            'special_offers' => $request->boolean('special_offers'),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'Your account was created successfully.');
    }

    public function sendResetLink(Request $request)
    {
        $credentials = $request->validateWithBag('passwordEmail', [
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink($credentials);

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('password_status', __($status));
        }

        return back()->withErrors([
            'email' => __($status),
        ], 'passwordEmail')->onlyInput('email');
    }

    public function showResetForm(Request $request, string $token)
    {
        return redirect()->route('home', [
            'reset_token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    public function resetPassword(Request $request)
    {
        $credentials = $request->validateWithBag('passwordReset', [
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $status = Password::reset(
            $credentials,
            function (User $user, string $password): void {
                $user->forceFill(['password' => $password]);
                $user->setRememberToken(Str::random(60));
                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('home')->with('success', __($status));
        }

        return back()->withErrors([
            'email' => __($status),
        ], 'passwordReset')->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }
}
