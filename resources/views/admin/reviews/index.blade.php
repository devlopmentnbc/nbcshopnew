@extends('admin.layouts.app')

@section('title', 'Product Reviews - Admin NBC IT')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Product Reviews</h1>
            <p class="mt-1 text-[14px] text-ink-500">View customer reviews and add manual reviews to products.</p>
        </div>
        <div>
            <a href="{{ route('admin.reviews.create', array_filter(['product_id' => request('product_id')])) }}" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-4 text-[14px] font-semibold text-white transition-colors hover:bg-brand-700">
                <i data-lucide="plus" class="h-4 w-4"></i>
                Add Manual Review
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

    <div class="rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
        <form action="{{ route('admin.reviews.index') }}" method="GET" class="mb-6 flex flex-wrap items-center gap-2">
            <div class="relative w-full max-w-xs">
                <i data-lucide="search" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-ink-400"></i>
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Search reviews..." class="h-10 w-full rounded-base border border-surface-line bg-surface-body pl-9 pr-4 text-[14px] text-ink-700 placeholder:text-ink-400 focus:border-brand-600 focus:outline-none">
            </div>
            <select name="product_id" class="h-10 max-w-xs rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none">
                <option value="">All products</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" @selected((string) request('product_id') === (string) $product->id)>{{ $product->name }}</option>
                @endforeach
            </select>
            <select name="source" class="h-10 rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none">
                <option value="">All sources</option>
                <option value="manual" @selected(request('source') === 'manual')>Manual</option>
                <option value="customer" @selected(request('source') === 'customer')>Customer</option>
            </select>
            <button type="submit" class="h-10 rounded-base bg-surface-muted px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-line">Filter</button>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px] text-left text-[14px]">
                <thead>
                    <tr class="border-b border-surface-line text-[13px] uppercase text-ink-400">
                        <th class="pb-3 pr-4 font-semibold">Product</th>
                        <th class="pb-3 pr-4 font-semibold">Reviewer</th>
                        <th class="pb-3 pr-4 font-semibold">Rating</th>
                        <th class="pb-3 pr-4 font-semibold">Review</th>
                        <th class="pb-3 pr-4 font-semibold">Date</th>
                        <th class="pb-3 pr-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-line">
                    @forelse ($reviews as $review)
                        <tr class="hover:bg-surface-body/70 transition-colors align-top">
                            <td class="py-4 pr-4">
                                <span class="font-semibold text-ink-900 block">{{ $review->product?->name ?? '—' }}</span>
                            </td>
                            <td class="py-4 pr-4">
                                <span class="block text-ink-900">{{ $review->display_name }}</span>
                                @if ($review->isManual())
                                    <span class="mt-1 inline-flex items-center rounded-full bg-brand-50 px-2.5 py-0.5 text-[12px] font-semibold text-brand-600">Manual</span>
                                @else
                                    <span class="mt-1 inline-flex items-center rounded-full bg-success-50 px-2.5 py-0.5 text-[12px] font-semibold text-success-600">Customer</span>
                                @endif
                            </td>
                            <td class="py-4 pr-4 whitespace-nowrap text-warning-500" aria-label="{{ $review->rating }} out of 5 stars">
                                {{ str_repeat('★', $review->rating) }}<span class="text-ink-300">{{ str_repeat('★', 5 - $review->rating) }}</span>
                            </td>
                            <td class="py-4 pr-4 max-w-md">
                                @if ($review->title)
                                    <span class="block font-semibold text-ink-900">{{ $review->title }}</span>
                                @endif
                                <span class="block text-ink-500">{{ \Illuminate\Support\Str::limit($review->comment, 140) }}</span>
                            </td>
                            <td class="py-4 pr-4 whitespace-nowrap text-ink-500">{{ $review->created_at->format('d M Y') }}</td>
                            <td class="py-4 pr-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('admin.reviews.edit', $review) }}" class="inline-flex h-8 w-8 items-center justify-center rounded-base border border-surface-line text-ink-500 hover:bg-brand-50 hover:text-brand-600 hover:border-brand-200 transition-colors" title="Edit Review">
                                        <i data-lucide="pencil" class="h-4 w-4"></i>
                                    </a>
                                    <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex h-8 w-8 items-center justify-center rounded-base border border-surface-line text-ink-500 hover:bg-danger-50 hover:text-danger-500 hover:border-danger-200 transition-colors" title="Delete Review">
                                            <i data-lucide="trash-2" class="h-4 w-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-ink-400">
                                <i data-lucide="message-square" class="mx-auto h-8 w-8 mb-2"></i>
                                No reviews found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $reviews->links() }}
        </div>
    </div>
</main>
@endsection
