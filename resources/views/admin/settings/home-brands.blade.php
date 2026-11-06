@extends('admin.layouts.app')

@section('title', 'Brands Section Background - Admin')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Brands Section Background</h1>
            <p class="mt-1 text-[14px] text-ink-500">Change the background image of the "Our trusted Brands" section on the home page.</p>
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

    <form action="{{ route('admin.settings.home-brands.update') }}" method="POST" enctype="multipart/form-data"
        class="max-w-4xl rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-6">
        @csrf

        <div class="border-b border-surface-line pb-3">
            <h2 class="text-[18px] font-semibold text-ink-900 flex items-center gap-2">
                <i data-lucide="image" class="h-5 w-5 text-brand-600"></i>
                Background Image
            </h2>
            <p class="mt-1 text-[13px] text-ink-400">
                {{ $isCustom ? 'A custom image is currently in use.' : 'The default theme image is currently in use.' }}
            </p>
        </div>

        <div>
            <label class="block text-[14px] font-semibold text-ink-900 mb-2">Current Image</label>
            <div class="aspect-[16/5] w-full overflow-hidden rounded-base border border-surface-line bg-surface-muted">
                <img id="brands-bg-preview" src="{{ $imageUrl }}" alt="Brands section background" class="h-full w-full object-cover">
            </div>
        </div>

        <div>
            <label class="block text-[14px] font-semibold text-ink-900 mb-2">Upload New Image</label>
            <input type="file" name="image" accept="image/*" id="brands-bg-input" class="block w-full text-[14px] text-ink-500 file:mr-4 file:py-2 file:px-4 file:rounded-base file:border-0 file:text-[14px] file:font-semibold file:bg-brand-50 file:text-brand-600 hover:file:bg-brand-100 cursor-pointer">
            <p class="mt-1.5 text-[12px] text-ink-400">JPEG, PNG, WEBP or GIF, up to 5MB. A wide image (about 1920 × 600px) works best.</p>
        </div>

        <div class="flex flex-wrap items-center gap-3 border-t border-surface-line pt-5">
            <button type="submit" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-5 text-[14px] font-semibold text-white hover:bg-brand-700 transition-colors">
                <i data-lucide="save" class="h-4 w-4"></i>
                Save Image
            </button>
            @if ($isCustom)
                <button type="submit" name="reset_default" value="1" onclick="return confirm('Remove the custom image and use the default background?');"
                    class="inline-flex h-11 items-center gap-2 rounded-base border border-danger-500/30 px-5 text-[14px] font-semibold text-danger-600 hover:bg-danger-50 transition-colors">
                    <i data-lucide="rotate-ccw" class="h-4 w-4"></i>
                    Reset to Default
                </button>
            @endif
        </div>
    </form>
</main>

<script>
    // Preview the chosen file before saving.
    document.getElementById('brands-bg-input').addEventListener('change', function () {
        const file = this.files && this.files[0];
        if (file) {
            document.getElementById('brands-bg-preview').src = URL.createObjectURL(file);
        }
    });
</script>
@endsection
