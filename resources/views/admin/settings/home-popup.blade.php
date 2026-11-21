@extends('admin.layouts.app')

@section('title', 'Home Popup - Admin')

@php
    $inputClass = 'h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none';
    $labelClass = 'block text-[14px] font-semibold text-ink-900 mb-2';
    $hintClass = 'mt-1.5 text-[12px] text-ink-400';
    // One picker per link type: [field, label, options, option label callback]
    $pickers = [
        'product' => ['product_id', 'Product', $products, fn ($p) => $p->name],
        'category' => ['category_id', 'Product range (category)', $categories, fn ($c) => $c->name],
        'sub_category' => ['sub_category_id', 'Sub category', $subCategories, fn ($s) => ($s->category->name ?? '-') . ' › ' . $s->name],
        'brand' => ['brand_id', 'Brand', $brands, fn ($b) => $b->name],
    ];
@endphp

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Home Popup</h1>
            <p class="mt-1 text-[14px] text-ink-500">A popup with an image, message and button, shown when a visitor opens the home page.</p>
        </div>
        <a href="{{ route('home') }}?popup_preview=1" target="_blank" rel="noopener" class="inline-flex h-11 items-center gap-2 rounded-base border border-surface-line px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors">
            <i data-lucide="external-link" class="h-4 w-4"></i>
            Preview on Store
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

    <form action="{{ route('admin.settings.home-popup.update') }}" method="POST" enctype="multipart/form-data"
        class="max-w-4xl rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-6">
        @csrf

        <label class="flex items-center gap-3 cursor-pointer">
            <input type="hidden" name="enabled" value="0">
            <input type="checkbox" name="enabled" value="1" class="h-4 w-4 accent-brand-600" @checked(old('enabled', $popup['enabled']))>
            <span class="text-[14px] font-semibold text-ink-900">Show the popup on the home page</span>
        </label>

        {{-- Image --}}
        <div class="border-t border-surface-line pt-5">
            <h2 class="text-[18px] font-semibold text-ink-900 flex items-center gap-2 mb-4">
                <i data-lucide="image" class="h-5 w-5 text-brand-600"></i>
                Image
            </h2>
            <div class="grid gap-4 md:grid-cols-[220px_1fr] items-start">
                <div class="aspect-[3/4] w-full overflow-hidden rounded-base border border-surface-line bg-surface-body flex items-center justify-center">
                    <img id="hp-image-preview" src="{{ $imageUrl }}" alt="" class="h-full w-full object-cover {{ $imageUrl ? '' : 'hidden' }}">
                    <span id="hp-image-empty" class="text-[13px] text-ink-400 {{ $imageUrl ? 'hidden' : '' }}">No image</span>
                </div>
                <div class="space-y-3">
                    <input type="file" name="image" id="hp-image" accept="image/jpeg,image/png,image/webp,image/gif"
                        class="block w-full text-[14px] text-ink-700 file:mr-3 file:rounded-base file:border-0 file:bg-brand-50 file:px-4 file:py-2 file:font-semibold file:text-brand-600">
                    <p class="{{ $hintClass }}">JPG, PNG, WEBP or GIF, max 5 MB. Shown on the left half of the popup (on top on phones). A portrait or square image works best.</p>
                    @if ($imageUrl)
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="remove_image" value="1" class="h-4 w-4 accent-danger-600">
                            <span class="text-[13px] text-danger-600 font-semibold">Remove current image</span>
                        </label>
                    @endif
                </div>
            </div>
        </div>

        {{-- Text --}}
        <div class="border-t border-surface-line pt-5">
            <h2 class="text-[18px] font-semibold text-ink-900 flex items-center gap-2 mb-4">
                <i data-lucide="type" class="h-5 w-5 text-brand-600"></i>
                Message
            </h2>
            <div class="space-y-4">
                <div>
                    <label for="hp-title" class="{{ $labelClass }}">Title</label>
                    <input id="hp-title" type="text" name="title" maxlength="150" value="{{ old('title', $popup['title']) }}"
                        placeholder="e.g. Cellengy Ashwagandha Root Extract Capsules." class="{{ $inputClass }}">
                </div>
                <div>
                    <label for="hp-message" class="{{ $labelClass }}">Message</label>
                    <textarea id="hp-message" name="message" rows="3" maxlength="500"
                        placeholder="e.g. KSM-66 world's Best Ashwagandha"
                        class="w-full rounded-base border border-surface-line bg-surface-body px-4 py-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">{{ old('message', $popup['message']) }}</textarea>
                </div>
                <div class="md:w-1/2">
                    <label for="hp-button" class="{{ $labelClass }}">Button Text</label>
                    <input id="hp-button" type="text" name="button_text" maxlength="40" required value="{{ old('button_text', $popup['button_text']) }}" class="{{ $inputClass }}">
                </div>
            </div>
        </div>

        {{-- Link --}}
        <div class="border-t border-surface-line pt-5">
            <h2 class="text-[18px] font-semibold text-ink-900 flex items-center gap-2 mb-4">
                <i data-lucide="link" class="h-5 w-5 text-brand-600"></i>
                Button Link
            </h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label for="hp-link-type" class="{{ $labelClass }}">When the button is clicked, open</label>
                    <select id="hp-link-type" name="link_type" class="{{ $inputClass }}">
                        @foreach ($linkTypes as $value => $label)
                            <option value="{{ $value }}" @selected(old('link_type', $popup['link_type']) === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                @foreach ($pickers as $type => [$field, $label, $options, $optionLabel])
                    <div data-link-picker="{{ $type }}">
                        <label for="hp-{{ $field }}" class="{{ $labelClass }}">{{ $label }}</label>
                        <input type="search" data-filter-for="hp-{{ $field }}" placeholder="Type to filter..." class="{{ $inputClass }} mb-2">
                        <select id="hp-{{ $field }}" name="{{ $field }}" class="{{ $inputClass }}">
                            <option value="">-- Choose --</option>
                            @foreach ($options as $option)
                                <option value="{{ $option->id }}" @selected((string) old($field, $popup[$field]) === (string) $option->id)>
                                    {{ $optionLabel($option) }}{{ $option->status ? '' : ' (inactive)' }}
                                </option>
                            @endforeach
                        </select>
                        <p class="{{ $hintClass }}">If this is later deleted or made inactive, the button opens the Shop page instead.</p>
                    </div>
                @endforeach

                <div data-link-picker="url">
                    <label for="hp-custom-url" class="{{ $labelClass }}">Link</label>
                    <input id="hp-custom-url" type="text" name="custom_url" maxlength="500" value="{{ old('custom_url', $popup['custom_url']) }}"
                        placeholder="https://... or /shop?..." class="{{ $inputClass }}">
                </div>
            </div>
        </div>

        {{-- When --}}
        <div class="border-t border-surface-line pt-5">
            <h2 class="text-[18px] font-semibold text-ink-900 flex items-center gap-2 mb-4">
                <i data-lucide="clock" class="h-5 w-5 text-brand-600"></i>
                When to Show
            </h2>
            <div class="grid gap-4 md:grid-cols-[1fr_200px]">
                <div>
                    <label for="hp-frequency" class="{{ $labelClass }}">How often</label>
                    <select id="hp-frequency" name="frequency" class="{{ $inputClass }}">
                        @foreach ($frequencies as $value => $label)
                            <option value="{{ $value }}" @selected(old('frequency', $popup['frequency']) === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                    <p class="{{ $hintClass }}">Saving this page shows the popup again to everyone, even if they closed it before.</p>
                </div>
                <div>
                    <label for="hp-delay" class="{{ $labelClass }}">Delay (seconds)</label>
                    <input id="hp-delay" type="number" name="delay" min="0" max="60" required value="{{ old('delay', $popup['delay']) }}" class="{{ $inputClass }}">
                </div>
            </div>
        </div>

        <div class="border-t border-surface-line pt-5">
            <button type="submit" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-5 text-[14px] font-semibold text-white hover:bg-brand-700 transition-colors">
                <i data-lucide="save" class="h-4 w-4"></i>
                Save Popup
            </button>
        </div>
    </form>
</main>

<script>
    (function () {
        // Show only the picker that matches the chosen link type.
        const linkType = document.getElementById('hp-link-type');
        function togglePickers() {
            document.querySelectorAll('[data-link-picker]').forEach(function (el) {
                const show = el.dataset.linkPicker === linkType.value;
                el.style.display = show ? '' : 'none';
                el.querySelectorAll('select, input[name]').forEach(function (f) { f.required = show; });
            });
        }
        linkType.addEventListener('change', togglePickers);
        togglePickers();

        // Simple filter for long lists.
        document.querySelectorAll('[data-filter-for]').forEach(function (box) {
            const select = document.getElementById(box.dataset.filterFor);
            box.addEventListener('input', function () {
                const q = box.value.trim().toLowerCase();
                Array.from(select.options).forEach(function (opt) {
                    if (!opt.value) return;
                    opt.hidden = q !== '' && !opt.textContent.toLowerCase().includes(q) && !opt.selected;
                });
            });
        });

        // Live image preview.
        const file = document.getElementById('hp-image');
        file.addEventListener('change', function () {
            if (!file.files[0]) return;
            const img = document.getElementById('hp-image-preview');
            img.src = URL.createObjectURL(file.files[0]);
            img.classList.remove('hidden');
            document.getElementById('hp-image-empty').classList.add('hidden');
        });
    })();
</script>
@endsection
