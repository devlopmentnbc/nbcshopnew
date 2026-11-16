{{-- SEO meta description. Usage: @include('admin.partials.seo-description-field', ['value' => $model->meta_description ?? null]) --}}
@php
    $seoDescriptionValue = old('meta_description', $value ?? '');
@endphp
<div>
    <label for="meta_description" class="block text-[14px] font-semibold text-ink-900 mb-2">
        Meta Description <span class="text-ink-400 font-normal">(Optional - text shown under the title in Google)</span>
    </label>
    <textarea name="meta_description" id="meta_description" rows="3" maxlength="160"
        placeholder="e.g. A natural face scrub with Sandalwood and Venivel that clears clogged pores. 50ml jar. Shop online today."
        class="w-full rounded-base border border-surface-line bg-surface-body p-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('meta_description') border-danger-500 @enderror">{{ $seoDescriptionValue }}</textarea>
    <p class="mt-1.5 text-[12px] text-ink-400">
        <span data-seo-description-count>{{ mb_strlen($seoDescriptionValue) }}</span>/160 characters - aim for 140-160.
        Leave blank to use an automatic description.
    </p>
    @error('meta_description')
        <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
    @enderror
</div>
<script>
    (function () {
        var input = document.getElementById('meta_description');
        var count = document.querySelector('[data-seo-description-count]');
        if (!input || !count) return;
        var update = function () {
            var n = input.value.length;
            count.textContent = n;
            count.style.color = n === 0 ? '' : (n >= 140 && n <= 160 ? '#16a34a' : '#d97706');
        };
        input.addEventListener('input', update);
        update();
    })();
</script>
