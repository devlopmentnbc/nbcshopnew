@extends('admin.layouts.app')

@section('title', 'Home Story Sections - Admin')

@php
    $inputClass = 'h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none';
    $labelClass = 'block text-[14px] font-semibold text-ink-900 mb-2';
    $hintClass = 'mt-1.5 text-[12px] text-ink-400';
    $sectionLabels = [
        1 => 'Shown after the "On Sale" products.',
        2 => 'Shown near the bottom of the home page.',
    ];
@endphp

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Home Story Sections</h1>
            <p class="mt-1 text-[14px] text-ink-500">Edit the two "Award-Winning, World-Class" sections on the home page: text, button, and image or video.</p>
        </div>
        <a href="{{ route('home') }}" target="_blank" rel="noopener" class="inline-flex h-11 items-center gap-2 rounded-base border border-surface-line px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors">
            <i data-lucide="external-link" class="h-4 w-4"></i>
            View Home Page
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-base border border-success-600/20 bg-success-50 p-4 text-success-700">
            <div class="flex items-center gap-3">
                <i data-lucide="check-circle" class="h-5 w-5 text-success-600"></i>
                <p class="text-[14px] font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 rounded-base border border-danger-500/20 bg-danger-50 p-4 text-danger-600">
            <ul class="list-disc pl-5 text-[14px]">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="space-y-6 max-w-4xl">
        @foreach ($sections as $number => $content)
            @php
                // Re-fill the form only for the section that failed validation.
                $isFailedForm = (int) old('_section') === $number;
                $value = fn ($field) => $isFailedForm ? old($field, $content[$field]) : $content[$field];
                $imageUrl = \App\Support\HomeStorySections::url($content['image']);
                $videoUrl = \App\Support\HomeStorySections::url($content['video']);
            @endphp

            <form id="section-{{ $number }}" action="{{ route('admin.settings.home-story.update', $number) }}" method="POST" enctype="multipart/form-data"
                class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-6" data-story-form>
                @csrf
                <input type="hidden" name="_section" value="{{ $number }}">

                <div class="flex flex-wrap items-center justify-between gap-3 border-b border-surface-line pb-3">
                    <div>
                        <h2 class="text-[18px] font-semibold text-ink-900 flex items-center gap-2">
                            <i data-lucide="layout-template" class="h-5 w-5 text-brand-600"></i>
                            Story Section {{ $number }}
                        </h2>
                        <p class="mt-1 text-[13px] text-ink-400">{{ $sectionLabels[$number] ?? '' }}</p>
                    </div>
                    <label class="inline-flex items-center gap-2 text-[14px] font-semibold text-ink-900 cursor-pointer">
                        <input type="checkbox" name="enabled" value="1" {{ $value('enabled') ? 'checked' : '' }} class="h-4 w-4 rounded border-surface-line text-brand-600 focus:ring-brand-600">
                        Show on home page
                    </label>
                </div>

                <!-- Text -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="sm:col-span-2">
                        <label class="{{ $labelClass }}">Small Heading (above the title)</label>
                        <input type="text" name="eyebrow" value="{{ $value('eyebrow') }}" class="{{ $inputClass }}">
                    </div>
                    <div>
                        <label class="{{ $labelClass }}">Title <span class="text-danger-500">*</span></label>
                        <input type="text" name="title" value="{{ $value('title') }}" required class="{{ $inputClass }}">
                    </div>
                    <div>
                        <label class="{{ $labelClass }}">Title Highlight</label>
                        <input type="text" name="title_highlight" value="{{ $value('title_highlight') }}" class="{{ $inputClass }}">
                        <p class="{{ $hintClass }}">Shown after the title in the accent style (e.g. "Eco-friendly Factory").</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="{{ $labelClass }}">Description</label>
                        <textarea name="description" rows="3" class="w-full rounded-base border border-surface-line bg-surface-body px-4 py-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">{{ $value('description') }}</textarea>
                    </div>
                </div>

                <!-- Button -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="{{ $labelClass }}">Button Text</label>
                        <input type="text" name="button_text" value="{{ $value('button_text') }}" class="{{ $inputClass }}">
                        <p class="{{ $hintClass }}">Leave empty to hide the button.</p>
                    </div>
                    <div>
                        <label class="{{ $labelClass }}">Button Link</label>
                        <input type="text" name="button_url" value="{{ $value('button_url') }}" placeholder="https://..." class="{{ $inputClass }}">
                        <label class="mt-2 inline-flex items-center gap-2 text-[13px] text-ink-700 cursor-pointer">
                            <input type="checkbox" name="button_new_tab" value="1" {{ $value('button_new_tab') ? 'checked' : '' }} class="h-4 w-4 rounded border-surface-line text-brand-600 focus:ring-brand-600">
                            Open in a new tab
                        </label>
                    </div>
                </div>

                <!-- Media -->
                <div class="space-y-5 border-t border-surface-line pt-5">
                    <div>
                        <label class="{{ $labelClass }}">Media Type</label>
                        <div class="flex flex-wrap gap-4">
                            @foreach ($mediaTypes as $type => $label)
                                <label class="inline-flex items-center gap-2 text-[14px] text-ink-900 cursor-pointer">
                                    <input type="radio" name="media_type" value="{{ $type }}" {{ $value('media_type') === $type ? 'checked' : '' }} data-media-type class="h-4 w-4 border-surface-line text-brand-600 focus:ring-brand-600">
                                    {{ $label }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div data-media-field="youtube">
                        <label class="{{ $labelClass }}">YouTube Link</label>
                        <input type="text" name="youtube_url" value="{{ $value('youtube_url') }}" placeholder="https://www.youtube.com/watch?v=..." class="{{ $inputClass }}">
                        <p class="{{ $hintClass }}">Any YouTube link works (watch, youtu.be, shorts or embed).</p>
                    </div>

                    <div data-media-field="video">
                        <label class="{{ $labelClass }}">Video File</label>
                        @if ($videoUrl)
                            <video src="{{ $videoUrl }}" controls preload="metadata" class="mb-3 w-full max-w-md rounded-base border border-surface-line bg-black"></video>
                            <label class="mb-3 flex items-center gap-2 text-[13px] text-danger-500 cursor-pointer">
                                <input type="checkbox" name="remove_video" value="1" class="h-4 w-4 rounded border-surface-line">
                                Remove current video
                            </label>
                        @endif
                        <input type="file" name="video" accept="video/mp4,video/webm,video/quicktime" class="block w-full text-[14px] text-ink-500 file:mr-4 file:py-2 file:px-4 file:rounded-base file:border-0 file:text-[14px] file:font-semibold file:bg-brand-50 file:text-brand-600 hover:file:bg-brand-100 cursor-pointer">
                        <p class="{{ $hintClass }}">MP4, WEBM or MOV, up to 40MB. For larger videos, upload to YouTube and use the YouTube option.</p>
                    </div>

                    <div>
                        <label class="{{ $labelClass }}">
                            <span data-image-label="image">Image</span>
                            <span data-image-label="cover">Cover Image (shown before the video plays)</span>
                        </label>
                        @if ($imageUrl)
                            <div class="mb-3 h-40 w-full max-w-md overflow-hidden rounded-base border border-surface-line bg-surface-body">
                                <img src="{{ $imageUrl }}" alt="" class="h-full w-full object-cover">
                            </div>
                            <label class="mb-3 flex items-center gap-2 text-[13px] text-danger-500 cursor-pointer">
                                <input type="checkbox" name="remove_image" value="1" class="h-4 w-4 rounded border-surface-line">
                                Remove current image
                            </label>
                        @endif
                        <input type="file" name="image" accept="image/*" class="block w-full text-[14px] text-ink-500 file:mr-4 file:py-2 file:px-4 file:rounded-base file:border-0 file:text-[14px] file:font-semibold file:bg-brand-50 file:text-brand-600 hover:file:bg-brand-100 cursor-pointer">
                        <p class="{{ $hintClass }}">JPEG, PNG, WEBP or GIF, up to 5MB. Wide (16:9) images fit best. For YouTube videos with no cover image, the YouTube thumbnail is used.</p>
                    </div>

                    <div>
                        <label class="{{ $labelClass }}">Image Description (alt text)</label>
                        <input type="text" name="image_alt" value="{{ $value('image_alt') }}" class="{{ $inputClass }}">
                    </div>
                </div>

                <div class="flex justify-end border-t border-surface-line pt-5">
                    <button type="submit" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-6 text-[14px] font-semibold text-white transition-colors hover:bg-brand-700">
                        <i data-lucide="check" class="h-4 w-4"></i>
                        Save Section {{ $number }}
                    </button>
                </div>
            </form>
        @endforeach
    </div>
</main>

<script>
    // Show only the media fields that apply to the selected media type.
    document.querySelectorAll('[data-story-form]').forEach(function(form) {
        const update = function() {
            const type = form.querySelector('[data-media-type]:checked')?.value || 'image';

            form.querySelectorAll('[data-media-field]').forEach(field => {
                field.hidden = field.dataset.mediaField !== type;
            });
            form.querySelector('[data-image-label="image"]').hidden = type !== 'image';
            form.querySelector('[data-image-label="cover"]').hidden = type === 'image';
        };

        form.addEventListener('change', function(event) {
            if (event.target.matches('[data-media-type]')) update();
        });
        update();
    });
</script>
@endsection
