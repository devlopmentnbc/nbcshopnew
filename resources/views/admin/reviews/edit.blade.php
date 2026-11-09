@extends('admin.layouts.app')

@section('title', 'Edit Product Review - Admin NBC IT')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Edit Product Review</h1>
            <p class="mt-1 text-[14px] text-ink-500">
                {{ $review->isManual() ? 'Manual review added by an admin.' : 'Review submitted by a customer.' }}
            </p>
        </div>
        <div>
            <a href="{{ route('admin.reviews.index') }}" class="inline-flex h-11 items-center gap-2 rounded-base border border-surface-line px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors">
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
                Back to Reviews
            </a>
        </div>
    </div>

    <div class="max-w-2xl rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
        <form action="{{ route('admin.reviews.update', $review) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            @include('admin.reviews._form', ['review' => $review])

            <div class="pt-4 flex items-center gap-3">
                <button type="submit" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-6 text-[14px] font-semibold text-white transition-colors hover:bg-brand-700">
                    <i data-lucide="check" class="h-4 w-4"></i>
                    Update Review
                </button>
                <a href="{{ route('admin.reviews.index') }}" class="inline-flex h-11 items-center gap-2 rounded-base border border-surface-line px-6 text-[14px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</main>
@endsection
