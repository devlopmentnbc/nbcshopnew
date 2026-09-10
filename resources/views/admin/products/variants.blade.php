@extends('admin.layouts.app')

@section('title', 'Manage Variants - ' . $product->name . ' - Admin NBC IT')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header & Breadcrumbs -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-[13px] text-ink-400 mb-1">
                <a href="{{ route('admin.products.index') }}" class="hover:text-brand-600">Products</a>
                <span>&rsaquo;</span>
                <span class="text-ink-700 font-medium">{{ $product->name }}</span>
                <span>&rsaquo;</span>
                <span class="text-ink-400">Manage Variants</span>
            </div>
            <h1 class="text-[24px] font-semibold text-ink-900 flex items-center gap-3">
                <i data-lucide="layers" class="h-6 w-6 text-brand-600"></i>
                Manage Stock & Attribute Variants
            </h1>
        </div>
        <div>
            <a href="{{ route('admin.products.index') }}" class="inline-flex h-10 items-center gap-2 rounded-base border border-surface-line bg-surface-card px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-body transition-colors">
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
                Back to Products List
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-base border border-success-600/20 bg-success-50 p-4 text-success-700">
            <div class="flex items-center gap-3">
                <i data-lucide="check-circle" class="h-5 w-5 text-success-600"></i>
                <p class="text-[14px] font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <!-- Product Summary Card -->
    <div class="mb-6 rounded-card border border-surface-line bg-surface-card p-5 shadow-card">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                @if ($product->image)
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-16 w-16 rounded-base object-cover border border-surface-line bg-surface-body shrink-0">
                @else
                    <div class="flex h-16 w-16 items-center justify-center rounded-base bg-surface-muted text-ink-400 border border-surface-line shrink-0">
                        <i data-lucide="image" class="h-6 w-6"></i>
                    </div>
                @endif
                <div>
                    <h2 class="text-[18px] font-bold text-ink-900">{{ $product->name }}</h2>
                    <div class="flex flex-wrap items-center gap-x-4 gap-y-1 mt-1 text-[13px] text-ink-500">
                        <span><strong class="text-ink-700">SKU:</strong> {{ $product->sku ?: 'N/A' }}</span>
                        <span>&bull;</span>
                        <span><strong class="text-ink-700">Brand:</strong> {{ $product->brand ? $product->brand->name : 'N/A' }}</span>
                        <span>&bull;</span>
                        <span><strong class="text-ink-700">Category:</strong> {{ $product->category ? $product->category->name : 'N/A' }} @if($product->subCategory) &rsaquo; {{ $product->subCategory->name }} @endif</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-6 border-l border-surface-line pl-6">
                <div>
                    <span class="text-[11px] font-semibold uppercase text-ink-400 block">Base Price LKR</span>
                    <span class="text-[16px] font-bold text-success-600">Rs. {{ number_format($product->price_lkr, 2) }}</span>
                </div>
                <div>
                    <span class="text-[11px] font-semibold uppercase text-ink-400 block">Base Price USD</span>
                    <span class="text-[16px] font-bold text-brand-600">${{ number_format($product->price_usd, 2) }}</span>
                </div>
                <div>
                    <span class="text-[11px] font-semibold uppercase text-ink-400 block">Total Stock</span>
                    <span class="text-[16px] font-bold text-ink-900">{{ $product->totalStock() }} units</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Variant Form -->
    <form action="{{ route('admin.products.variants.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        @php
            $attachedValIds = $product->attributeValues->pluck('id')->toArray();
        @endphp

        <!-- Currently Active Variants Card -->
        <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
            <div class="flex items-center justify-between mb-4 border-b border-surface-line pb-3">
                <h3 class="text-[16px] font-semibold text-ink-900 flex items-center gap-2">
                    <i data-lucide="check-square" class="h-5 w-5 text-brand-600"></i>
                    Currently Configured Variants ({{ $product->attributeValues->count() }})
                </h3>
                <span class="text-[12px] text-ink-400">Uncheck "Keep Active" to remove a variant from this product.</span>
            </div>

            @if ($product->attributeValues->count() > 0)
                <div class="space-y-4">
                    @foreach ($product->attributeValues as $val)
                        <div class="active-var-card rounded-base border border-surface-line bg-surface-body p-4 transition-all">
                            <div class="flex flex-wrap items-center justify-between gap-3 mb-3 border-b border-surface-line/70 pb-3">
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" name="variants[{{ $val->id }}][selected]" value="1" checked id="active_var_{{ $val->id }}" class="h-4 w-4 rounded border-surface-line text-brand-600 focus:ring-brand-600">
                                    <label for="active_var_{{ $val->id }}" class="text-[15px] font-bold text-ink-900 cursor-pointer flex items-center gap-2">
                                        <span class="inline-flex items-center rounded-base bg-brand-50 px-2.5 py-0.5 text-[12px] font-semibold text-brand-700 border border-brand-200">
                                            {{ $val->attribute ? $val->attribute->name : 'Attribute' }}
                                        </span>
                                        <span>{{ $val->value_name }}</span>
                                    </label>
                                </div>
                                <span class="text-[12px] text-ink-400 font-mono">Option ID: #{{ $val->id }}</span>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                                <div>
                                    <label class="block text-[12px] font-semibold text-ink-600 mb-1">LKR Regular Price (Rs.)</label>
                                    <input type="number" step="0.01" min="0" name="variants[{{ $val->id }}][price_lkr]" value="{{ old("variants.{$val->id}.price_lkr", $val->pivot->price_lkr ?? $product->price_lkr) }}" class="h-9 w-full rounded-base border border-surface-line bg-surface-card px-3 text-[13px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-[12px] font-semibold text-ink-600 mb-1">LKR Sale Price (Rs.)</label>
                                    <input type="number" step="0.01" min="0" name="variants[{{ $val->id }}][sale_price_lkr]" value="{{ old("variants.{$val->id}.sale_price_lkr", $val->pivot->sale_price_lkr) }}" placeholder="Optional" class="h-9 w-full rounded-base border border-surface-line bg-surface-card px-3 text-[13px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-[12px] font-semibold text-ink-600 mb-1">USD Regular Price ($)</label>
                                    <input type="number" step="0.01" min="0" name="variants[{{ $val->id }}][price_usd]" value="{{ old("variants.{$val->id}.price_usd", $val->pivot->price_usd ?? $product->price_usd) }}" class="h-9 w-full rounded-base border border-surface-line bg-surface-card px-3 text-[13px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-[12px] font-semibold text-ink-600 mb-1">USD Sale Price ($)</label>
                                    <input type="number" step="0.01" min="0" name="variants[{{ $val->id }}][sale_price_usd]" value="{{ old("variants.{$val->id}.sale_price_usd", $val->pivot->sale_price_usd) }}" placeholder="Optional" class="h-9 w-full rounded-base border border-surface-line bg-surface-card px-3 text-[13px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                </div>

                                <div>
                                    <label class="block text-[12px] font-semibold text-ink-600 mb-1">Stock Quantity</label>
                                    <input type="number" min="0" name="variants[{{ $val->id }}][stock]" value="{{ old("variants.{$val->id}.stock", $val->pivot->stock ?? 0) }}" class="h-9 w-full rounded-base border border-surface-line bg-surface-card px-3 text-[13px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-[12px] font-semibold text-ink-600 mb-1">Weight (grams / g)</label>
                                    <input type="number" min="0" step="1" name="variants[{{ $val->id }}][weight_grams]" value="{{ old("variants.{$val->id}.weight_grams", $val->pivot->weight_grams) }}" placeholder="e.g. 250" class="h-9 w-full rounded-base border border-surface-line bg-surface-card px-3 text-[13px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-[12px] font-semibold text-ink-600 mb-1">SAP / Custom Code</label>
                                    <input type="text" name="variants[{{ $val->id }}][sap_code]" value="{{ old("variants.{$val->id}.sap_code", $val->pivot->sap_code) }}" placeholder="SAP code" class="h-9 w-full rounded-base border border-surface-line bg-surface-card px-3 text-[13px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-[12px] font-semibold text-ink-600 mb-1">Variant Image</label>
                                    <div class="flex items-center gap-2">
                                        @if (!empty($val->pivot->image))
                                            <img src="{{ asset($val->pivot->image) }}" alt="Variant" class="h-9 w-9 rounded border border-surface-line object-cover shrink-0">
                                        @endif
                                        <input type="file" name="variants[{{ $val->id }}][image]" accept="image/*" class="text-[11px] text-ink-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-base file:border-0 file:text-[11px] file:font-semibold file:bg-surface-muted file:text-ink-700 hover:file:bg-surface-line">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="rounded-base bg-surface-body p-6 text-center text-ink-500 border border-surface-line">
                    <i data-lucide="layers" class="mx-auto h-8 w-8 text-ink-400 mb-2"></i>
                    <p class="text-[14px] font-medium">No variants are currently active for this product.</p>
                    <p class="text-[12px] text-ink-400 mt-0.5">Select options from the section below to add attributes and stock.</p>
                </div>
            @endif
        </div>

        <!-- Add New Attribute Variants Card -->
        <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
            <div class="flex flex-wrap items-center justify-between gap-3 mb-4 border-b border-surface-line pb-3">
                <div>
                    <h3 class="text-[16px] font-semibold text-ink-900 flex items-center gap-2">
                        <i data-lucide="plus-circle" class="h-5 w-5 text-brand-600"></i>
                        Add New Attribute Variants
                    </h3>
                    <p class="text-[12px] text-ink-400">Expand an attribute group below and check options to configure pricing, stock & weight.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" onclick="expandAllGroups()" class="inline-flex items-center gap-1.5 text-[13px] font-semibold text-brand-600 hover:underline">
                        <i data-lucide="chevrons-down" class="h-4 w-4"></i> Expand All Groups
                    </button>
                    <span class="text-ink-300">|</span>
                    <button type="button" onclick="minimizeAllGroups()" class="inline-flex items-center gap-1.5 text-[13px] font-semibold text-ink-600 hover:underline">
                        <i data-lucide="chevrons-up" class="h-4 w-4"></i> Minimize All
                    </button>
                </div>
            </div>

            <div class="space-y-4" id="attributeGroupsContainer">
                @foreach ($attributes as $attr)
                    @php
                        // Check if any value of this attribute is NOT yet attached
                        $unattachedCount = $attr->values->whereNotIn('id', $attachedValIds)->count();
                    @endphp
                    <div class="attr-group-card rounded-base border border-surface-line bg-surface-body overflow-hidden">
                        <!-- Group Header Toggle -->
                        <button type="button" onclick="toggleAttrGroup(this)" class="w-full flex items-center justify-between p-4 bg-surface-muted/60 hover:bg-surface-muted transition-colors text-left">
                            <div class="flex items-center gap-3">
                                <div class="flex h-8 w-8 items-center justify-center rounded-base bg-brand-50 text-brand-600 font-bold text-[14px]">
                                    <i data-lucide="sliders" class="h-4 w-4"></i>
                                </div>
                                <div>
                                    <span class="text-[15px] font-bold text-ink-900 block">{{ $attr->name }}</span>
                                    <span class="text-[12px] text-ink-400">
                                        {{ $attr->values->count() }} total {{ Str::plural('option', $attr->values->count()) }}
                                        @if($unattachedCount > 0)
                                            &bull; <span class="text-brand-600 font-medium">{{ $unattachedCount }} available to add</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-ink-500">
                                <span class="group-status-text text-[12px] font-semibold">Expand Options</span>
                                <i data-lucide="chevron-down" class="group-chevron h-5 w-5 transition-transform duration-200"></i>
                            </div>
                        </button>

                        <!-- Group Content (Collapsible) -->
                        <div class="group-content p-4 border-t border-surface-line hidden">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach ($attr->values as $val)
                                    @php $isAttached = in_array($val->id, $attachedValIds); @endphp
                                    <div class="attr-option-card rounded-base border {{ $isAttached ? 'border-success-600/30 bg-success-50/20' : 'border-surface-line bg-surface-card' }} p-3.5" data-val-id="{{ $val->id }}">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="flex items-center gap-2.5">
                                                <input type="checkbox" name="variants[{{ $val->id }}][selected]" value="1" {{ $isAttached ? 'checked disabled' : '' }} id="new_var_{{ $val->id }}" onchange="toggleVariantFields({{ $val->id }})" class="var-select-check h-4 w-4 rounded border-surface-line text-brand-600 focus:ring-brand-600">
                                                <label for="new_var_{{ $val->id }}" class="text-[14px] font-semibold text-ink-900 cursor-pointer">
                                                    {{ $val->value_name }}
                                                </label>
                                            </div>
                                            @if ($isAttached)
                                                <span class="inline-flex items-center gap-1 rounded bg-success-50 px-2 py-0.5 text-[11px] font-semibold text-success-600 border border-success-600/20">
                                                    <i data-lucide="check" class="h-3 w-3"></i> Already Configured Above
                                                </span>
                                            @else
                                                <span class="text-[11px] font-medium text-ink-400">Click checkbox to configure</span>
                                            @endif
                                        </div>

                                        @if (!$isAttached)
                                            <!-- Dynamic fields shown when checkbox is checked -->
                                            <div id="var_fields_{{ $val->id }}" class="var-fields-wrapper mt-3 pt-3 border-t border-surface-line hidden space-y-3">
                                                <div class="grid grid-cols-2 gap-2">
                                                    <div>
                                                        <label class="block text-[11px] font-semibold text-ink-600 mb-1">LKR Regular Price</label>
                                                        <input type="number" step="0.01" min="0" name="variants[{{ $val->id }}][price_lkr]" value="{{ $product->price_lkr }}" class="h-8 w-full rounded border border-surface-line bg-surface-body px-2.5 text-[12px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                                    </div>
                                                    <div>
                                                        <label class="block text-[11px] font-semibold text-ink-600 mb-1">LKR Sale Price</label>
                                                        <input type="number" step="0.01" min="0" name="variants[{{ $val->id }}][sale_price_lkr]" placeholder="Optional" class="h-8 w-full rounded border border-surface-line bg-surface-body px-2.5 text-[12px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-2 gap-2">
                                                    <div>
                                                        <label class="block text-[11px] font-semibold text-ink-600 mb-1">USD Regular Price</label>
                                                        <input type="number" step="0.01" min="0" name="variants[{{ $val->id }}][price_usd]" value="{{ $product->price_usd }}" class="h-8 w-full rounded border border-surface-line bg-surface-body px-2.5 text-[12px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                                    </div>
                                                    <div>
                                                        <label class="block text-[11px] font-semibold text-ink-600 mb-1">USD Sale Price</label>
                                                        <input type="number" step="0.01" min="0" name="variants[{{ $val->id }}][sale_price_usd]" placeholder="Optional" class="h-8 w-full rounded border border-surface-line bg-surface-body px-2.5 text-[12px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-3 gap-2">
                                                    <div>
                                                        <label class="block text-[11px] font-semibold text-ink-600 mb-1">Stock</label>
                                                        <input type="number" min="0" name="variants[{{ $val->id }}][stock]" value="10" class="h-8 w-full rounded border border-surface-line bg-surface-body px-2.5 text-[12px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                                    </div>
                                                    <div>
                                                        <label class="block text-[11px] font-semibold text-ink-600 mb-1">Weight (g)</label>
                                                        <input type="number" min="0" step="1" name="variants[{{ $val->id }}][weight_grams]" placeholder="e.g. 250" class="h-8 w-full rounded border border-surface-line bg-surface-body px-2.5 text-[12px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                                    </div>
                                                    <div>
                                                        <label class="block text-[11px] font-semibold text-ink-600 mb-1">SAP Code</label>
                                                        <input type="text" name="variants[{{ $val->id }}][sap_code]" placeholder="SAP" class="h-8 w-full rounded border border-surface-line bg-surface-body px-2.5 text-[12px] text-ink-800 focus:border-brand-600 focus:outline-none">
                                                    </div>
                                                </div>

                                                <div>
                                                    <label class="block text-[11px] font-semibold text-ink-600 mb-1">Variant Image</label>
                                                    <input type="file" name="variants[{{ $val->id }}][image]" accept="image/*" class="text-[11px] text-ink-500 file:mr-2 file:py-0.5 file:px-2 file:rounded file:border-0 file:text-[11px] file:font-semibold file:bg-surface-muted file:text-ink-700 hover:file:bg-surface-line">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Sticky Submit Footer Bar -->
        <div class="sticky bottom-4 z-20 flex items-center justify-between rounded-card border border-surface-line bg-surface-card p-4 shadow-2xl backdrop-blur-md">
            <div class="flex items-center gap-2 text-[13px] text-ink-600">
                <i data-lucide="info" class="h-4 w-4 text-brand-600"></i>
                <span>Changes will take effect immediately on saving.</span>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.products.index') }}" class="inline-flex h-11 items-center justify-center rounded-base border border-surface-line px-5 text-[14px] font-semibold text-ink-700 hover:bg-surface-body transition-colors">
                    Cancel
                </a>
                <button type="submit" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-6 text-[14px] font-semibold text-white hover:bg-brand-700 transition-colors shadow-md">
                    <i data-lucide="save" class="h-4 w-4"></i>
                    Save Variant Changes
                </button>
            </div>
        </div>
    </form>
