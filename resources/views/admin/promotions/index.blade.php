@extends('admin.layouts.app')

@section('title', 'Promotion List - Admin NBC')

@section('content')
    <main class="min-h-[calc(100vh-140px)] px-4 py-6 lg:px-6">
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <div>
                <h1 class="text-[24px] font-semibold text-ink-900">Promotions</h1>
                <p class="mt-1 text-[14px] text-ink-500">Manage promotional campaigns.</p>
            </div>
            <a href="{{ route('admin.promotions.create') }}"
                class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-4 text-[14px] font-semibold text-white transition-colors hover:bg-brand-700">
                <i data-lucide="plus" class="h-4 w-4"></i> Add New Promotion
            </a>
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
            <form action="{{ route('admin.promotions.index') }}" method="GET"
                class="mb-6 grid grid-cols-1 gap-3 md:grid-cols-4">
                <div class="relative md:col-span-2">
                    <i data-lucide="search"
                        class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-ink-400"></i>
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Search promotions..."
                        class="h-10 w-full rounded-base border border-surface-line bg-surface-body pl-9 pr-4 text-[14px] text-ink-700 focus:border-brand-600 focus:outline-none">
                </div>
                <select name="target_type"
                    class="h-10 rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700">
                    <option value="">All target types</option>
                    @foreach (\App\Models\Promotion::TARGET_TYPES as $value => $label)
                        <option value="{{ $value }}" @selected(request('target_type') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
                <div class="flex gap-2">
                    <select name="schedule_status"
                        class="h-10 min-w-0 flex-1 rounded-base border border-surface-line bg-surface-body px-3 text-[14px] text-ink-700">
                        <option value="">All statuses</option>
                        @foreach (['live' => 'Live', 'scheduled' => 'Scheduled', 'expired' => 'Expired', 'inactive' => 'Inactive'] as $value => $label)
                            <option value="{{ $value }}" @selected(request('schedule_status') === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                    <button
                        class="h-10 rounded-base bg-surface-muted px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-line"
                        type="submit">Filter</button>
                </div>
            </form>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[1000px] text-left text-[14px]">
                    <thead>
                        <tr class="border-b border-surface-line text-[13px] uppercase text-ink-400">
                            <th class="pb-3 pr-4 font-semibold">Promotion</th>
                            <th class="pb-3 pr-4 font-semibold">Target</th>
                            <th class="pb-3 pr-4 font-semibold">Starts</th>
                            <th class="pb-3 pr-4 font-semibold">Ends</th>
                            <th class="pb-3 pr-4 font-semibold">Status</th>
                            <th class="pb-3 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-line">
                        @forelse ($promotions as $promotion)
                            @php
                                $statusClasses = match ($promotion->schedule_status) {
                                    'live' => 'bg-success-50 text-success-600',
                                    'scheduled' => 'bg-brand-50 text-brand-600',
                                    'expired' => 'bg-surface-muted text-ink-500',
                                    default => 'bg-danger-50 text-danger-500',
                                };
                            @endphp
                            <tr class="transition-colors hover:bg-surface-body/70">
                                <td class="py-4 pr-4">
                                    <div class="flex min-w-[260px] items-center gap-3">
                                        <img src="{{ asset($promotion->image) }}" alt=""
                                            class="h-14 w-20 rounded-base border border-surface-line bg-surface-body object-cover">
                                        <div>
                                            <span class="block font-semibold text-ink-900">{{ $promotion->name }}</span>
                                            <span class="font-mono text-[12px] text-ink-400">{{ $promotion->slug }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 pr-4">
                                    <span
                                        class="block text-[12px] font-semibold uppercase text-ink-400">{{ $promotion->target_label }}</span>
                                    <span class="text-ink-700">{{ $promotion->target_name }}</span>
                                </td>
                                <td class="py-4 pr-4 text-ink-600">{{ $promotion->starts_at->format('d M Y') }}<span
                                        class="block text-[12px] text-ink-400">{{ $promotion->starts_at->format('h:i A') }}</span>
                                </td>
                                <td class="py-4 pr-4 text-ink-600">{{ $promotion->ends_at->format('d M Y') }}<span
                                        class="block text-[12px] text-ink-400">{{ $promotion->ends_at->format('h:i A') }}</span>
                                </td>
                                <td class="py-4 pr-4"><span
                                        class="inline-flex rounded-full px-2.5 py-1 text-[12px] font-semibold capitalize {{ $statusClasses }}">{{ $promotion->schedule_status }}</span>
                                </td>
                                <td class="py-4 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <a href="{{ route('admin.promotions.edit', $promotion) }}"
                                            class="inline-flex h-8 w-8 items-center justify-center rounded-base border border-surface-line text-ink-500 transition-colors hover:border-brand-200 hover:bg-brand-50 hover:text-brand-600"
                                            title="Edit promotion"><i data-lucide="pencil" class="h-4 w-4"></i></a>
                                        <form action="{{ route('admin.promotions.destroy', $promotion) }}" method="POST"
                                            class="inline" onsubmit="return confirm('Delete this promotion?');">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex h-8 w-8 items-center justify-center rounded-base border border-surface-line text-ink-500 transition-colors hover:border-danger-200 hover:bg-danger-50 hover:text-danger-500"
                                                title="Delete promotion"><i data-lucide="trash-2"
                                                    class="h-4 w-4"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-ink-400"><i data-lucide="badge-percent"
                                        class="mx-auto mb-2 h-9 w-9"></i>No promotions found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">{{ $promotions->links() }}</div>
        </div>
    </main>
@endsection
