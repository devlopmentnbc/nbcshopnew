{{-- Additional categories: list the product under more categories than its main one. --}}
@php
    $extraCategoryRows = collect(old('extra_categories', isset($product)
        ? $product->additionalCategories->map->only(['category_id', 'sub_category_id'])->all()
        : []))->values();
@endphp

<div class="border-t border-surface-line pt-4">
    <label class="block text-[14px] font-semibold text-ink-900 mb-1">Additional Categories</label>
    <p class="mb-3 text-[12px] text-ink-400">Also show this product under these categories.</p>

    <div id="extra-categories-list" class="space-y-3" data-next-index="{{ $extraCategoryRows->count() }}">
        @foreach ($extraCategoryRows as $index => $row)
            @include('admin.products.partials.additional-category-row', [
                'index' => $index,
                'selectedCategoryId' => $row['category_id'] ?? null,
                'selectedSubCategoryId' => $row['sub_category_id'] ?? null,
            ])
        @endforeach
    </div>

    <button type="button" id="add-extra-category"
        class="mt-3 inline-flex h-9 items-center gap-2 rounded-base border border-surface-line px-3 text-[13px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors">
        <i data-lucide="plus" class="h-4 w-4"></i>
        Add Category
    </button>

    <template id="extra-category-template">
        @include('admin.products.partials.additional-category-row', [
            'index' => '__INDEX__',
            'selectedCategoryId' => null,
            'selectedSubCategoryId' => null,
        ])
    </template>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const list = document.getElementById('extra-categories-list');
        const template = document.getElementById('extra-category-template');
        const addButton = document.getElementById('add-extra-category');

        if (!list || !template || !addButton) return;

        // Only show sub-categories that belong to the row's selected category.
        const filterSubCategories = (row) => {
            const categoryId = row.querySelector('[data-extra-category]').value;
            const subSelect = row.querySelector('[data-extra-sub-category]');

            subSelect.querySelectorAll('option').forEach(option => {
                if (!option.value) return;

                const matches = categoryId !== '' && option.dataset.categoryId === categoryId;
                option.hidden = !matches;
                option.disabled = !matches;
                if (!matches && option.selected) subSelect.value = '';
            });
        };

        list.querySelectorAll('[data-extra-category-row]').forEach(filterSubCategories);

        list.addEventListener('change', function(event) {
            if (event.target.matches('[data-extra-category]')) {
                filterSubCategories(event.target.closest('[data-extra-category-row]'));
            }
        });

        list.addEventListener('click', function(event) {
            const removeButton = event.target.closest('[data-remove-extra-category]');
            if (removeButton) removeButton.closest('[data-extra-category-row]').remove();
        });

        addButton.addEventListener('click', function() {
            const index = Number(list.dataset.nextIndex);
            list.dataset.nextIndex = index + 1;

            const wrapper = document.createElement('div');
            wrapper.innerHTML = template.innerHTML.replaceAll('__INDEX__', index).trim();
            const row = wrapper.firstElementChild;
            list.appendChild(row);
            filterSubCategories(row);

            if (window.lucide) window.lucide.createIcons();
        });
    });
</script>
