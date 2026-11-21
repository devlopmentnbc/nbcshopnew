@extends('admin.layouts.app')

@section('title', 'Product Benefits - Admin')

@php
    $inputClass = 'h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none';
    $labelClass = 'block text-[14px] font-semibold text-ink-900 mb-2';
@endphp

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <div class="mb-6">
        <h1 class="text-[24px] font-semibold text-ink-900">Product Benefits</h1>
        <p class="mt-1 text-[14px] text-ink-500">The two small badges shown under the price on every product details page. Turn one off to hide it.</p>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-base border border-success-600/20 bg-success-50 p-4 text-success-700">
            <div class="flex items-center gap-3">
                <i data-lucide="check-circle" class="h-5 w-5 text-success-600"></i>
                <p class="text-[14px] font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 rounded-base border border-danger-500/20 bg-danger-50 p-4 text-danger-600">
            <ul class="list-disc pl-5 text-[14px]">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.settings.product-benefits.update') }}" method="POST"
        class="max-w-3xl rounded-card border border-surface-line bg-surface-card p-6 shadow-card space-y-6">
        @csrf

        @foreach ($items as $i => $item)
            <div class="{{ $i > 0 ? 'border-t border-surface-line pt-5' : '' }}">
                <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
                    <h2 class="text-[18px] font-semibold text-ink-900">Benefit {{ $i + 1 }}</h2>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="hidden" name="items[{{ $i }}][enabled]" value="0">
                        <input type="checkbox" name="items[{{ $i }}][enabled]" value="1" class="h-4 w-4 accent-brand-600"
                            @checked(old("items.$i.enabled", $item['enabled']))>
                        <span class="text-[14px] font-semibold text-ink-900">Active</span>
                    </label>
                </div>
                <div class="grid gap-4 md:grid-cols-[1fr_240px]">
                    <div>
                        <label for="pb-text-{{ $i }}" class="{{ $labelClass }}">Text</label>
                        <input id="pb-text-{{ $i }}" type="text" name="items[{{ $i }}][text]" maxlength="60"
                            value="{{ old("items.$i.text", $item['text']) }}" class="{{ $inputClass }}">
                    </div>
                    <div>
                        <label for="pb-icon-{{ $i }}" class="{{ $labelClass }}">Icon</label>
                        <select id="pb-icon-{{ $i }}" name="items[{{ $i }}][icon]" class="{{ $inputClass }}">
                            @foreach ($icons as $value => $label)
                                <option value="{{ $value }}" @selected(old("items.$i.icon", $item['icon']) === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="border-t border-surface-line pt-5">
            <button type="submit" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-5 text-[14px] font-semibold text-white hover:bg-brand-700 transition-colors">
                <i data-lucide="save" class="h-4 w-4"></i>
                Save Benefits
            </button>
        </div>
    </form>
</main>
@endsection
