@extends('admin.layouts.app')

@section('title', 'New Arrivals Products - Admin Unimart')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">New Arrivals</h1>
            <p class="mt-1 text-[14px] text-ink-500">Manage products featured in the New Arrivals section on the homepage (Max 6 products).</p>
        </div>
        <div>
            <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-[13px] font-semibold {{ count($newArrivals) >= 6 ? 'bg-amber-100 text-amber-800' : 'bg-brand-50 text-brand-600' }}">
                <i data-lucide="sparkles" class="h-4 w-4"></i>
                {{ count($newArrivals) }} / 6 Products Added
            </span>
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

    @if (session('error'))
        <div class="mb-6 rounded-base border border-danger-600/20 bg-danger-50 p-4 text-danger-700">
            <div class="flex items-center gap-3">
                <i data-lucide="alert-circle" class="h-5 w-5 text-danger-600"></i>
                <p class="text-[14px] font-medium">{{ session('error') }}</p>
            </div>
        </div>
    @endif

    @if (session('info'))
        <div class="mb-6 rounded-base border border-blue-600/20 bg-blue-50 p-4 text-blue-700">
            <div class="flex items-center gap-3">
                <i data-lucide="info" class="h-5 w-5 text-blue-600"></i>
                <p class="text-[14px] font-medium">{{ session('info') }}</p>
            </div>
        </div>
    @endif

    <!-- Add Product Section -->
    <div class="mb-6 rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
        <h2 class="text-[16px] font-semibold text-ink-900 mb-4">Add Product to New Arrivals</h2>
        
        @if (count($newArrivals) >= 6)
            <div class="rounded-base border border-amber-200 bg-amber-50 p-4 text-[14px] text-amber-800 flex items-center gap-3">
                <i data-lucide="alert-triangle" class="h-5 w-5 shrink-0 text-amber-600"></i>
                <span>You have reached the maximum limit of <strong>6 products</strong> for New Arrivals. Remove an existing product to add a new one.</span>
            </div>
        @else
            <form action="{{ route('admin.featured.new-arrivals.add') }}" method="POST" class="flex flex-wrap items-end gap-4">
                @csrf
                <div class="flex-1 min-w-[280px]">
                    <label for="product_id" class="block text-[13px] font-medium text-ink-700 mb-1">Select Product</label>
                    <select name="product_id" id="product_id" required class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none">
                        <option value="">-- Choose a Product --</option>
                        @foreach ($availableProducts as $prod)
                            <option value="{{ $prod->id }}">
                                {{ $prod->name }} {{ $prod->sku ? '(' . $prod->sku . ')' : '' }} - {{ $prod->category ? $prod->category->name : 'No Category' }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-5 text-[14px] font-semibold text-white transition-colors hover:bg-brand-700">
                    <i data-lucide="plus" class="h-4 w-4"></i>
                    Add to New Arrivals
                </button>
            </form>
        @endif
    </div>

    <!-- Product List Card -->
    <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
        <h2 class="text-[16px] font-semibold text-ink-900 mb-4">Current New Arrival Products</h2>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[650px] text-left text-[14px]">
                <thead>
                    <tr class="border-b border-surface-line text-[13px] uppercase text-ink-400">
                        <th class="pb-3 pr-4 font-semibold">Image</th>
                        <th class="pb-3 pr-4 font-semibold">Product Name</th>
                        <th class="pb-3 pr-4 font-semibold">SKU</th>
                        <th class="pb-3 pr-4 font-semibold">Category</th>
                        <th class="pb-3 pr-4 font-semibold">Status</th>
                        <th class="pb-3 pr-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-line">
                    @forelse ($newArrivals as $product)
                        <tr class="hover:bg-surface-body/70 transition-colors">
                            <td class="py-4 pr-4">
                                @if ($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-12 w-12 rounded-base bg-surface-body object-contain p-1 border border-surface-line">
                                @else
                                    <div class="flex h-12 w-12 items-center justify-center rounded-base bg-surface-muted text-ink-400 font-semibold text-[11px] border border-surface-line">
                                        No Image
                                    </div>
                                @endif
                            </td>
                            <td class="py-4 pr-4">
                                <span class="font-semibold text-ink-900 block">{{ $product->name }}</span>
                                @if($product->brand)
                                    <span class="text-[12px] text-ink-400 block">{{ $product->brand->name }}</span>
                                @endif
                            </td>
                            <td class="py-4 pr-4 text-ink-500 font-mono text-[13px]">
                                {{ $product->sku ?? 'N/A' }}
                            </td>
                            <td class="py-4 pr-4 text-ink-700">
                                {{ $product->category->name ?? 'N/A' }}
                            </td>
                            <td class="py-4 pr-4">
                                @if ($product->status)
                                    <span class="inline-flex items-center rounded-full bg-success-50 px-2.5 py-0.5 text-[12px] font-semibold text-success-600">Active</span>
                                @else
                                    <span class="inline-flex items-center rounded-full bg-danger-50 px-2.5 py-0.5 text-[12px] font-semibold text-danger-500">Inactive</span>
                                @endif
                            </td>
                            <td class="py-4 pr-4 text-right">
                                <form action="{{ route('admin.featured.new-arrivals.remove', $product->id) }}" method="POST" onsubmit="return confirm('Remove this product from New Arrivals?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex h-9 px-3 items-center justify-center gap-1.5 rounded-base border border-danger-200 bg-danger-50 text-danger-600 hover:bg-danger-600 hover:text-white transition-colors text-[13px] font-medium" title="Remove from New Arrivals">
                                        <i data-lucide="trash-2" class="h-4 w-4"></i>
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-ink-400">
                                <i data-lucide="folder-open" class="mx-auto h-8 w-8 mb-2"></i>
                                No New Arrival products added yet. Use the form above to add products.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
