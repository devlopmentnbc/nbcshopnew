<div class="flex items-start gap-2" data-extra-category-row>
    <div class="flex-1 space-y-2">
        <select name="extra_categories[{{ $index }}][category_id]" data-extra-category
            class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
            <option value="">Select Category</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" {{ (string) $selectedCategoryId === (string) $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
        <select name="extra_categories[{{ $index }}][sub_category_id]" data-extra-sub-category
            class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
            <option value="">No Sub Category</option>
            @foreach ($subCategories as $subCat)
                <option value="{{ $subCat->id }}" data-category-id="{{ $subCat->category_id }}" {{ (string) $selectedSubCategoryId === (string) $subCat->id ? 'selected' : '' }}>
                    {{ $subCat->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="button" data-remove-extra-category title="Remove"
        class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-base border border-surface-line text-ink-500 hover:bg-danger-50 hover:text-danger-500 hover:border-danger-200 transition-colors">
        <i data-lucide="x" class="h-4 w-4"></i>
    </button>
</div>
