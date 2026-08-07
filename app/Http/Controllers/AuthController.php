<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

use Laravel\Socialite\Facades\Socialite;

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
            if ($request->wantsJson()) {
                return response()->json(['success' => true, 'redirect' => route('home'), 'message' => 'Logged in successfully.']);
            }
            return redirect()->intended(route('home'))->with('success', 'Logged in successfully.');
        }

        if ($request->wantsJson()) {
            return response()->json(['success' => false, 'message' => 'The provided credentials do not match our records.'], 422);
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
            'phone' => ['nullable', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'accepts_privacy' => ['nullable', 'boolean'],
            'newsletter' => ['nullable', 'boolean'],
            'special_offers' => ['nullable', 'boolean'],
        ]);

        $user = User::create([
            'name' => trim($validated['first_name'].' '.$validated['last_name']),
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'phone' => $validated['phone'] ?? null,
            'email' => $validated['email'],
            'password' => $validated['password'],
            'accepts_privacy' => true,
            'newsletter' => $request->boolean('newsletter'),
            'special_offers' => $request->boolean('special_offers'),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'redirect' => route('home'), 'message' => 'Your account was created successfully.']);
        }

        return redirect()->route('home')->with('success', 'Your account was created successfully.');
    }

    /**
     * Redirect customer to Google OAuth authorization page.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google OAuth callback.
     */
    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->getId())
                ->orWhere('email', $googleUser->getEmail())
                ->first();

            if ($user) {
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar() ?: $user->avatar,
                ]);
            } else {
                $nameParts = explode(' ', $googleUser->getName(), 2);
                $firstName = $nameParts[0] ?? 'User';
                $lastName = $nameParts[1] ?? '';

                $user = User::create([
                    'name' => $googleUser->getName() ?: 'Google User',
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'password' => null,
                    'accepts_privacy' => true,
                ]);
            }

            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->intended(route('home'))->with('success', 'Logged in with Google successfully!');
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['email' => 'Google Login failed: ' . $e->getMessage()], 'login');
        }
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

    public function showProfile()
    {
        $user = Auth::user();

        $allOrders = \App\Models\Order::with('items.product')
            ->where(function($q) use ($user) {
                $q->where('user_id', $user->id)
                  ->orWhere('email', $user->email);
            })
            ->latest()
            ->get();

        $ongoingOrders = $allOrders->filter(function ($order) {
            $status = strtolower($order->status ?? 'pending');
            return !in_array($status, ['completed', 'delivered', 'cancelled']);
        });

        $previousOrders = $allOrders->filter(function ($order) {
            $status = strtolower($order->status ?? '');
            return in_array($status, ['completed', 'delivered', 'cancelled']);
        });

        return view('profile', [
            'user' => $user,
            'allOrders' => $allOrders,
            'ongoingOrders' => $ongoingOrders,
            'previousOrders' => $previousOrders,
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->name = trim($validated['first_name'] . ' ' . $validated['last_name']);
        $user->phone = $validated['phone'] ?? null;
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = $validated['password'];
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }
}
