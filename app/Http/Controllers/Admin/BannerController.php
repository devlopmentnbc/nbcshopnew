<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the banners.
     */
    public function index(Request $request)
    {
        $query = Banner::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%");
        }

        $banners = $query->orderBy('sort_order', 'asc')->latest()->paginate(10)->withQueryString();

        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new banner.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created banner in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'web_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:4096',
            'mobile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:4096',
            'link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        $uploadDir = public_path('uploads/banners');
        if (!File::exists($uploadDir)) {
            File::makeDirectory($uploadDir, 0755, true, true);
        }

        $webImagePath = null;
        if ($request->hasFile('web_image')) {
            $file = $request->file('web_image');
            $filename = time() . '_web_' . Str::slug($request->title ?: 'banner') . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $webImagePath = 'uploads/banners/' . $filename;
        }

        $mobileImagePath = null;
        if ($request->hasFile('mobile_image')) {
            $file = $request->file('mobile_image');
            $filename = time() . '_mobile_' . Str::slug($request->title ?: 'banner') . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $mobileImagePath = 'uploads/banners/' . $filename;
        }

        Banner::create([
            'title' => $request->title,
            'web_image' => $webImagePath,
            'mobile_image' => $mobileImagePath,
            'link' => $request->link,
            'sort_order' => $request->filled('sort_order') ? (int) $request->sort_order : 0,
            'status' => $request->has('status') ? (bool) $request->status : true,
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully.');
    }

    /**
     * Show the form for editing the specified banner.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified banner in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'web_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:4096',
            'mobile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:4096',
            'link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        $uploadDir = public_path('uploads/banners');
        if (!File::exists($uploadDir)) {
            File::makeDirectory($uploadDir, 0755, true, true);
        }

        $webImagePath = $banner->web_image;
        if ($request->hasFile('web_image')) {
            if ($banner->web_image && File::exists(public_path($banner->web_image))) {
                File::delete(public_path($banner->web_image));
            }
            $file = $request->file('web_image');
            $filename = time() . '_web_' . Str::slug($request->title ?: 'banner') . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $webImagePath = 'uploads/banners/' . $filename;
        }

        $mobileImagePath = $banner->mobile_image;
        if ($request->hasFile('mobile_image')) {
            if ($banner->mobile_image && File::exists(public_path($banner->mobile_image))) {
                File::delete(public_path($banner->mobile_image));
            }
            $file = $request->file('mobile_image');
            $filename = time() . '_mobile_' . Str::slug($request->title ?: 'banner') . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $mobileImagePath = 'uploads/banners/' . $filename;
        }

        $banner->update([
            'title' => $request->title,
            'web_image' => $webImagePath,
            'mobile_image' => $mobileImagePath,
            'link' => $request->link,
            'sort_order' => $request->filled('sort_order') ? (int) $request->sort_order : 0,
            'status' => $request->has('status') ? (bool) $request->status : false,
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully.');
    }

    /**
     * Remove the specified banner from storage.
     */
    public function destroy(Banner $banner)
    {
        if ($banner->web_image && File::exists(public_path($banner->web_image))) {
            File::delete(public_path($banner->web_image));
        }

        if ($banner->mobile_image && File::exists(public_path($banner->mobile_image))) {
            File::delete(public_path($banner->mobile_image));
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully.');
    }
}
