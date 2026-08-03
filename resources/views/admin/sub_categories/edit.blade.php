@extends('admin.layouts.app')

@section('title', 'Edit Sub Category - Admin Unimart')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Edit Sub Category</h1>
            <p class="mt-1 text-[14px] text-ink-500">Update sub-category details, parent category, or image.</p>
        </div>
        <div>
            <a href="{{ route('admin.sub-categories.index') }}" class="inline-flex h-11 items-center gap-2 rounded-base border border-surface-line px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors">
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
                Back to Sub Categories
            </a>
        </div>
    </div>

    <!-- Form Card -->
    <div class="max-w-2xl rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
        <form action="{{ route('admin.sub-categories.update', $subCategory->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Parent Category -->
            <div>
                <label for="category_id" class="block text-[14px] font-semibold text-ink-900 mb-2">Parent Category <span class="text-danger-500">*</span></label>
                <select name="category_id" id="category_id" required class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('category_id') border-danger-500 @enderror">
                    <option value="">Select a Category</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $subCategory->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Sub Category Name -->
            <div>
                <label for="name" class="block text-[14px] font-semibold text-ink-900 mb-2">Sub Category Name <span class="text-danger-500">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name', $subCategory->name) }}" required placeholder="e.g. Smart Phones, Laptops, T-Shirts" class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('name') border-danger-500 @enderror">
                @error('name')
                    <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Slug -->
            <div>
                <label for="slug" class="block text-[14px] font-semibold text-ink-900 mb-2">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $subCategory->slug) }}" placeholder="e.g. smart-phones, laptops" class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('slug') border-danger-500 @enderror">
                @error('slug')
                    <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Sub Category Image -->
            <div>
                <label for="image" class="block text-[14px] font-semibold text-ink-900 mb-2">Sub Category Image</label>
                <div class="flex items-center gap-4 mb-3">
                    @if ($subCategory->image)
                        <div class="h-20 w-20 shrink-0 overflow-hidden rounded-base border border-surface-line bg-surface-body p-1">
                            <img id="current-image" src="{{ asset($subCategory->image) }}" alt="{{ $subCategory->name }}" class="h-full w-full object-cover">
                        </div>
                    @endif
                    <div id="image-preview-container" class="hidden h-20 w-20 shrink-0 overflow-hidden rounded-base border border-brand-500 bg-surface-body p-1">
                        <img id="image-preview" src="#" alt="New Preview" class="h-full w-full object-cover">
                    </div>
                </div>
                <input type="file" name="image" id="image" accept="image/*" class="block w-full text-[14px] text-ink-500 file:mr-4 file:py-2 file:px-4 file:rounded-base file:border-0 file:text-[14px] file:font-semibold file:bg-brand-50 file:text-brand-600 hover:file:bg-brand-100 cursor-pointer">
                <p class="mt-1.5 text-[12px] text-ink-400">Leave blank to keep existing image. Supported formats: JPEG, PNG, WEBP, SVG, GIF (Max: 2MB).</p>
                @error('image')
                    <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div class="flex items-center gap-3 pt-2">
                <input type="checkbox" name="status" id="status" value="1" {{ old('status', $subCategory->status) ? 'checked' : '' }} class="h-4 w-4 rounded border-surface-line text-brand-600 focus:ring-brand-600">
                <label for="status" class="text-[14px] font-semibold text-ink-900 cursor-pointer">Active Status</label>
            </div>

            <!-- Submit Button -->
            <div class="pt-4 flex items-center gap-3">
                <button type="submit" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-6 text-[14px] font-semibold text-white transition-colors hover:bg-brand-700">
                    <i data-lucide="check" class="h-4 w-4"></i>
                    Update Sub Category
                </button>
                <a href="{{ route('admin.sub-categories.index') }}" class="inline-flex h-11 items-center gap-2 rounded-base border border-surface-line px-6 text-[14px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</main>

<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const previewContainer = document.getElementById('image-preview-container');
        const preview = document.getElementById('image-preview');
        const file = e.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.classList.add('hidden');
        }
    });
</script>
@endsection
