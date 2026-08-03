@extends('admin.layouts.app')

@section('title', 'Sub Category List - Admin Unimart')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Sub Categories</h1>
            <p class="mt-1 text-[14px] text-ink-500">Manage sub-categories linked to parent categories, with uploaded images.</p>
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
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full min-w-[650px] text-left text-[14px]">
                <thead>
                    <tr class="border-b border-surface-line text-[13px] uppercase text-ink-400">
                        <th class="pb-3 pr-4 font-semibold">Image</th>
                        <th class="pb-3 pr-4 font-semibold">Sub Category</th>
                        <th class="pb-3 pr-4 font-semibold">Parent Category</th>
                        <th class="pb-3 pr-4 font-semibold">Slug</th>
                        <th class="pb-3 pr-4 font-semibold">Status</th>
                        <th class="pb-3 pr-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-line">
                    @forelse ($subCategories as $subCategory)
                        <tr class="hover:bg-surface-body/70 transition-colors">
                            <td class="py-4 pr-4">
                                <img src="{{ asset($subCategory->image) }}" alt="{{ $subCategory->name }}" class="h-12 w-12 rounded-base bg-surface-body object-cover border border-surface-line">
                            </td>
                            <td class="py-4 pr-4">
                                <span class="font-semibold text-ink-900 block">{{ $subCategory->name }}</span>
                            </td>
                            <td class="py-4 pr-4">
                                @if ($subCategory->category)
                                    <span class="inline-flex items-center gap-1.5 font-medium text-brand-600">
                                        <i data-lucide="folder" class="h-3.5 w-3.5"></i>
                                        {{ $subCategory->category->name }}
                                    </span>
                                @else
                                    <span class="text-ink-400 font-italic">N/A</span>
                                @endif
                            </td>
                            <td class="py-4 pr-4 text-ink-500 font-mono text-[13px]">
                                {{ $subCategory->slug }}
                            </td>
                            <td class="py-4 pr-4">
                                @if ($subCategory->status)
                                    <span class="inline-flex items-center rounded-full bg-success-50 px-2.5 py-0.5 text-[12px] font-semibold text-success-600">Active</span>
                                @else
                                    <span class="inline-flex items-center rounded-full bg-danger-50 px-2.5 py-0.5 text-[12px] font-semibold text-danger-500">Inactive</span>
                                @endif
                            </td>
                            <td class="py-4 pr-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('admin.sub-categories.edit', $subCategory->id) }}" class="inline-flex h-8 w-8 items-center justify-center rounded-base border border-surface-line text-ink-500 hover:bg-brand-50 hover:text-brand-600 hover:border-brand-200 transition-colors" title="Edit Sub Category">
                                        <i data-lucide="pencil" class="h-4 w-4"></i>
                                    </a>
                                    <form action="{{ route('admin.sub-categories.destroy', $subCategory->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this sub-category?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex h-8 w-8 items-center justify-center rounded-base border border-surface-line text-ink-500 hover:bg-danger-50 hover:text-danger-500 hover:border-danger-200 transition-colors" title="Delete Sub Category">
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
    </div>
</main>
@endsection
