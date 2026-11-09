@php
    $review = $review ?? null;
    $isManual = ! $review || $review->isManual();
    $currentProductId = old('product_id', $review?->product_id ?? ($selectedProductId ?? null));
    $currentRating = (int) old('rating', $review?->rating ?? 5);
    $inputClass = 'h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none';
@endphp

<!-- Product -->
<div>
    <label for="product_id" class="block text-[14px] font-semibold text-ink-900 mb-2">Product <span class="text-danger-500">*</span></label>
    <select name="product_id" id="product_id" required class="{{ $inputClass }} @error('product_id') border-danger-500 @enderror">
        <option value="">Select a product</option>
        @foreach ($products as $product)
            <option value="{{ $product->id }}" @selected((string) $currentProductId === (string) $product->id)>{{ $product->name }}</option>
        @endforeach
    </select>
    @error('product_id')
        <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
    @enderror
</div>

<!-- Reviewer Name -->
<div>
    @if ($isManual)
        <label for="reviewer_name" class="block text-[14px] font-semibold text-ink-900 mb-2">Reviewer Name <span class="text-danger-500">*</span></label>
        <input type="text" name="reviewer_name" id="reviewer_name" maxlength="120" required value="{{ old('reviewer_name', $review?->reviewer_name) }}" placeholder="e.g. Nimali P." class="{{ $inputClass }} @error('reviewer_name') border-danger-500 @enderror">
        @error('reviewer_name')
            <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
        @enderror
    @else
        <label class="block text-[14px] font-semibold text-ink-900 mb-2">Reviewer</label>
        <p class="text-[14px] text-ink-700">{{ $review->user?->name ?? 'Deleted user' }} <span class="text-ink-400">(customer account)</span></p>
    @endif
</div>

<!-- Rating -->
<div>
    <label for="rating" class="block text-[14px] font-semibold text-ink-900 mb-2">Rating <span class="text-danger-500">*</span></label>
    <select name="rating" id="rating" required class="{{ $inputClass }} @error('rating') border-danger-500 @enderror">
        @for ($i = 5; $i >= 1; $i--)
            <option value="{{ $i }}" @selected($currentRating === $i)>{{ str_repeat('★', $i) . str_repeat('☆', 5 - $i) }} &nbsp;({{ $i }} {{ $i === 1 ? 'star' : 'stars' }})</option>
        @endfor
    </select>
    @error('rating')
        <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
    @enderror
</div>

<!-- Title -->
<div>
    <label for="title" class="block text-[14px] font-semibold text-ink-900 mb-2">Review Title <span class="text-ink-400 font-normal">(Optional)</span></label>
    <input type="text" name="title" id="title" maxlength="120" value="{{ old('title', $review?->title) }}" class="{{ $inputClass }} @error('title') border-danger-500 @enderror">
    @error('title')
        <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
    @enderror
</div>

<!-- Comment -->
<div>
    <label for="comment" class="block text-[14px] font-semibold text-ink-900 mb-2">Review <span class="text-danger-500">*</span></label>
    <textarea name="comment" id="comment" rows="5" maxlength="2000" required class="w-full rounded-base border border-surface-line bg-surface-body px-4 py-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('comment') border-danger-500 @enderror">{{ old('comment', $review?->comment) }}</textarea>
    @error('comment')
        <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
    @enderror
</div>

<!-- Review Date -->
<div>
    <label for="review_date" class="block text-[14px] font-semibold text-ink-900 mb-2">Review Date <span class="text-ink-400 font-normal">(Optional - defaults to today)</span></label>
    <input type="date" name="review_date" id="review_date" max="{{ now()->toDateString() }}" value="{{ old('review_date', $review?->created_at?->toDateString()) }}" class="{{ $inputClass }} max-w-xs @error('review_date') border-danger-500 @enderror">
    @error('review_date')
        <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
    @enderror
</div>
