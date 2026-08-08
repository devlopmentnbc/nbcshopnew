<div class="tab-content">
    <div class="tab-pane fade show active" id="rbt-description" role="tabpanel"
        aria-labelledby="rbt-description-tab">
        <div class="rbt-product-single-description">
            <div class="rbt-block-desc b1 mb--0 nbc-product-tab-content">
                {!! filled($product?->description) ? $product->description : '<p>Description is not available for this product.</p>' !!}
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="rbt-specification" role="tabpanel"
        aria-labelledby="rbt-specification-tab">
        <div class="rbt-product-single-description">
            <div class="rbt-block-desc b1 mb--0 nbc-product-tab-content">
                {!! filled($product?->how_to_use) ? $product->how_to_use : '<p>Usage instructions are not available for this product.</p>' !!}
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="rbt-reviews" role="tabpanel"
        aria-labelledby="rbt-reviews-tab">
        <div class="rbt-product-single-description">
            <div class="rbt-block-desc b1 mb--0 nbc-product-tab-content">
                {!! filled($product?->ingredients) ? $product->ingredients : '<p>Ingredient information is not available for this product.</p>' !!}
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="rbt-question" role="tabpanel"
        aria-labelledby="rbt-question-tab">
        <div class="nbc-product-reviews">
            <div class="nbc-product-reviews__summary">
                <strong>{{ number_format((float) ($product?->reviews->avg('rating') ?? 0), 1) }}</strong>
                <span>
                    @for ($star = 1; $star <= 5; $star++)
                        <i class="fa-solid fa-star {{ $star <= round($product?->reviews->avg('rating') ?? 0) ? 'rbt-rated-icon' : '' }}"></i>
                    @endfor
                </span>
                <p>{{ $product?->reviews->count() ?? 0 }} verified customer {{ ($product?->reviews->count() ?? 0) === 1 ? 'review' : 'reviews' }}</p>
            </div>

            @if (session('review_success'))
                <div class="alert alert-success">{{ session('review_success') }}</div>
            @endif

            <div class="nbc-product-reviews__list">
                @forelse ($product?->reviews ?? collect() as $review)
                    <article class="nbc-product-review">
                        <div class="nbc-product-review__heading">
                            <div>
                                <strong>{{ $review->user?->name ?? 'NBC customer' }}</strong>
                                <span>{{ $review->created_at->format('d M Y') }}</span>
                            </div>
                            <span aria-label="{{ $review->rating }} out of 5 stars">
                                @for ($star = 1; $star <= 5; $star++)
                                    <i class="fa-solid fa-star {{ $star <= $review->rating ? 'rbt-rated-icon' : '' }}"></i>
                                @endfor
                            </span>
                        </div>
                        @if ($review->title)
                            <h3>{{ $review->title }}</h3>
                        @endif
                        <p>{{ $review->comment }}</p>
                    </article>
                @empty
                    <p class="nbc-product-reviews__empty">There are no reviews yet. Be the first to review this product.</p>
                @endforelse
            </div>

            @guest
                <p class="nbc-product-reviews__login">You can select a rating and write your review now. We will ask you to <a href="{{ route('login') }}">sign in</a> when you submit it.</p>
            @endguest
                <form class="nbc-product-review-form" method="POST"
                    action="{{ route('product.reviews.store', $product) }}">
                    @csrf
                    <h3>Add Your Review</h3>
                    <div class="nbc-product-review-form__field">
                        <span class="nbc-product-review-form__label">Your Rating</span>
                        <div class="nbc-review-star-input" role="radiogroup" aria-label="Your rating">
                            @foreach ([5, 4, 3, 2, 1] as $rating)
                                <input type="radio" id="review-star-{{ $rating }}" name="rating"
                                    value="{{ $rating }}" @checked(old('rating') == $rating) required>
                                <label for="review-star-{{ $rating }}" title="{{ $rating }} stars">
                                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                                    <span class="visually-hidden">{{ $rating }} stars</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="nbc-product-review-form__field">
                        <label for="review-comment">Your Review</label>
                        <textarea id="review-comment" name="comment" maxlength="2000" required
                            placeholder="Your comment about this product">{{ old('comment') }}</textarea>
                    </div>
                    @if ($errors->hasAny(['rating', 'title', 'comment']))
                        <div class="alert alert-danger">
                            @foreach (['rating', 'title', 'comment'] as $field)
                                @error($field)<div>{{ $message }}</div>@enderror
                            @endforeach
                        </div>
                    @endif
                    <button class="rbt-btn rbt-btn-md nbc-review-submit" type="submit">RATE NOW</button>
                </form>
        </div>
    </div>
</div>