</main>

<script>
    function toggleAttrGroup(button) {
        const card = button.closest('.attr-group-card');
        const content = card.querySelector('.group-content');
        const chevron = card.querySelector('.group-chevron');
        const statusText = card.querySelector('.group-status-text');

        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            if (chevron) chevron.style.transform = 'rotate(180deg)';
            if (statusText) statusText.textContent = 'Minimize';
        } else {
            content.classList.add('hidden');
            if (chevron) chevron.style.transform = 'rotate(0deg)';
            if (statusText) statusText.textContent = 'Expand Options';
        }
    }

    function expandAllGroups() {
        document.querySelectorAll('#attributeGroupsContainer .attr-group-card').forEach(card => {
            const content = card.querySelector('.group-content');
            const chevron = card.querySelector('.group-chevron');
            const statusText = card.querySelector('.group-status-text');
            if (content) content.classList.remove('hidden');
            if (chevron) chevron.style.transform = 'rotate(180deg)';
            if (statusText) statusText.textContent = 'Minimize';
        });
    }

    function minimizeAllGroups() {
        document.querySelectorAll('#attributeGroupsContainer .attr-group-card').forEach(card => {
            const content = card.querySelector('.group-content');
            const chevron = card.querySelector('.group-chevron');
            const statusText = card.querySelector('.group-status-text');
            if (content) content.classList.add('hidden');
            if (chevron) chevron.style.transform = 'rotate(0deg)';
            if (statusText) statusText.textContent = 'Expand Options';
        });
    }

    function toggleVariantFields(valId) {
        const check = document.getElementById('new_var_' + valId);
        const fields = document.getElementById('var_fields_' + valId);
        if (check && fields) {
            if (check.checked) {
                fields.classList.remove('hidden');
            } else {
                fields.classList.add('hidden');
            }
        }
    }
</script>
@endsection
