{{-- SEO <h1> heading. Usage: @include('admin.partials.seo-h1-field', ['value' => $model->h1_heading ?? null]) --}}
@php
    $seoH1Value = old('h1_heading', $value ?? '');
@endphp
<div>
    <label for="h1_heading" class="block text-[14px] font-semibold text-ink-900 mb-2">
        H1 Heading <span class="text-ink-400 font-normal">(Optional - main heading on the page)</span>
    </label>
    <input type="text" name="h1_heading" id="h1_heading" maxlength="120" value="{{ $seoH1Value }}"
        placeholder="e.g. Panda Baby Cologne – Fairy's Touch"
        class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('h1_heading') border-danger-500 @enderror">
    <p class="mt-1.5 text-[12px] text-ink-400">Leave blank to show the name as the heading.</p>
    @error('h1_heading')
        <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
    @enderror
</div>
