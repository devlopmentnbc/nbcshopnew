@extends('admin.layouts.app')

@section('title', 'Add New Product - Admin NBC IT')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Add New Product</h1>
            <p class="mt-1 text-[14px] text-ink-500">Create a product and configure attribute-specific LKR & USD prices and stock.</p>
        </div>
        <div>
            <a href="{{ route('admin.products.index') }}" class="inline-flex h-11 items-center gap-2 rounded-base border border-surface-line px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors">
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
                Back to Products
            </a>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Left 2 columns: Main Details & Attribute Pricing -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Info Card -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-6">
                    <h2 class="text-[18px] font-semibold text-ink-900 border-b border-surface-line pb-3">Product General Details</h2>

                    <!-- Product Name -->
                    <div>
                        <label for="name" class="block text-[14px] font-semibold text-ink-900 mb-2">Product Name <span class="text-danger-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="e.g. Organic Almond Milk" class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('name') border-danger-500 @enderror">
                        @error('name')
                            <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug, Weight & USD Offer Price -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="slug" class="block text-[14px] font-semibold text-ink-900 mb-2">Slug <span class="text-ink-400 font-normal">(Auto-generated if blank)</span></label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="e.g. organic-almond-milk" class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
                        </div>

                        <div>
                            <label for="weight_grams" class="block text-[14px] font-semibold text-ink-900 mb-2">Product Weight (g) <span class="text-danger-500">*</span></label>
                            <div class="flex rounded-base border border-surface-line overflow-hidden bg-surface-body focus-within:border-brand-600">
                                <input type="number" step="1" min="0" name="weight_grams" id="weight_grams" value="{{ old('weight_grams', 500) }}" placeholder="500" required class="h-11 flex-1 bg-transparent px-4 text-[14px] text-ink-900 focus:outline-none">
                                <span class="inline-flex items-center bg-surface-muted px-3 text-[13px] font-semibold text-ink-500 border-l border-surface-line select-none">grams (g)</span>
                            </div>
                        </div>

                        <div>
                            <label for="usd_offer_price" class="block text-[14px] font-semibold text-ink-900 mb-2">USD Offer Price</label>
                            <div class="flex rounded-base border border-surface-line overflow-hidden bg-surface-body focus-within:border-brand-600">
                                <span class="inline-flex items-center bg-surface-muted px-3 text-[13px] font-semibold text-ink-500 border-r border-surface-line select-none">$</span>
                                <input type="number" step="0.01" min="0" name="usd_offer_price" id="usd_offer_price" value="{{ old('usd_offer_price') }}" placeholder="Optional" class="h-11 flex-1 bg-transparent px-4 text-[14px] text-ink-900 focus:outline-none">
                            </div>
                        </div>
                    </div>

                    <!-- Main Product SKU (read-only) -->
                    <div class="rounded-base border border-dashed border-surface-line bg-surface-muted px-4 py-3 flex items-center gap-2 text-[13px] text-ink-500">
                        <i data-lucide="info" class="h-4 w-4 text-brand-600"></i>
                        Main Product SKU will be generated automatically on save (e.g. PROD-0001).
                    </div>

                    <!-- Short Description -->
                    <div>
                        <label for="short_description" class="block text-[14px] font-semibold text-ink-900 mb-2">Short Description</label>
                        <textarea name="short_description" id="short_description" rows="3" placeholder="Brief summary of the product..." class="w-full rounded-base border border-surface-line bg-surface-body p-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">{{ old('short_description') }}</textarea>
                    </div>

                    <!-- Full Description -->
                    <div>
                        <label for="description" class="block text-[14px] font-semibold text-ink-900 mb-2">Detailed Description</label>
                        <textarea name="description" id="description" rows="5" placeholder="Complete product features, details, and overview..." class="w-full rounded-base border border-surface-line bg-surface-body p-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">{{ old('description') }}</textarea>
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
                        <textarea name="how_to_use" id="how_to_use" rows="4" placeholder="e.g. Shake well before use. Store in a cool dry place..." class="w-full rounded-base border border-surface-line bg-surface-body p-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">{{ old('how_to_use') }}</textarea>
                    </div>

                    <!-- Ingredients -->
                    <div>
                        <label for="ingredients" class="block text-[14px] font-semibold text-ink-900 mb-2">
                            <span class="flex items-center gap-2">
                                <i data-lucide="list" class="h-4 w-4 text-brand-600"></i>
                                Ingredients & Key Components
                            </span>
                        </label>
                        <textarea name="ingredients" id="ingredients" rows="4" placeholder="e.g. Organic Almond Extract, Purified Water, Sea Salt..." class="w-full rounded-base border border-surface-line bg-surface-body p-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">{{ old('ingredients') }}</textarea>
                    </div>
                </div>

                <!-- Attribute Variant Pricing & Inventory Matrix -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-6">
                    <div class="flex flex-wrap items-center justify-between gap-2 border-b border-surface-line pb-3">
                        <div>
                            <h2 class="text-[18px] font-semibold text-ink-900">Attribute Variants, Pricing & Stock</h2>
                            <p class="text-[13px] text-ink-500">Check applicable attribute values below to configure their specific LKR price, USD price, and stock.</p>
                        </div>
                        <div class="flex items-center gap-2 text-[12px]">
                            <button type="button" onclick="expandAllAttrGroups('createAttributesList')" class="font-medium text-brand-600 hover:underline">Expand All</button>
                            <span class="text-ink-300">|</span>
                            <button type="button" onclick="minimizeAllAttrGroups('createAttributesList')" class="font-medium text-ink-500 hover:underline">Minimize All</button>
                        </div>
                    </div>

                    @if ($attributes->count() > 0)
                        <div id="createAttributesList" class="space-y-4">
                            @foreach ($attributes as $attr)
                                <div class="attr-group-card rounded-base border border-surface-line bg-surface-body overflow-hidden">
                                    <!-- Clickable Header to Expand/Minimize -->
                                    <button type="button" onclick="toggleAttrGroup(this)" class="w-full flex items-center justify-between p-3.5 bg-surface-muted/60 hover:bg-surface-muted transition-colors text-left">
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="sliders" class="h-4 w-4 text-brand-600"></i>
                                            <span class="text-[14px] font-semibold text-ink-800">{{ $attr->name }}</span>
                                            <span class="text-[11px] font-medium text-ink-500 bg-surface-card px-2 py-0.5 rounded-full border border-surface-line">
                                                {{ $attr->values->count() }} {{ Str::plural('option', $attr->values->count()) }}
                                            </span>
                                        </div>
                                        <div class="flex items-center gap-1.5 text-ink-400">
                                            <span class="attr-group-status text-[11px] font-medium">Minimize</span>
                                            <i data-lucide="chevron-down" class="attr-chevron h-4 w-4 transition-transform duration-200" style="transform: rotate(180deg)"></i>
                                        </div>
                                    </button>

                                    <div class="attr-group-content p-4 border-t border-surface-line space-y-3">
                                        @forelse ($attr->values as $val)
                                            <div class="variant-item rounded-base border border-surface-line bg-surface-card p-4">
                                                <div class="flex items-center gap-3 mb-3">
                                                    <input type="checkbox" name="variants[{{ $val->id }}][selected]" value="1" id="variant_check_{{ $val->id }}" onchange="toggleVariantInputs({{ $val->id }})" {{ old("variants.{$val->id}.selected") ? 'checked' : '' }} class="h-4 w-4 rounded border-surface-line text-brand-600 focus:ring-brand-600">
                                                    <label for="variant_check_{{ $val->id }}" class="text-[14px] font-semibold text-ink-900 cursor-pointer flex items-center gap-2">
                                                        <span>{{ $val->value_name }}</span>
                                                        @if ($val->metric)
                                                            <span class="text-[11px] font-semibold text-brand-600 bg-brand-50 px-1.5 py-0.5 rounded">{{ $val->metric }}</span>
                                                        @endif
                                                    </label>
                                                </div>

                                                <!-- Variant Inputs (LKR, USD, Stock, Weight, SAP Code, Image) -->
                                                <div id="variant_inputs_{{ $val->id }}" class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-8 gap-3 pt-2 border-t border-surface-line {{ old("variants.{$val->id}.selected") ? '' : 'hidden' }}">
                                                    <!-- LKR Price -->
                                                    <div>
                                                        <label class="block text-[12px] font-semibold text-ink-700 mb-1">LKR Price (Rs.) <span class="text-danger-500">*</span></label>
                                                        <input type="number" step="0.01" name="variants[{{ $val->id }}][price_lkr]" value="{{ old("variants.{$val->id}.price_lkr", '0.00') }}" placeholder="1500.00" class="h-9 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-900 focus:border-brand-600 focus:outline-none">
                                                    </div>

                                                    <!-- USD Price -->
                                                    <div>
                                                        <label class="block text-[12px] font-semibold text-ink-700 mb-1">USD Price ($) <span class="text-danger-500">*</span></label>
                                                        <input type="number" step="0.01" name="variants[{{ $val->id }}][price_usd]" value="{{ old("variants.{$val->id}.price_usd", '0.00') }}" placeholder="5.00" class="h-9 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-900 focus:border-brand-600 focus:outline-none">
                                                    </div>

                                                    <!-- LKR Sale Price -->
                                                    <div>
                                                        <label class="block text-[12px] font-semibold text-ink-700 mb-1">LKR Sale Price</label>
                                                        <input type="number" step="0.01" name="variants[{{ $val->id }}][sale_price_lkr]" value="{{ old("variants.{$val->id}.sale_price_lkr") }}" placeholder="Optional" class="h-9 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-900 focus:border-brand-600 focus:outline-none">
                                                    </div>

                                                    <!-- USD Sale Price -->
                                                    <div>
                                                        <label class="block text-[12px] font-semibold text-ink-700 mb-1">USD Sale Price</label>
                                                        <input type="number" step="0.01" name="variants[{{ $val->id }}][sale_price_usd]" value="{{ old("variants.{$val->id}.sale_price_usd") }}" placeholder="Optional" class="h-9 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-900 focus:border-brand-600 focus:outline-none">
                                                    </div>

                                                    <!-- Stock Quantity -->
                                                    <div>
                                                        <label class="block text-[12px] font-semibold text-ink-700 mb-1">Stock Qty <span class="text-danger-500">*</span></label>
                                                        <input type="number" name="variants[{{ $val->id }}][stock]" value="{{ old("variants.{$val->id}.stock", 10) }}" placeholder="10" min="0" class="h-9 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-900 focus:border-brand-600 focus:outline-none">
                                                    </div>

                                                    <!-- Weight (g) -->
                                                    <div>
                                                        <label class="block text-[12px] font-semibold text-ink-700 mb-1">Weight (g)</label>
                                                        <input type="number" step="1" min="0" name="variants[{{ $val->id }}][weight_grams]" value="{{ old("variants.{$val->id}.weight_grams") }}" placeholder="e.g. 500" class="h-9 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-900 focus:border-brand-600 focus:outline-none">
                                                    </div>

                                                    <!-- SAP Code -->
                                                    <div>
                                                        <label class="block text-[12px] font-semibold text-ink-700 mb-1">SAP Code</label>
                                                        <input type="text" name="variants[{{ $val->id }}][sap_code]" value="{{ old("variants.{$val->id}.sap_code") }}" placeholder="Optional" class="h-9 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[13px] text-ink-900 focus:border-brand-600 focus:outline-none">
                                                    </div>

                                                    <!-- Variant Image -->
                                                    <div>
                                                        <label class="block text-[12px] font-semibold text-ink-700 mb-1">Variant Image</label>
                                                        <input type="file" name="variants[{{ $val->id }}][image]" accept="image/*" class="w-full text-[11px] text-ink-500 file:mr-1 file:py-1 file:px-2 file:rounded file:border-0 file:text-[11px] file:font-semibold file:bg-brand-50 file:text-brand-600 hover:file:bg-brand-100 cursor-pointer">
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
                            <p class="text-[14px]">No attributes created yet. Create attributes to add variant prices & stock.</p>
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
                                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category_id" class="block text-[14px] font-semibold text-ink-900 mb-2">Category <span class="text-danger-500">*</span></label>
                        <select name="category_id" id="category_id" required class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('category_id') border-danger-500 @enderror">
                            <option value="">Select Category</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Sub Category (Dynamic Filtering) -->
                    <div>
                        <label for="sub_category_id" class="block text-[14px] font-semibold text-ink-900 mb-2">Sub Category</label>
                        <select name="sub_category_id" id="sub_category_id" class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
                            <option value="">Select Sub Category (Select Category First)</option>
                            @foreach ($subCategories as $subCat)
                                <option value="{{ $subCat->id }}" data-category-id="{{ $subCat->category_id }}" {{ old('sub_category_id') == $subCat->id ? 'selected' : '' }}>
                                    {{ $subCat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="flex items-center gap-3 pt-2">
                        <input type="checkbox" name="status" id="status" value="1" {{ old('status', 1) ? 'checked' : '' }} class="h-4 w-4 rounded border-surface-line text-brand-600 focus:ring-brand-600">
                        <label for="status" class="text-[14px] font-semibold text-ink-900 cursor-pointer">Published / Active</label>
                    </div>
                </div>

                <!-- Featured Image Card -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-4">
                    <h2 class="text-[18px] font-semibold text-ink-900 border-b border-surface-line pb-3">Main Product Image</h2>

                    <div id="image-preview-container" class="hidden h-40 w-full overflow-hidden rounded-base border border-surface-line bg-surface-body p-2">
                        <img id="image-preview" src="#" alt="Product Preview" class="h-full w-full object-contain mx-auto">
                    </div>

                    <input type="file" name="image" id="image" accept="image/*" class="block w-full text-[14px] text-ink-500 file:mr-4 file:py-2 file:px-4 file:rounded-base file:border-0 file:text-[14px] file:font-semibold file:bg-brand-50 file:text-brand-600 hover:file:bg-brand-100 cursor-pointer">
                    <p class="text-[12px] text-ink-400">Main cover image for product cards & listing.</p>
                </div>

                <!-- Product Gallery Images Card -->
                <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-4">
                    <h2 class="text-[18px] font-semibold text-ink-900 border-b border-surface-line pb-3">Product Gallery Images</h2>

                    <div id="gallery-preview-container" class="hidden grid grid-cols-3 gap-2 p-2 rounded-base border border-surface-line bg-surface-body max-h-48 overflow-y-auto"></div>

                    <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple class="block w-full text-[14px] text-ink-500 file:mr-4 file:py-2 file:px-4 file:rounded-base file:border-0 file:text-[14px] file:font-semibold file:bg-brand-50 file:text-brand-600 hover:file:bg-brand-100 cursor-pointer">
                    <p class="text-[12px] text-ink-400">Select multiple images to show in the product details gallery carousel.</p>
                </div>

                <!-- Submit Button -->
                <div class="pt-2 flex items-center gap-3">
                    <button type="submit" class="w-full inline-flex h-12 items-center justify-center gap-2 rounded-base bg-brand-600 text-[15px] font-semibold text-white transition-colors hover:bg-brand-700 shadow-md">
                        <i data-lucide="check-circle" class="h-5 w-5"></i>
                        Publish Product
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

    // Main Image Preview Script
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

    // Gallery Multiple Images Accumulator Script
    const galleryInput = document.getElementById('gallery_images');
    const galleryPreviewContainer = document.getElementById('gallery-preview-container');
    const galleryDataTransfer = new DataTransfer();

    galleryInput.addEventListener('change', function(e) {
        const files = e.target.files;
        if (files && files.length > 0) {
            Array.from(files).forEach(file => {
                galleryDataTransfer.items.add(file);
            });
            galleryInput.files = galleryDataTransfer.files;
            renderGalleryPreviews();
        }
    });

    function renderGalleryPreviews() {
        galleryPreviewContainer.innerHTML = '';
        if (galleryDataTransfer.files.length > 0) {
            galleryPreviewContainer.classList.remove('hidden');
            Array.from(galleryDataTransfer.files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(ex) {
                    const imgDiv = document.createElement('div');
                    imgDiv.className = 'relative group h-24 w-full overflow-hidden rounded-base border border-surface-line bg-white p-1';
                    imgDiv.innerHTML = `
                        <img src="${ex.target.result}" class="h-full w-full object-contain mx-auto">
                        <button type="button" onclick="removePendingGalleryFile(${index})" class="absolute top-1 right-1 h-5 w-5 rounded-full bg-danger-500 text-white flex items-center justify-center shadow hover:bg-danger-600 transition-colors">
                            <i data-lucide="x" class="h-3 w-3"></i>
                        </button>
                    `;
                    galleryPreviewContainer.appendChild(imgDiv);
                    if (window.lucide) lucide.createIcons();
                }
                reader.readAsDataURL(file);
            });
        } else {
            galleryPreviewContainer.classList.add('hidden');
        }
    }

    function removePendingGalleryFile(index) {
        const newDT = new DataTransfer();
        Array.from(galleryDataTransfer.files).forEach((file, i) => {
            if (i !== index) {
                newDT.items.add(file);
            }
        });
        galleryDataTransfer.items.clear();
        Array.from(newDT.files).forEach(file => galleryDataTransfer.items.add(file));
        galleryInput.files = galleryDataTransfer.files;
        renderGalleryPreviews();
    }

    // Accordion expand / minimize helpers
    function toggleAttrGroup(button) {
        const card = button.closest('.attr-group-card');
        const content = card.querySelector('.attr-group-content');
        const chevron = card.querySelector('.attr-chevron');
        const status = card.querySelector('.attr-group-status');

        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            if (chevron) chevron.style.transform = 'rotate(180deg)';
            if (status) status.textContent = 'Minimize';
        } else {
            content.classList.add('hidden');
            if (chevron) chevron.style.transform = 'rotate(0deg)';
            if (status) status.textContent = 'Expand';
        }
    }

    function expandAllAttrGroups(containerId) {
        const container = document.getElementById(containerId) || document;
        container.querySelectorAll('.attr-group-card').forEach(card => {
            const content = card.querySelector('.attr-group-content');
            const chevron = card.querySelector('.attr-chevron');
            const status = card.querySelector('.attr-group-status');
            if (content) content.classList.remove('hidden');
            if (chevron) chevron.style.transform = 'rotate(180deg)';
            if (status) status.textContent = 'Minimize';
        });
    }

    function minimizeAllAttrGroups(containerId) {
        const container = document.getElementById(containerId) || document;
        container.querySelectorAll('.attr-group-card').forEach(card => {
            const content = card.querySelector('.attr-group-content');
            const chevron = card.querySelector('.attr-chevron');
            const status = card.querySelector('.attr-group-status');
            if (content) content.classList.add('hidden');
            if (chevron) chevron.style.transform = 'rotate(0deg)';
            if (status) status.textContent = 'Expand';
        });
    }

    // Dependent Category -> Sub Category Filter
    document.getElementById('category_id').addEventListener('change', function() {
        const selectedCategoryId = this.value;
        const subCatSelect = document.getElementById('sub_category_id');
        const options = subCatSelect.querySelectorAll('option');

        subCatSelect.value = "";

        options.forEach(option => {
            if (!option.value) return;

            const catId = option.getAttribute('data-category-id');
            if (selectedCategoryId === "" || catId === selectedCategoryId) {
                option.style.display = "block";
                option.disabled = false;
            } else {
                option.style.display = "none";
                option.disabled = true;
            }
        });
    });

    if (document.getElementById('category_id').value) {
        document.getElementById('category_id').dispatchEvent(new Event('change'));
    }
</script>
@endsection
