{{-- SEO <title> override. Usage: @include('admin.partials.seo-title-field', ['value' => $model->meta_title ?? null]) --}}
@php
    $seoTitleValue = old('meta_title', $value ?? '');
@endphp
<div>
    <label for="meta_title" class="block text-[14px] font-semibold text-ink-900 mb-2">
        SEO Title <span class="text-ink-400 font-normal">(Optional - browser tab &amp; Google title)</span>
    </label>
    <input type="text" name="meta_title" id="meta_title" maxlength="70" value="{{ $seoTitleValue }}"
        placeholder="e.g. Face Serum Sri Lanka – Vitamin C | Nature's Secrets"
        class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('meta_title') border-danger-500 @enderror">
    <p class="mt-1.5 text-[12px] text-ink-400">
        <span data-seo-title-count>{{ mb_strlen($seoTitleValue) }}</span>/70 characters - aim for 50-60.
        Leave blank to use the automatic title.
    </p>
    @error('meta_title')
        <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
    @enderror
</div>
<script>
    (function () {
        var input = document.getElementById('meta_title');
        var count = document.querySelector('[data-seo-title-count]');
        if (!input || !count) return;
        var update = function () {
            var n = input.value.length;
            count.textContent = n;
            count.style.color = n === 0 ? '' : (n >= 50 && n <= 60 ? '#16a34a' : '#d97706');
        };
        input.addEventListener('input', update);
        update();
    })();
</script>
