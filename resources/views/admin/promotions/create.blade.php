@extends('admin.layouts.app')

@section('title', 'Add New Promotion - Admin NBC')

@section('content')
    <main class="min-h-[calc(100vh-140px)] px-4 py-6 lg:px-6">
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <div>
                <h1 class="text-[24px] font-semibold text-ink-900">Add New Promotion</h1>
                <p class="mt-1 text-[14px] text-ink-500">Create and schedule an offer for a product or catalogue range.</p>
            </div>
            <a href="{{ route('admin.promotions.index') }}"
                class="inline-flex h-11 items-center gap-2 rounded-base border border-surface-line px-4 text-[14px] font-semibold text-ink-700 transition-colors hover:bg-surface-muted">
                <i data-lucide="arrow-left" class="h-4 w-4"></i> Back to Promotions
            </a>
        </div>


        <form action="{{ route('admin.promotions.store') }}"
            method="POST" enctype="multipart/form-data"
            class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card lg:p-8">
            @csrf

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <div class="space-y-6 lg:col-span-2">
                    <section class="space-y-5">
                        <div class="border-b border-surface-line pb-3">
                            <h2 class="text-[18px] font-semibold text-ink-900">Promotion Details</h2>
                            <p class="mt-1 text-[13px] text-ink-500">The name, URL slug and message shown for this campaign.
                            </p>
                        </div>

                        <div>
                            <label for="name" class="mb-2 block text-[14px] font-semibold text-ink-900">Promotion Name
                                <span class="text-danger-500">*</span></label>
                            <input id="name" name="name" type="text" required maxlength="255"
                                value="{{ old('name') }}"
                                placeholder="e.g. Avocado Body Care Weekend"
                                class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('name') border-danger-500 @enderror">
                            @error('name')
                                <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                            <div>
                                <label for="promotion_label" class="mb-2 block text-[14px] font-semibold text-ink-900">Small Promotion Label
                                    <span class="text-danger-500">*</span></label>
                                <input id="promotion_label" name="promotion_label" type="text" required maxlength="255"
                                    value="{{ old('promotion_label', 'Limited-time promotion') }}"
                                    placeholder="e.g. Limited-time promotion"
                                    class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('promotion_label') border-danger-500 @enderror">
                                @error('promotion_label')
                                    <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="button_text" class="mb-2 block text-[14px] font-semibold text-ink-900">Button Text
                                    <span class="text-danger-500">*</span></label>
                                <input id="button_text" name="button_text" type="text" required maxlength="60"
                                    value="{{ old('button_text', 'Know More') }}" placeholder="e.g. Shop the Offer"
                                    class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('button_text') border-danger-500 @enderror">
                                @error('button_text')
                                    <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="slug" class="mb-2 block text-[14px] font-semibold text-ink-900">Slug <span
                                    class="font-normal text-ink-400">(auto-generated when blank)</span></label>
                            <input id="slug" name="slug" type="text" maxlength="255"
                                value="{{ old('slug') }}" placeholder="avocado-body-care-weekend"
                                class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('slug') border-danger-500 @enderror">
                            @error('slug')
                                <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description"
                                class="mb-2 block text-[14px] font-semibold text-ink-900">Description</label>
                            <textarea id="description" name="description" rows="6" maxlength="5000"
                                placeholder="Describe the offer, eligibility and customer-facing message..."
                                class="w-full rounded-base border border-surface-line bg-surface-body p-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('description') border-danger-500 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </section>

                    <section class="space-y-5 border-t border-surface-line pt-6">
                        <div class="border-b border-surface-line pb-3">
                            <h2 class="text-[18px] font-semibold text-ink-900">Promotion Applies To</h2>
                            <p class="mt-1 text-[13px] text-ink-500">Choose the catalogue range covered by this promotion.
                            </p>
                        </div>

                        <div>
                            <label for="target_type" class="mb-2 block text-[14px] font-semibold text-ink-900">Target Type
                                <span class="text-danger-500">*</span></label>
                            <select id="target_type" name="target_type" required
                                class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('target_type') border-danger-500 @enderror">
                                @foreach ($targetTypes as $value => $label)
                                    <option value="{{ $value }}" @selected(old('target_type', 'all_products') === $value)>{{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('target_type')
                                <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="promotion-target-wrapper">
                            <label id="promotion-target-label" for="target_search"
                                class="mb-2 block text-[14px] font-semibold text-ink-900">Select Target <span
                                    class="text-danger-500">*</span></label>
                            <div class="relative">
                                <input id="target_search" type="text" list="promotion-target-options" autocomplete="off"
                                    class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none pr-11 @error('target_id') border-danger-500 @enderror">
                                <i data-lucide="search"
                                    class="pointer-events-none absolute right-4 top-1/2 h-4 w-4 -translate-y-1/2 text-ink-400"></i>
                            </div>
                            <datalist id="promotion-target-options"></datalist>
                            <input id="target_id" name="target_id" type="hidden" value="{{ old('target_id') }}">
                            <p id="promotion-target-help" class="mt-1.5 text-[12px] text-ink-400"></p>
                            @error('target_id')
                                <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </section>
                </div>

                <div class="space-y-6 border-t border-surface-line pt-6 lg:border-l lg:border-t-0 lg:pl-6 lg:pt-0">
                    <section class="space-y-5">
                        <h2 class="border-b border-surface-line pb-3 text-[18px] font-semibold text-ink-900">Schedule</h2>

                        <div>
                            <label for="starts_at" class="mb-2 block text-[14px] font-semibold text-ink-900">Starting Date &
                                Time <span class="text-danger-500">*</span></label>
                            <div class="relative">
                                <input id="starts_at" name="starts_at" type="datetime-local" required
                                    value="{{ old('starts_at', now()->format('Y-m-d\TH:i')) }}"
                                    class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none pr-12 cursor-pointer @error('starts_at') border-danger-500 @enderror">
                                <button type="button" data-open-picker="starts_at" aria-label="Open starting date calendar"
                                    class="absolute right-1 top-1/2 inline-flex h-9 w-9 -translate-y-1/2 items-center justify-center rounded-base text-brand-600 hover:bg-brand-50">
                                    <i data-lucide="calendar-clock" class="h-5 w-5"></i>
                                </button>
                            </div>
                            @error('starts_at')
                                <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="ends_at" class="mb-2 block text-[14px] font-semibold text-ink-900">Ending Date &
                                Time <span class="text-danger-500">*</span></label>
                            <div class="relative">
                                <input id="ends_at" name="ends_at" type="datetime-local" required
                                    value="{{ old('ends_at', now()->addWeek()->format('Y-m-d\TH:i')) }}"
                                    class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none pr-12 cursor-pointer @error('ends_at') border-danger-500 @enderror">
                                <button type="button" data-open-picker="ends_at" aria-label="Open ending date calendar"
                                    class="absolute right-1 top-1/2 inline-flex h-9 w-9 -translate-y-1/2 items-center justify-center rounded-base text-brand-600 hover:bg-brand-50">
                                    <i data-lucide="calendar-clock" class="h-5 w-5"></i>
                                </button>
                            </div>
                            @error('ends_at')
                                <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <label
                            class="flex cursor-pointer items-center gap-3 rounded-base border border-surface-line bg-surface-body p-3">
                            <input type="checkbox" name="status" value="1" @checked(old('status', true))
                                class="h-4 w-4 rounded border-surface-line text-brand-600 focus:ring-brand-600">
                            <span>
                                <strong class="block text-[14px] text-ink-900">Enabled</strong>
                                <small class="text-[12px] text-ink-500">Scheduling only takes effect while enabled.</small>
                            </span>
                        </label>
                    </section>

                    <section class="space-y-4 border-t border-surface-line pt-6">
                        <h2 class="border-b border-surface-line pb-3 text-[18px] font-semibold text-ink-900">Promotion
                            Image</h2>

                        <label for="image"
                            class="relative flex h-56 cursor-pointer items-center justify-center overflow-hidden rounded-card border-2 border-dashed border-surface-line bg-surface-body p-3 text-center transition-colors hover:border-brand-600 hover:bg-brand-50/40">
                            <img id="image-preview"
                                src="#"
                                alt="Promotion preview"
                                class="hidden h-full w-full rounded-base object-contain">
                            <span id="image-upload-placeholder"
                                class="flex flex-col items-center">
                                <span
                                    class="mb-3 inline-flex h-11 w-11 items-center justify-center rounded-full bg-brand-50 text-brand-600"><i
                                        data-lucide="image-up" class="h-5 w-5"></i></span>
                                <strong class="text-[14px] text-ink-900">Choose promotion image</strong>
                            </span>
                        </label>
                        <input type="file" name="image" id="image"
                            accept="image/jpeg,image/png,image/webp,image/gif" required
                            class="sr-only">
                        <p id="image-file-name" class="truncate text-[12px] font-medium text-brand-600">
                            No image selected</p>
                        @error('image')
                            <p class="text-[13px] text-danger-500">{{ $message }}</p>
                        @enderror
                        <p class="text-[12px] text-ink-400">JPEG, PNG, WEBP or GIF. Maximum 5MB. Wide banner images work
                            best.</p>
                    </section>

                    <button type="submit"
                        class="inline-flex h-12 w-full items-center justify-center gap-2 rounded-base bg-brand-600 px-6 text-[15px] font-semibold text-white shadow-md transition-colors hover:bg-brand-700">
                        <i data-lucide="badge-plus" class="h-5 w-5"></i>
                        Publish Promotion
                    </button>
                </div>
            </div>
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const targetType = document.getElementById('target_type');
                const targetId = document.getElementById('target_id');
                const targetSearch = document.getElementById('target_search');
                const targetOptions = document.getElementById('promotion-target-options');
                const targetLabel = document.getElementById('promotion-target-label');
                const targetWrapper = document.getElementById('promotion-target-wrapper');
                const targetHelp = document.getElementById('promotion-target-help');
                const selectedTarget = @json((string) old('target_id', ''));
                const targetCollections = {
                    product: @json($products->map(fn($item) => ['id' => $item->id, 'name' => $item->name])->values()),
                    brand: @json($brands->map(fn($item) => ['id' => $item->id, 'name' => $item->name])->values()),
                    category: @json($categories->map(fn($item) => ['id' => $item->id, 'name' => $item->name])->values()),
                    sub_category: @json($subCategories->map(fn($item) => ['id' => $item->id, 'name' => $item->name])->values())
                };

                function refreshTargets(keepSelection) {
                    const type = targetType.value;
                    const items = targetCollections[type] || [];
                    targetOptions.innerHTML = '';
                    targetSearch.setCustomValidity('');

                    if (type === 'all_products') {
                        targetWrapper.classList.add('hidden');
                        targetId.disabled = true;
                        targetSearch.required = false;
                        targetSearch.value = '';
                        return;
                    }

                    targetWrapper.classList.remove('hidden');
                    targetId.disabled = false;
                    targetSearch.required = true;
                    const singularLabel = {
                        product: 'Product',
                        brand: 'Brand',
                        category: 'Category',
                        sub_category: 'Subcategory'
                    } [type];
                    targetLabel.innerHTML = 'Select ' + singularLabel + ' <span class="text-danger-500">*</span>';
                    targetSearch.placeholder = 'Search or type a ' + singularLabel.toLowerCase() + ' name';
                    targetHelp.textContent = items.length ? items.length + ' active ' + type.replace('_', ' ') +
                        ' option(s) available. Choose a suggestion after typing.' :
                        'No active options are currently available.';

                    items.forEach(function(item) {
                        const option = document.createElement('option');
                        option.value = item.name;
                        targetOptions.appendChild(option);
                    });

                    const current = keepSelection ? items.find(item => String(item.id) === String(selectedTarget)) :
                        null;
                    targetSearch.value = current ? current.name : '';
                    targetId.value = current ? current.id : '';
                }

                targetSearch.addEventListener('input', function() {
                    const items = targetCollections[targetType.value] || [];
                    const match = items.find(item => item.name.toLowerCase() === this.value.trim()
                        .toLowerCase());
                    targetId.value = match ? match.id : '';
                    this.setCustomValidity(this.value && !match ?
                        'Please choose a matching suggestion from the list.' : '');
                });

                targetType.addEventListener('change', function() {
                    refreshTargets(false);
                });
                refreshTargets(true);

                document.querySelectorAll('[data-open-picker]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        const input = document.getElementById(this.dataset.openPicker);
                        if (typeof input.showPicker === 'function') input.showPicker();
                        else input.focus();
                    });
                });

                const imageInput = document.getElementById('image');
                imageInput.addEventListener('change', function() {
                    const preview = document.getElementById('image-preview');
                    const placeholder = document.getElementById('image-upload-placeholder');
                    const fileName = document.getElementById('image-file-name');
                    const file = this.files[0];
                    if (!file) return;
                    fileName.textContent = file.name;
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        preview.src = event.target.result;
                        preview.classList.remove('hidden');
                        placeholder.classList.add('hidden');
                        placeholder.classList.remove('flex');
                    };
                    reader.readAsDataURL(file);
                });
            });
        </script>

    </main>
@endsection
