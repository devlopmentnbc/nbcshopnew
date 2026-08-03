@extends('admin.layouts.app')

@section('title', 'Edit Product - Admin Unimart')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Edit Product: {{ $product->name }}</h1>
            <p class="mt-1 text-[14px] text-ink-500">Update product details, content paragraphs, and attribute variant LKR & USD prices.</p>
        </div>
        <div>
            <a href="{{ route('admin.products.index') }}" class="inline-flex h-11 items-center gap-2 rounded-base border border-surface-line px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors">
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
                Back to Products
            </a>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left 2 columns: Main Details & Attribute Pricing -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Info Card -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-6">
                    <h2 class="text-[18px] font-semibold text-ink-900 border-b border-surface-line pb-3">Product General Details</h2>

                    <!-- Product Name -->
                    <div>
                        <label for="name" class="block text-[14px] font-semibold text-ink-900 mb-2">Product Name <span class="text-danger-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required placeholder="e.g. Organic Almond Milk" class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('name') border-danger-500 @enderror">
                        @error('name')
                            <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug & SKU -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="slug" class="block text-[14px] font-semibold text-ink-900 mb-2">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $product->slug) }}" placeholder="e.g. organic-almond-milk" class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
                        </div>

                        <div>
                            <label for="sku" class="block text-[14px] font-semibold text-ink-900 mb-2">Main Product SKU</label>
                            <input type="text" name="sku" id="sku" value="{{ old('sku', $product->sku) }}" placeholder="e.g. ALM-MAIN" class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
                        </div>
                    </div>

                    <!-- Short Description -->
                    <div>
                        <label for="short_description" class="block text-[14px] font-semibold text-ink-900 mb-2">Short Description</label>
                        <textarea name="short_description" id="short_description" rows="3" placeholder="Brief summary of the product..." class="w-full rounded-base border border-surface-line bg-surface-body p-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">{{ old('short_description', $product->short_description) }}</textarea>
                    </div>

                    <!-- Full Description -->
                    <div>
                        <label for="description" class="block text-[14px] font-semibold text-ink-900 mb-2">Detailed Description</label>
                        <textarea name="description" id="description" rows="5" placeholder="Complete product features, details, and overview..." class="w-full rounded-base border border-surface-line bg-surface-body p-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">{{ old('description', $product->description) }}</textarea>
                    </div>
                </div>

                <!-- Custom Sections: How to Use & Ingredients -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-6">
                    <h2 class="text-[18px] font-semibold text-ink-900 border-b border-surface-line pb-3">Usage & Ingredients Paragraphs</h2>

                    <!-- How to Use -->
                    <div>
                        <label for="how_to_use" class="block text-[14px] font-semibold text-ink-900 mb-2">
                            <span class="flex items-center gap-2">
                                <i data-lucide="help-circle" class="h-4 w-4 text-brand-600"></i>
                                How to Use Instructions
                            </span>
                        </label>
                        <textarea name="how_to_use" id="how_to_use" rows="4" placeholder="e.g. Shake well before use..." class="w-full rounded-base border border-surface-line bg-surface-body p-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">{{ old('how_to_use', $product->how_to_use) }}</textarea>
                    </div>

                    <!-- Ingredients -->
                    <div>
                        <label for="ingredients" class="block text-[14px] font-semibold text-ink-900 mb-2">
                            <span class="flex items-center gap-2">
                                <i data-lucide="list" class="h-4 w-4 text-brand-600"></i>
                                Ingredients & Key Components
                            </span>
                        </label>
                        <textarea name="ingredients" id="ingredients" rows="4" placeholder="e.g. Organic Almond Extract, Purified Water..." class="w-full rounded-base border border-surface-line bg-surface-body p-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">{{ old('ingredients', $product->ingredients) }}</textarea>
                    </div>
                </div>

                <!-- Attribute Variant Pricing & Inventory Matrix -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-6">
                    <div>
                        <h2 class="text-[18px] font-semibold text-ink-900">Attribute Variants, Pricing & Stock</h2>
                        <p class="text-[13px] text-ink-500">Configure LKR price, USD price, sale prices, and stock for each attribute variant.</p>
                    </div>

                    @if ($attributes->count() > 0)
                        <div class="space-y-6">
                            @foreach ($attributes as $attr)
                                <div class="rounded-base border border-surface-line bg-surface-body p-4 space-y-4">
                                    <h3 class="text-[15px] font-semibold text-ink-900 flex items-center gap-2">
                                        <i data-lucide="sliders" class="h-4 w-4 text-brand-600"></i>
                                        {{ $attr->name }}
                                    </h3>

                                    <div class="space-y-3">
                                        @forelse ($attr->values as $val)
                                            @php
                                                $isAttached = isset($variantMap[$val->id]);
                                                $varData = $variantMap[$val->id] ?? [];
                                            @endphp
                                            <div class="variant-item rounded-base border border-surface-line bg-surface-card p-4">
                                                <div class="flex items-center gap-3 mb-3">
                                                    <input type="checkbox" name="variants[{{ $val->id }}][selected]" value="1" id="variant_check_{{ $val->id }}" onchange="toggleVariantInputs({{ $val->id }})" {{ old("variants.{$val->id}.selected", $isAttached) ? 'checked' : '' }} class="h-4 w-4 rounded border-surface-line text-brand-600 focus:ring-brand-600">
                                                    <label for="variant_check_{{ $val->id }}" class="text-[14px] font-semibold text-ink-900 cursor-pointer flex items-center gap-2">
                                                        <span>{{ $val->value_name }}</span>
                                                        @if ($val->metric)
                                                            <span class="text-[11px] font-semibold text-brand-600 bg-brand-50 px-1.5 py-0.5 rounded">{{ $val->metric }}</span>
                                                        @endif
                                                    </label>
                                                </div>

                                                <!-- Variant Inputs (LKR, USD, Stock) -->
                                                <div id="variant_inputs_{{ $val->id }}" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-3 pt-2 border-t border-surface-line {{ old("variants.{$val->id}.selected", $isAttached) ? '' : 'hidden' }}">
                                                    <!-- LKR Price -->
                                                    <div>
                                                        <label class="block text-[12px] font-semibold text-ink-700 mb-1">LKR Price (Rs.) <span class="text-danger-500">*</span></label>
                                                        <input type="number" step="0.01" name="variants[{{ $val->id }}][price_lkr]" value="{{ old("variants.{$val->id}.price_lkr", $varData['price_lkr'] ?? '0.00') }}" placeholder="1500.00" class="h-9 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-900 focus:border-brand-600 focus:outline-none">
                                                    </div>

                                                    <!-- USD Price -->
                                                    <div>
                                                        <label class="block text-[12px] font-semibold text-ink-700 mb-1">USD Price ($) <span class="text-danger-500">*</span></label>
                                                        <input type="number" step="0.01" name="variants[{{ $val->id }}][price_usd]" value="{{ old("variants.{$val->id}.price_usd", $varData['price_usd'] ?? '0.00') }}" placeholder="5.00" class="h-9 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-900 focus:border-brand-600 focus:outline-none">
                                                    </div>

                                                    <!-- LKR Sale Price -->
                                                    <div>
                                                        <label class="block text-[12px] font-semibold text-ink-700 mb-1">LKR Sale Price</label>
                                                        <input type="number" step="0.01" name="variants[{{ $val->id }}][sale_price_lkr]" value="{{ old("variants.{$val->id}.sale_price_lkr", $varData['sale_price_lkr'] ?? '') }}" placeholder="Optional" class="h-9 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-900 focus:border-brand-600 focus:outline-none">
                                                    </div>

                                                    <!-- USD Sale Price -->
                                                    <div>
                                                        <label class="block text-[12px] font-semibold text-ink-700 mb-1">USD Sale Price</label>
                                                        <input type="number" step="0.01" name="variants[{{ $val->id }}][sale_price_usd]" value="{{ old("variants.{$val->id}.sale_price_usd", $varData['sale_price_usd'] ?? '') }}" placeholder="Optional" class="h-9 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-900 focus:border-brand-600 focus:outline-none">
                                                    </div>

                                                    <!-- Stock Quantity -->
                                                    <div>
                                                        <label class="block text-[12px] font-semibold text-ink-700 mb-1">Stock Qty <span class="text-danger-500">*</span></label>
                                                        <input type="number" name="variants[{{ $val->id }}][stock]" value="{{ old("variants.{$val->id}.stock", $varData['stock'] ?? 10) }}" placeholder="10" min="0" class="h-9 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-900 focus:border-brand-600 focus:outline-none">
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-[12px] text-ink-400 italic">No values for this attribute.</p>
                                        @endforelse
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="p-4 text-center border border-dashed border-surface-line rounded-base text-ink-400">
                            <p class="text-[14px]">No attributes created yet.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right 1 column: Organization, Status & Image -->
            <div class="space-y-6">
                <!-- Organization Card -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-4">
                    <h2 class="text-[18px] font-semibold text-ink-900 border-b border-surface-line pb-3">Organization</h2>

                    <!-- Brand -->
                    <div>
                        <label for="brand_id" class="block text-[14px] font-semibold text-ink-900 mb-2">Brand</label>
                        <select name="brand_id" id="brand_id" class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
                            <option value="">Select Brand (Optional)</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category_id" class="block text-[14px] font-semibold text-ink-900 mb-2">Category <span class="text-danger-500">*</span></label>
                        <select name="category_id" id="category_id" required class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('category_id') border-danger-500 @enderror">
                            <option value="">Select Category</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sub Category (Dynamic Filtering) -->
                    <div>
                        <label for="sub_category_id" class="block text-[14px] font-semibold text-ink-900 mb-2">Sub Category</label>
                        <select name="sub_category_id" id="sub_category_id" class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
                            <option value="">Select Sub Category</option>
                            @foreach ($subCategories as $subCat)
                                <option value="{{ $subCat->id }}" data-category-id="{{ $subCat->category_id }}" {{ old('sub_category_id', $product->sub_category_id) == $subCat->id ? 'selected' : '' }}>
                                    {{ $subCat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="flex items-center gap-3 pt-2">
                        <input type="checkbox" name="status" id="status" value="1" {{ old('status', $product->status) ? 'checked' : '' }} class="h-4 w-4 rounded border-surface-line text-brand-600 focus:ring-brand-600">
                        <label for="status" class="text-[14px] font-semibold text-ink-900 cursor-pointer">Published / Active</label>
                    </div>
                </div>

                <!-- Featured Image Card -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-4">
                    <h2 class="text-[18px] font-semibold text-ink-900 border-b border-surface-line pb-3">Product Image</h2>

                    @if ($product->image)
                        <div class="h-40 w-full overflow-hidden rounded-base border border-surface-line bg-surface-body p-2">
                            <img id="current-image" src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-contain mx-auto">
                        </div>
                    @endif

                    <div id="image-preview-container" class="hidden h-40 w-full overflow-hidden rounded-base border border-brand-500 bg-surface-body p-2">
                        <img id="image-preview" src="#" alt="New Preview" class="h-full w-full object-contain mx-auto">
                    </div>

                    <input type="file" name="image" id="image" accept="image/*" class="block w-full text-[14px] text-ink-500 file:mr-4 file:py-2 file:px-4 file:rounded-base file:border-0 file:text-[14px] file:font-semibold file:bg-brand-50 file:text-brand-600 hover:file:bg-brand-100 cursor-pointer">
                    <p class="text-[12px] text-ink-400">Leave blank to keep existing image. Supported: JPEG, PNG, WEBP, SVG (Max: 2MB).</p>
                </div>

                <!-- Submit Button -->
                <div class="pt-2 flex items-center gap-3">
                    <button type="submit" class="w-full inline-flex h-12 items-center justify-center gap-2 rounded-base bg-brand-600 text-[15px] font-semibold text-white transition-colors hover:bg-brand-700 shadow-md">
                        <i data-lucide="check-circle" class="h-5 w-5"></i>
                        Update Product & Prices
                    </button>
                </div>
            </div>
        </div>
    </form>
</main>

<script>
    function toggleVariantInputs(id) {
        const checkbox = document.getElementById('variant_check_' + id);
        const inputsDiv = document.getElementById('variant_inputs_' + id);
        if (checkbox.checked) {
            inputsDiv.classList.remove('hidden');
        } else {
            inputsDiv.classList.add('hidden');
        }
    }

    // Image Preview Script
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

    // Dependent Category -> Sub Category Filter
    document.getElementById('category_id').addEventListener('change', function() {
        const selectedCategoryId = this.value;
        const subCatSelect = document.getElementById('sub_category_id');
        const options = subCatSelect.querySelectorAll('option');

        options.forEach(option => {
            if (!option.value) return;

            const catId = option.getAttribute('data-category-id');
            if (selectedCategoryId === "" || catId === selectedCategoryId) {
                option.style.display = "block";
                option.disabled = false;
            } else {
                option.style.display = "none";
                option.disabled = true;
                if (option.selected) subCatSelect.value = "";
            }
        });
    });

    if (document.getElementById('category_id').value) {
        document.getElementById('category_id').dispatchEvent(new Event('change'));
    }
</script>
@endsection
