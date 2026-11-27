@extends('admin.layouts.app')

@section('title', 'Brand List - Admin NBC IT')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Brands</h1>
            <p class="mt-1 text-[14px] text-ink-500">Manage brands and drag them into the storefront menu and Trusted Brands order.</p>
        </div>
        <div>
            <a href="{{ route('admin.brands.create') }}" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-4 text-[14px] font-semibold text-white transition-colors hover:bg-brand-700">
                <i data-lucide="plus" class="h-4 w-4"></i>
                Add New Brand
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
            <form action="{{ route('admin.brands.index') }}" method="GET" class="flex flex-1 items-center gap-2 max-w-md">
                <div class="relative w-full">
                    <i data-lucide="search" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-ink-400"></i>
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Search brands..." class="h-10 w-full rounded-base border border-surface-line bg-surface-body pl-9 pr-4 text-[14px] text-ink-700 placeholder:text-ink-400 focus:border-brand-600 focus:outline-none">
                </div>
                <button type="submit" class="h-10 rounded-base bg-surface-muted px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-line">Search</button>
            </form>
            @if (!request()->filled('search'))
                <p id="brand-order-status" class="text-[13px] text-ink-500" aria-live="polite">
                    Drag the handle to change the display order.
                </p>
            @endif
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full min-w-[650px] text-left text-[14px]">
                <thead>
                    <tr class="border-b border-surface-line text-[13px] uppercase text-ink-400">
                        <th class="pb-3 pr-4 font-semibold">Order</th>
                        <th class="pb-3 pr-4 font-semibold">Image</th>
                        <th class="pb-3 pr-4 font-semibold">Brand Name</th>
                        <th class="pb-3 pr-4 font-semibold">Slug</th>
                        <th class="pb-3 pr-4 font-semibold">Status</th>
                        <th class="pb-3 pr-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody id="brand-sortable" class="divide-y divide-surface-line"
                    data-reorder-url="{{ route('admin.brands.reorder') }}"
                    data-csrf-token="{{ csrf_token() }}">
                    @forelse ($brands as $brand)
                        <tr class="hover:bg-surface-body/70 transition-colors" data-brand-id="{{ $brand->id }}">
                            <td class="py-4 pr-4">
                                @if (!request()->filled('search'))
                                    <button type="button" draggable="true" data-drag-handle
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-base border border-surface-line text-ink-400 hover:bg-surface-muted hover:text-ink-700"
                                        style="cursor: grab" aria-label="Drag {{ $brand->name }} to reorder"
                                        title="Drag to reorder">
                                        <i data-lucide="grip-vertical" class="h-4 w-4 pointer-events-none"></i>
                                    </button>
                                @else
                                    <span class="text-ink-400">{{ $brand->sort_order }}</span>
                                @endif
                            </td>
                            <td class="py-4 pr-4">
                                @if ($brand->image)
                                    <img src="{{ asset($brand->image) }}" alt="{{ $brand->name }}" class="h-12 w-12 rounded-base bg-surface-body object-contain p-1 border border-surface-line">
                                @else
                                    <div class="flex h-12 w-12 items-center justify-center rounded-base bg-surface-muted text-ink-400 font-semibold text-[13px] border border-surface-line">
                                        No Image
                                    </div>
                                @endif
                            </td>
                            <td class="py-4 pr-4">
                                <span class="font-semibold text-ink-900 block">{{ $brand->name }}</span>
                            </td>
                            <td class="py-4 pr-4 text-ink-500 font-mono text-[13px]">
                                {{ $brand->slug }}
                            </td>
                            <td class="py-4 pr-4">
                                @if ($brand->status)
                                    <span class="inline-flex items-center rounded-full bg-success-50 px-2.5 py-0.5 text-[12px] font-semibold text-success-600">Active</span>
                                @else
                                    <span class="inline-flex items-center rounded-full bg-danger-50 px-2.5 py-0.5 text-[12px] font-semibold text-danger-500">Inactive</span>
                                @endif
                            </td>
                            <td class="py-4 pr-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('admin.brands.edit', $brand->id) }}" class="inline-flex h-8 w-8 items-center justify-center rounded-base border border-surface-line text-ink-500 hover:bg-brand-50 hover:text-brand-600 hover:border-brand-200 transition-colors" title="Edit Brand">
                                        <i data-lucide="pencil" class="h-4 w-4"></i>
                                    </a>
                                    <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this brand?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex h-8 w-8 items-center justify-center rounded-base border border-surface-line text-ink-500 hover:bg-danger-50 hover:text-danger-500 hover:border-danger-200 transition-colors" title="Delete Brand">
                                            <i data-lucide="trash-2" class="h-4 w-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-ink-400">
                                <i data-lucide="folder-open" class="mx-auto h-8 w-8 mb-2"></i>
                                No brands found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

@if (!request()->filled('search'))
    <script>
        // Save the new brand order after a row is dragged.
        document.addEventListener('DOMContentLoaded', function() {
            const tbody = document.getElementById('brand-sortable');
            const status = document.getElementById('brand-order-status');
            let draggedRow = null;
            let originalOrder = [];

            if (!tbody) return;

            const currentOrder = () => Array.from(tbody.querySelectorAll('[data-brand-id]'))
                .map(row => Number(row.dataset.brandId));

            tbody.addEventListener('dragstart', function(event) {
                const handle = event.target.closest('[data-drag-handle]');
                if (!handle) return;

                draggedRow = handle.closest('[data-brand-id]');
                originalOrder = currentOrder();
                draggedRow.style.opacity = '0.45';
                event.dataTransfer.effectAllowed = 'move';
                event.dataTransfer.setData('text/plain', draggedRow.dataset.brandId);
            });

            tbody.addEventListener('dragover', function(event) {
                if (!draggedRow) return;

                event.preventDefault();
                const targetRow = event.target.closest('[data-brand-id]');
                if (!targetRow || targetRow === draggedRow) return;

                const bounds = targetRow.getBoundingClientRect();
                const insertAfter = event.clientY > bounds.top + bounds.height / 2;
                tbody.insertBefore(draggedRow, insertAfter ? targetRow.nextSibling : targetRow);
            });

            tbody.addEventListener('dragend', async function() {
                if (!draggedRow) return;

                draggedRow.style.opacity = '';
                draggedRow = null;
                const updatedOrder = currentOrder();

                if (updatedOrder.join(',') === originalOrder.join(',')) return;

                status.textContent = 'Saving brand order…';

                try {
                    const response = await fetch(tbody.dataset.reorderUrl, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': tbody.dataset.csrfToken,
                        },
                        body: JSON.stringify({ brands: updatedOrder }),
                    });

                    if (!response.ok) throw new Error('Unable to save brand order.');
                    status.textContent = 'Brand order saved.';
                } catch (error) {
                    status.textContent = 'Could not save the order. Refreshing the list…';
                    window.location.reload();
                }
            });
        });
    </script>
@endif
@endsection
