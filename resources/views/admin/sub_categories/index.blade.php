@extends('admin.layouts.app')

@section('title', 'Sub Category List - Admin NBC IT')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Sub Categories</h1>
            <p class="mt-1 text-[14px] text-ink-500">Manage sub-categories and drag them into the storefront menu order under each parent category.</p>
        </div>
        <div>
            <a href="{{ route('admin.sub-categories.create') }}" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-4 text-[14px] font-semibold text-white transition-colors hover:bg-brand-700">
                <i data-lucide="plus" class="h-4 w-4"></i>
                Add New Sub Category
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

    <!-- Content Card -->
    <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
        <!-- Search and Filter Bar -->
        <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
            <form action="{{ route('admin.sub-categories.index') }}" method="GET" class="flex flex-1 flex-wrap items-center gap-3 max-w-xl">
                <div class="relative flex-1 min-w-[200px]">
                    <i data-lucide="search" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-ink-400"></i>
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Search sub categories..." class="h-10 w-full rounded-base border border-surface-line bg-surface-body pl-9 pr-4 text-[14px] text-ink-700 placeholder:text-ink-400 focus:border-brand-600 focus:outline-none">
                </div>
                <div class="w-48">
                    <select name="category_id" onchange="this.form.submit()" class="h-10 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none">
                        <option value="">All Categories</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="h-10 rounded-base bg-surface-muted px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-line">Filter</button>
            </form>
            <p id="sub-category-order-status" class="text-[13px] text-ink-500" aria-live="polite">
                @if ($canReorder)
                    Drag the handle to reorder sub-categories within their parent category. Changes save automatically.
                @else
                    Clear the search to reorder sub-categories.
                @endif
            </p>
        </div>

        @if ($canReorder)
            {{-- Grouped by parent category, in menu order. Each group is sorted independently. --}}
            <div class="space-y-6" id="sub-category-groups"
                data-reorder-url="{{ route('admin.sub-categories.reorder') }}"
                data-csrf-token="{{ csrf_token() }}">
                @forelse ($groups as $category)
                    <section class="rounded-base border border-surface-line">
                        <div class="flex flex-wrap items-center justify-between gap-2 border-b border-surface-line bg-surface-body px-4 py-3">
                            <h2 class="inline-flex items-center gap-2 text-[15px] font-semibold text-ink-900">
                                <i data-lucide="folder" class="h-4 w-4 text-brand-600"></i>
                                {{ $category->name }}
                                @unless ($category->status)
                                    <span class="rounded-full bg-danger-50 px-2 py-0.5 text-[11px] font-semibold text-danger-500">Inactive</span>
                                @endunless
                            </h2>
                            <span class="text-[13px] text-ink-400">{{ $category->subCategories->count() }} {{ $category->subCategories->count() === 1 ? 'sub-category' : 'sub-categories' }}</span>
                        </div>
                        <div class="overflow-x-auto px-4">
                            <table class="w-full min-w-[600px] text-left text-[14px]">
                                <thead>
                                    <tr class="border-b border-surface-line text-[12px] uppercase text-ink-400">
                                        <th class="py-2.5 pr-4 font-semibold">Order</th>
                                        <th class="py-2.5 pr-4 font-semibold">Sub Category</th>
                                        <th class="py-2.5 pr-4 font-semibold">Slug</th>
                                        <th class="py-2.5 pr-4 font-semibold">Status</th>
                                        <th class="py-2.5 pr-4 font-semibold text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-surface-line" data-sortable-group data-category-id="{{ $category->id }}">
                                    @forelse ($category->subCategories as $subCategory)
                                        @include('admin.sub_categories._row', ['subCategory' => $subCategory, 'sortable' => true])
                                    @empty
                                        <tr>
                                            <td colspan="5" class="py-6 text-center text-ink-400">No sub categories in this category yet.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </section>
                @empty
                    <div class="py-8 text-center text-ink-400">
                        <i data-lucide="folder-open" class="mx-auto h-8 w-8 mb-2"></i>
                        No sub categories found.
                    </div>
                @endforelse
            </div>
        @else
            <!-- Search results -->
            <div class="overflow-x-auto">
                <table class="w-full min-w-[650px] text-left text-[14px]">
                    <thead>
                        <tr class="border-b border-surface-line text-[13px] uppercase text-ink-400">
                            <th class="pb-3 pr-4 font-semibold">Sub Category</th>
                            <th class="pb-3 pr-4 font-semibold">Parent Category</th>
                            <th class="pb-3 pr-4 font-semibold">Slug</th>
                            <th class="pb-3 pr-4 font-semibold">Status</th>
                            <th class="pb-3 pr-4 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-line">
                        @forelse ($subCategories as $subCategory)
                            @include('admin.sub_categories._row', ['subCategory' => $subCategory, 'sortable' => false])
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-ink-400">
                                    <i data-lucide="folder-open" class="mx-auto h-8 w-8 mb-2"></i>
                                    No sub categories found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $subCategories->links() }}
            </div>
        @endif
    </div>
</main>

@if ($canReorder)
    {{-- Drag to reorder within a parent category, then save that category's order --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('sub-category-groups');
            const status = document.getElementById('sub-category-order-status');
            if (!container) return;

            let draggedRow = null;
            let activeGroup = null;
            let originalOrder = '';

            const orderOf = group => Array.from(group.querySelectorAll('[data-sub-category-id]'))
                .map(row => Number(row.dataset.subCategoryId));

            container.addEventListener('dragstart', function(event) {
                const handle = event.target.closest('[data-drag-handle]');
                if (!handle) return;

                draggedRow = handle.closest('[data-sub-category-id]');
                activeGroup = draggedRow.closest('[data-sortable-group]');
                originalOrder = orderOf(activeGroup).join(',');
                draggedRow.style.opacity = '0.45';
                event.dataTransfer.effectAllowed = 'move';
                event.dataTransfer.setData('text/plain', draggedRow.dataset.subCategoryId);
            });

            container.addEventListener('dragover', function(event) {
                if (!draggedRow) return;

                const targetRow = event.target.closest('[data-sub-category-id]');
                // Only allow moves inside the same parent category.
                if (!targetRow || targetRow.closest('[data-sortable-group]') !== activeGroup) return;

                event.preventDefault();
                if (targetRow === draggedRow) return;

                const bounds = targetRow.getBoundingClientRect();
                const insertAfter = event.clientY > bounds.top + bounds.height / 2;
                activeGroup.insertBefore(draggedRow, insertAfter ? targetRow.nextSibling : targetRow);
            });

            container.addEventListener('dragend', async function() {
                if (!draggedRow) return;

                const group = activeGroup;
                draggedRow.style.opacity = '';
                draggedRow = null;
                activeGroup = null;

                const updatedOrder = orderOf(group);
                if (updatedOrder.join(',') === originalOrder) return;

                status.textContent = 'Saving sub-category order...';

                try {
                    const response = await fetch(container.dataset.reorderUrl, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': container.dataset.csrfToken,
                        },
                        body: JSON.stringify({
                            category_id: Number(group.dataset.categoryId),
                            sub_categories: updatedOrder,
                        }),
                    });

                    if (!response.ok) throw new Error('Unable to save sub-category order.');
                    status.textContent = 'Sub-category order saved.';
                } catch (error) {
                    status.textContent = 'Could not save the order. Refreshing the list...';
                    window.location.reload();
                }
            });
        });
    </script>
@endif
@endsection
