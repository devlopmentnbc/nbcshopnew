<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 * Background image for the "Our trusted Brands" section on the home page.
 * Stored as a public path in the settings table (key home_brands_bg_image).
 */
class HomeBrandsSettingController extends Controller
{
    public const SETTING_KEY = 'home_brands_bg_image';

    public const DEFAULT_IMAGE = 'assets/images/banner2.webp';

    private const UPLOAD_DIR = 'uploads/home_brands';

    /**
     * Public URL of the current background image (custom upload or the theme default).
     */
    public static function backgroundUrl(): string
    {
        $path = Setting::get(self::SETTING_KEY);

        return asset($path && File::exists(public_path($path)) ? $path : self::DEFAULT_IMAGE);
    }

    public function index()
    {
        $customImage = Setting::get(self::SETTING_KEY);

        return view('admin.settings.home-brands', [
            'imageUrl' => self::backgroundUrl(),
            'isCustom' => (bool) $customImage,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'],
        ]);

        $current = Setting::get(self::SETTING_KEY);

        if ($request->boolean('reset_default')) {
            $this->deleteUpload($current);
            Setting::where('key', self::SETTING_KEY)->delete();

            return back()->with('success', 'Brands section background reset to the default image.');
        }

        if ($request->hasFile('image')) {
            $uploadDir = public_path(self::UPLOAD_DIR);

            if (! File::exists($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }

            $file = $request->file('image');
            $filename = time().'_brands-bg_'.Str::random(6).'.'.$file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);

            $this->deleteUpload($current);
            Setting::set(self::SETTING_KEY, self::UPLOAD_DIR.'/'.$filename);

            return back()->with('success', 'Brands section background image updated successfully.');
        }

        return back()->withErrors(['image' => 'Please choose an image to upload.']);
    }

    private function deleteUpload(?string $path): void
    {
        if ($path && Str::startsWith($path, self::UPLOAD_DIR.'/') && File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
