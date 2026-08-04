@extends('admin.layouts.app')

@section('title', 'Edit Banner - Admin Unimart')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Edit Banner</h1>
            <p class="mt-1 text-[14px] text-ink-500">Update Web and Mobile banners for the homepage hero section.</p>
        </div>
        <div>
            <a href="{{ route('admin.banners.index') }}" class="inline-flex h-11 items-center gap-2 rounded-base border border-surface-line px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors">
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
                Back to Banners
            </a>
        </div>
    </div>

    <!-- Form Card -->
    <div class="max-w-2xl rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
        <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Banner Title -->
            <div>
                <label for="title" class="block text-[14px] font-semibold text-ink-900 mb-2">Banner Title <span class="text-ink-400 font-normal">(Optional)</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $banner->title) }}" placeholder="e.g. Summer Special Sale" class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('title') border-danger-500 @enderror">
                @error('title')
                    <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Web Banner Image -->
            <div>
                <label for="web_image" class="block text-[14px] font-semibold text-ink-900 mb-2">Web Banner Image (Desktop View)</label>
                <div class="space-y-3">
                    <div id="web-preview-container" class="h-32 w-full overflow-hidden rounded-base border border-surface-line bg-surface-body p-1">
                        <img id="web-preview" src="{{ asset($banner->web_image) }}" alt="Web Preview" class="h-full w-full object-cover rounded">
                    </div>
                    <input type="file" name="web_image" id="web_image" accept="image/*" class="block w-full text-[14px] text-ink-500 file:mr-4 file:py-2 file:px-4 file:rounded-base file:border-0 file:text-[14px] file:font-semibold file:bg-brand-50 file:text-brand-600 hover:file:bg-brand-100 cursor-pointer">
                    <p class="text-[12px] text-ink-400">Leave blank to keep existing Web banner image.</p>
                </div>
                @error('web_image')
                    <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mobile Banner Image -->
            <div>
                <label for="mobile_image" class="block text-[14px] font-semibold text-ink-900 mb-2">Mobile Banner Image (Mobile View)</label>
                <div class="space-y-3">
                    <div id="mobile-preview-container" class="{{ $banner->mobile_image ? '' : 'hidden' }} h-32 w-48 overflow-hidden rounded-base border border-surface-line bg-surface-body p-1">
                        <img id="mobile-preview" src="{{ $banner->mobile_image ? asset($banner->mobile_image) : '#' }}" alt="Mobile Preview" class="h-full w-full object-cover rounded">
                    </div>
                    <input type="file" name="mobile_image" id="mobile_image" accept="image/*" class="block w-full text-[14px] text-ink-500 file:mr-4 file:py-2 file:px-4 file:rounded-base file:border-0 file:text-[14px] file:font-semibold file:bg-brand-50 file:text-brand-600 hover:file:bg-brand-100 cursor-pointer">
                    <p class="text-[12px] text-ink-400">Leave blank to keep current mobile image (or fallback to web image if none).</p>
                </div>
                @error('mobile_image')
                    <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Target Link / URL -->
            <div>
                <label for="link" class="block text-[14px] font-semibold text-ink-900 mb-2">Target Link / Redirection URL <span class="text-ink-400 font-normal">(Optional)</span></label>
                <input type="url" name="link" id="link" value="{{ old('link', $banner->link) }}" placeholder="e.g. https://example.com/shop or /shop" class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('link') border-danger-500 @enderror">
                @error('link')
                    <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Sort Order -->
            <div>
                <label for="sort_order" class="block text-[14px] font-semibold text-ink-900 mb-2">Sort Order <span class="text-ink-400 font-normal">(Lower numbers display first)</span></label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $banner->sort_order) }}" min="0" class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('sort_order') border-danger-500 @enderror">
                @error('sort_order')
                    <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div class="flex items-center gap-3 pt-2">
                <input type="checkbox" name="status" id="status" value="1" {{ old('status', $banner->status) ? 'checked' : '' }} class="h-4 w-4 rounded border-surface-line text-brand-600 focus:ring-brand-600">
                <label for="status" class="text-[14px] font-semibold text-ink-900 cursor-pointer">Active Status (Visible on Homepage)</label>
            </div>

            <!-- Submit Button -->
            <div class="pt-4 flex items-center gap-3">
                <button type="submit" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-6 text-[14px] font-semibold text-white transition-colors hover:bg-brand-700">
                    <i data-lucide="check" class="h-4 w-4"></i>
                    Update Banner
                </button>
                <a href="{{ route('admin.banners.index') }}" class="inline-flex h-11 items-center gap-2 rounded-base border border-surface-line px-6 text-[14px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</main>

<script>
    function setupImagePreview(inputId, previewContainerId, previewId) {
        document.getElementById(inputId).addEventListener('change', function(e) {
            const previewContainer = document.getElementById(previewContainerId);
            const preview = document.getElementById(previewId);
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    }

    setupImagePreview('web_image', 'web-preview-container', 'web-preview');
    setupImagePreview('mobile_image', 'mobile-preview-container', 'mobile-preview');
</script>
@endsection
