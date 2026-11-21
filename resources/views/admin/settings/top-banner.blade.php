@extends('admin.layouts.app')

@section('title', 'Top Banner - Admin')

@php
    $inputClass = 'h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none';
    $labelClass = 'block text-[14px] font-semibold text-ink-900 mb-2';
    $colorFields = [
        'color_start' => 'Gradient Color 1 (left)',
        'color_end' => 'Gradient Color 2 (right)',
        'text_color' => 'Text Color',
    ];
@endphp

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Top Banner</h1>
            <p class="mt-1 text-[14px] text-ink-500">The small sliding banner shown above the header on every page of the store.</p>
        </div>
        <a href="{{ route('home') }}" target="_blank" rel="noopener" class="inline-flex h-11 items-center gap-2 rounded-base border border-surface-line px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors">
            <i data-lucide="external-link" class="h-4 w-4"></i>
            View Store
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

    <form action="{{ route('admin.settings.top-banner.update') }}" method="POST"
        class="max-w-4xl rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-6">
        @csrf

        {{-- Live preview --}}
        <div>
            <label class="{{ $labelClass }}">Preview</label>
            <div id="tb-preview" class="flex h-10 items-center justify-center gap-3 overflow-hidden rounded-base px-4 text-[14px] font-medium whitespace-nowrap"
                style="background: linear-gradient(90deg, {{ old('color_start', $banner['color_start']) }}, {{ old('color_end', $banner['color_end']) }}); color: {{ old('text_color', $banner['text_color']) }};">
                <span id="tb-preview-text">{{ old('text', $banner['text']) }}</span>
                <span id="tb-preview-btn" class="font-bold underline underline-offset-2">{{ old('button_text', $banner['button_text']) }}</span>
            </div>
            <p class="mt-1.5 text-[12px] text-ink-400">On the store, this message slides from top to bottom, like before.</p>
        </div>

        <label class="flex items-center gap-3 cursor-pointer">
            <input type="hidden" name="enabled" value="0">
            <input type="checkbox" name="enabled" value="1" class="h-4 w-4 accent-brand-600" @checked(old('enabled', $banner['enabled']))>
            <span class="text-[14px] font-semibold text-ink-900">Show the top banner on the store</span>
        </label>

        <div class="border-t border-surface-line pt-5">
            <h2 class="text-[18px] font-semibold text-ink-900 flex items-center gap-2 mb-4">
                <i data-lucide="type" class="h-5 w-5 text-brand-600"></i>
                Text
            </h2>
            <div class="grid gap-4 md:grid-cols-[1fr_200px_140px]">
                <div>
                    <label for="tb-text" class="{{ $labelClass }}">Banner Text</label>
                    <input id="tb-text" type="text" name="text" maxlength="200" required value="{{ old('text', $banner['text']) }}" class="{{ $inputClass }}">
                </div>
                <div>
                    <label for="tb-button" class="{{ $labelClass }}">Button Text</label>
                    <input id="tb-button" type="text" name="button_text" maxlength="40" required value="{{ old('button_text', $banner['button_text']) }}" class="{{ $inputClass }}">
                </div>
                <div>
                    <label for="tb-repeat" class="{{ $labelClass }}">Repeat</label>
                    <input id="tb-repeat" type="number" name="repeat" min="1" max="10" required value="{{ old('repeat', $banner['repeat']) }}" class="{{ $inputClass }}">
                </div>
            </div>
            <p class="mt-1.5 text-[12px] text-ink-400">"Repeat" is how many slides the message rotates through (top to bottom). Minimum 2.</p>
        </div>

        <div class="border-t border-surface-line pt-5">
            <h2 class="text-[18px] font-semibold text-ink-900 flex items-center gap-2 mb-4">
                <i data-lucide="palette" class="h-5 w-5 text-brand-600"></i>
                Colors
            </h2>
            <div class="grid gap-4 sm:grid-cols-3">
                @foreach ($colorFields as $field => $label)
                    <div>
                        <label for="tb-{{ $field }}" class="{{ $labelClass }}">{{ $label }}</label>
                        <div class="flex items-center gap-2">
                            <input type="color" id="tb-{{ $field }}" data-color-picker="{{ $field }}" value="{{ old($field, $banner[$field]) }}"
                                class="h-11 w-14 shrink-0 cursor-pointer rounded-base border border-surface-line bg-surface-body p-1">
                            <input type="text" name="{{ $field }}" data-color-text="{{ $field }}" value="{{ old($field, $banner[$field]) }}"
                                pattern="#[0-9a-fA-F]{6}" maxlength="7" required class="{{ $inputClass }} font-mono uppercase">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="border-t border-surface-line pt-5">
            <h2 class="text-[18px] font-semibold text-ink-900 flex items-center gap-2 mb-4">
                <i data-lucide="link" class="h-5 w-5 text-brand-600"></i>
                Button Link
            </h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label for="tb-link-type" class="{{ $labelClass }}">When "{{ $banner['button_text'] }}" is clicked, open</label>
                    <select id="tb-link-type" name="link_type" class="{{ $inputClass }}">
                        @foreach ($linkTypes as $value => $label)
                            <option value="{{ $value }}" @selected(old('link_type', $banner['link_type']) === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="tb-product-wrap">
                    <label for="tb-product" class="{{ $labelClass }}">Product</label>
                    <input type="search" id="tb-product-search" placeholder="Type to filter products..." class="{{ $inputClass }} mb-2">
                    <select id="tb-product" name="product_id" class="{{ $inputClass }}">
                        <option value="">-- Choose a product --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" @selected((string) old('product_id', $banner['product_id']) === (string) $product->id)>
                                {{ $product->name }}{{ $product->status ? '' : ' (inactive)' }}
                            </option>
                        @endforeach
                    </select>
                    <p class="mt-1.5 text-[12px] text-ink-400">If this product is later deleted or made inactive, the button opens the Shop page instead.</p>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap items-center gap-3 border-t border-surface-line pt-5">
            <button type="submit" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-5 text-[14px] font-semibold text-white hover:bg-brand-700 transition-colors">
                <i data-lucide="save" class="h-4 w-4"></i>
                Save Banner
            </button>
        </div>
    </form>
</main>

<script>
    (function () {
        const $ = (sel) => document.querySelector(sel);
        const preview = $('#tb-preview');
        const hex = /^#[0-9a-fA-F]{6}$/;

        function color(field) {
            const v = document.querySelector('[data-color-text="' + field + '"]').value.trim();
            return hex.test(v) ? v : null;
        }

        function render() {
            const start = color('color_start'), end = color('color_end'), text = color('text_color');
            if (start && end) preview.style.background = 'linear-gradient(90deg, ' + start + ', ' + end + ')';
            if (text) preview.style.color = text;
            $('#tb-preview-text').textContent = $('#tb-text').value;
            $('#tb-preview-btn').textContent = $('#tb-button').value;
        }

        // Keep each colour picker and its hex text box in sync.
        document.querySelectorAll('[data-color-picker]').forEach(function (picker) {
            const textBox = document.querySelector('[data-color-text="' + picker.dataset.colorPicker + '"]');
            picker.addEventListener('input', function () { textBox.value = picker.value; render(); });
            textBox.addEventListener('input', function () {
                if (hex.test(textBox.value.trim())) picker.value = textBox.value.trim().toLowerCase();
                render();
            });
        });
        $('#tb-text').addEventListener('input', render);
        $('#tb-button').addEventListener('input', render);

        // Product picker only matters for "A specific product".
        const linkType = $('#tb-link-type');
        const productWrap = $('#tb-product-wrap');
        const productSelect = $('#tb-product');
        function toggleProduct() {
            const show = linkType.value === 'product';
            productWrap.style.display = show ? '' : 'none';
            productSelect.required = show;
        }
        linkType.addEventListener('change', toggleProduct);
        toggleProduct();

        // Simple filter for long product lists.
        $('#tb-product-search').addEventListener('input', function () {
            const q = this.value.trim().toLowerCase();
            Array.from(productSelect.options).forEach(function (opt) {
                if (!opt.value) return;
                opt.hidden = q !== '' && !opt.textContent.toLowerCase().includes(q) && !opt.selected;
            });
        });
    })();
</script>
@endsection
