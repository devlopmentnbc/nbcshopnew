@extends('admin.layouts.app')

@section('title', 'Attributes List - Admin Unimart')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Attributes</h1>
            <p class="mt-1 text-[14px] text-ink-500">Manage product attributes (e.g. Size, Weight, Volume) and metrics (e.g. ml, kg, g).</p>
        </div>
        <div>
            <a href="{{ route('admin.attributes.create') }}" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-4 text-[14px] font-semibold text-white transition-colors hover:bg-brand-700">
                <i data-lucide="plus" class="h-4 w-4"></i>
                Add New Attribute
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
            <form action="{{ route('admin.attributes.index') }}" method="GET" class="flex flex-1 items-center gap-2 max-w-md">
                <div class="relative w-full">
                    <i data-lucide="search" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-ink-400"></i>
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Search attributes or values..." class="h-10 w-full rounded-base border border-surface-line bg-surface-body pl-9 pr-4 text-[14px] text-ink-700 placeholder:text-ink-400 focus:border-brand-600 focus:outline-none">
                </div>
                <button type="submit" class="h-10 rounded-base bg-surface-muted px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-line">Search</button>
            </form>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full min-w-[650px] text-left text-[14px]">
                <thead>
                    <tr class="border-b border-surface-line text-[13px] uppercase text-ink-400">
                        <th class="pb-3 pr-4 font-semibold">Attribute Name</th>
                        <th class="pb-3 pr-4 font-semibold">Slug</th>
                        <th class="pb-3 pr-4 font-semibold">Attribute Values & Metrics</th>
                        <th class="pb-3 pr-4 font-semibold">Status</th>
                        <th class="pb-3 pr-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-line">
                    @forelse ($attributes as $attribute)
                        <tr class="hover:bg-surface-body/70 transition-colors">
                            <td class="py-4 pr-4">
                                <span class="font-semibold text-ink-900 block">{{ $attribute->name }}</span>
                            </td>
                            <td class="py-4 pr-4 text-ink-500 font-mono text-[13px]">
                                {{ $attribute->slug }}
                            </td>
                            <td class="py-4 pr-4">
                                <div class="flex flex-wrap gap-1.5 max-w-lg">
                                    @forelse ($attribute->values as $val)
                                        <span class="inline-flex items-center gap-1 rounded-base border border-surface-line bg-surface-body px-2.5 py-1 text-[12px] font-medium text-ink-700">
                                            <span class="font-semibold text-ink-900">{{ $val->value_name }}</span>
                                            <span class="text-ink-400">({{ $val->value }}{{ $val->metric ? ' ' . $val->metric : '' }})</span>
                                        </span>
                                    @empty
                                        <span class="text-ink-400 text-[13px] italic">No values added yet</span>
                                    @endforelse
                                </div>
                            </td>
                            <td class="py-4 pr-4">
                                @if ($attribute->status)
                                    <span class="inline-flex items-center rounded-full bg-success-50 px-2.5 py-0.5 text-[12px] font-semibold text-success-600">Active</span>
                                @else
                                    <span class="inline-flex items-center rounded-full bg-danger-50 px-2.5 py-0.5 text-[12px] font-semibold text-danger-500">Inactive</span>
                                @endif
                            </td>
                            <td class="py-4 pr-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="inline-flex h-8 w-8 items-center justify-center rounded-base border border-surface-line text-ink-500 hover:bg-brand-50 hover:text-brand-600 hover:border-brand-200 transition-colors" title="Edit Attribute">
                                        <i data-lucide="pencil" class="h-4 w-4"></i>
                                    </a>
                                    <form action="{{ route('admin.attributes.destroy', $attribute->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this attribute and all its values?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex h-8 w-8 items-center justify-center rounded-base border border-surface-line text-ink-500 hover:bg-danger-50 hover:text-danger-500 hover:border-danger-200 transition-colors" title="Delete Attribute">
                                            <i data-lucide="trash-2" class="h-4 w-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-ink-400">
                                <i data-lucide="sliders-horizontal" class="mx-auto h-8 w-8 mb-2"></i>
                                No attributes found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $attributes->links() }}
        </div>
    </div>
</main>
@endsection
