<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\HomeStorySections;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class HomeStorySettingController extends Controller
{
    /**
     * Show the editor for the home page story sections.
     */
    public function index()
    {
        $sections = collect(HomeStorySections::SECTIONS)
            ->mapWithKeys(fn ($section) => [$section => HomeStorySections::get($section)])
            ->all();
        $mediaTypes = HomeStorySections::MEDIA_TYPES;

        return view('admin.settings.home-story', compact('sections', 'mediaTypes'));
    }

    /**
     * Save one story section.
     */
    public function update(Request $request, int $section)
    {
        abort_unless(in_array($section, HomeStorySections::SECTIONS, true), 404);

        $validated = $request->validate([
            'eyebrow' => ['nullable', 'string', 'max:150'],
            'title' => ['required', 'string', 'max:200'],
            'title_highlight' => ['nullable', 'string', 'max:150'],
            'description' => ['nullable', 'string', 'max:1000'],
            'button_text' => ['nullable', 'string', 'max:60'],
            'button_url' => ['nullable', 'string', 'max:500'],
            'media_type' => ['required', Rule::in(array_keys(HomeStorySections::MEDIA_TYPES))],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'],
            'image_alt' => ['nullable', 'string', 'max:200'],
            'youtube_url' => ['nullable', 'string', 'max:500'],
            'video' => ['nullable', 'file', 'mimetypes:video/mp4,video/webm,video/quicktime', 'max:40960'],
        ]);

        $content = HomeStorySections::get($section);

        if ($validated['media_type'] === 'youtube' && ! HomeStorySections::youtubeId($validated['youtube_url'] ?? '')) {
            throw ValidationException::withMessages([
                'youtube_url' => 'Please enter a valid YouTube link (e.g. https://www.youtube.com/watch?v=...).',
            ]);
        }

        if ($request->hasFile('image')) {
            $this->deleteUpload($content['image']);
            $content['image'] = $this->storeUpload($request->file('image'), $section, 'image');
        } elseif ($request->boolean('remove_image')) {
            $this->deleteUpload($content['image']);
            $content['image'] = null;
        }

        if ($request->hasFile('video')) {
            $this->deleteUpload($content['video']);
            $content['video'] = $this->storeUpload($request->file('video'), $section, 'video');
        } elseif ($request->boolean('remove_video')) {
            $this->deleteUpload($content['video']);
            $content['video'] = null;
        }

        if ($validated['media_type'] === 'video' && ! $content['video']) {
            throw ValidationException::withMessages([
                'video' => 'Please upload a video file, or choose a different media type.',
            ]);
        }

        HomeStorySections::save($section, array_merge($content, [
            'enabled' => $request->boolean('enabled'),
            'eyebrow' => $validated['eyebrow'] ?? '',
            'title' => $validated['title'],
            'title_highlight' => $validated['title_highlight'] ?? '',
            'description' => $validated['description'] ?? '',
            'button_text' => $validated['button_text'] ?? '',
            'button_url' => $validated['button_url'] ?? '',
            'button_new_tab' => $request->boolean('button_new_tab'),
            'media_type' => $validated['media_type'],
            'image_alt' => $validated['image_alt'] ?? '',
            'youtube_url' => $validated['youtube_url'] ?? '',
        ]));

        return redirect()
            ->to(route('admin.settings.home-story.index').'#section-'.$section)
            ->with('success', "Story section {$section} updated successfully.");
    }

    private function storeUpload(UploadedFile $file, int $section, string $type): string
    {
        $uploadDir = public_path('uploads/home_story');

        if (! File::exists($uploadDir)) {
            File::makeDirectory($uploadDir, 0755, true, true);
        }

        $filename = time()."_section-{$section}-{$type}_".Str::random(6).'.'.$file->getClientOriginalExtension();
        $file->move($uploadDir, $filename);

        return 'uploads/home_story/'.$filename;
    }

    /**
     * Remove a previously uploaded file (default external URLs are left alone).
     */
    private function deleteUpload(?string $path): void
    {
        if ($path && Str::startsWith($path, 'uploads/home_story/') && File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
