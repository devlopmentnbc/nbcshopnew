<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = Review::query()->with(['product:id,name,slug', 'user:id,name']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('comment', 'like', "%{$search}%")
                    ->orWhere('reviewer_name', 'like', "%{$search}%")
                    ->orWhereHas('user', fn ($u) => $u->where('name', 'like', "%{$search}%"))
                    ->orWhereHas('product', fn ($p) => $p->where('name', 'like', "%{$search}%"));
            });
        }

        if ($request->filled('product_id')) {
            $query->where('product_id', $request->integer('product_id'));
        }

        if ($request->input('source') === 'manual') {
            $query->whereNull('user_id');
        } elseif ($request->input('source') === 'customer') {
            $query->whereNotNull('user_id');
        }

        $reviews = $query->latest()->paginate(15)->withQueryString();
        $products = Product::orderBy('name')->get(['id', 'name']);

        return view('admin.reviews.index', compact('reviews', 'products'));
    }

    public function create(Request $request)
    {
        $products = Product::orderBy('name')->get(['id', 'name']);
        $selectedProductId = $request->integer('product_id') ?: null;

        return view('admin.reviews.create', compact('products', 'selectedProductId'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateReview($request, true);

        $review = new Review([
            'product_id' => $validated['product_id'],
            'reviewer_name' => $validated['reviewer_name'],
            'rating' => $validated['rating'],
            'title' => $validated['title'] ?? null,
            'comment' => $validated['comment'],
        ]);
        $this->applyReviewDate($review, $validated['review_date'] ?? null);
        $review->save();

        return redirect()->route('admin.reviews.index')->with('success', 'Review added successfully.');
    }

    public function edit(Review $review)
    {
        $review->load(['product:id,name', 'user:id,name']);
        $products = Product::orderBy('name')->get(['id', 'name']);

        return view('admin.reviews.edit', compact('review', 'products'));
    }

    public function update(Request $request, Review $review)
    {
        $validated = $this->validateReview($request, $review->isManual());

        $review->fill([
            'product_id' => $validated['product_id'],
            'rating' => $validated['rating'],
            'title' => $validated['title'] ?? null,
            'comment' => $validated['comment'],
        ]);

        // Customer reviews keep their account name; only manual ones carry a reviewer name.
        if ($review->isManual()) {
            $review->reviewer_name = $validated['reviewer_name'];
        }

        $this->applyReviewDate($review, $validated['review_date'] ?? null);
        $review->save();

        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }

    private function validateReview(Request $request, bool $requiresName): array
    {
        return $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'reviewer_name' => [$requiresName ? 'required' : 'nullable', 'string', 'max:120'],
            'rating' => ['required', 'integer', 'between:1,5'],
            'title' => ['nullable', 'string', 'max:120'],
            'comment' => ['required', 'string', 'max:2000'],
            'review_date' => ['nullable', 'date', 'before_or_equal:today'],
        ]);
    }

    private function applyReviewDate(Review $review, ?string $date): void
    {
        if (! $date) {
            return;
        }

        $current = $review->created_at;

        // Keep the existing time of day when only the date changes.
        if ($current && $current->toDateString() === $date) {
            return;
        }

        $review->created_at = Carbon::parse($date)->setTimeFrom(now());
    }
}
