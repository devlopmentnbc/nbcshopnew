<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\SubCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PromotionController extends Controller
{
    public function index(Request $request): View
    {
        $query = Promotion::with(['productTarget', 'brandTarget', 'categoryTarget', 'subCategoryTarget']);

        if ($request->filled('search')) {
            $search = $request->string('search')->toString();
            $query->where(function ($builder) use ($search) {
                $builder->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        if ($request->filled('target_type')) {
            $query->where('target_type', $request->input('target_type'));
        }

        if ($request->filled('schedule_status')) {
            $now = now();
            match ($request->input('schedule_status')) {
                'live' => $query->where('status', true)->where('starts_at', '<=', $now)->where('ends_at', '>=', $now),
                'scheduled' => $query->where('status', true)->where('starts_at', '>', $now),
                'expired' => $query->where('status', true)->where('ends_at', '<', $now),
                'inactive' => $query->where('status', false),
                default => null,
            };
        }

        $promotions = $query->latest()->paginate(10)->withQueryString();

        return view('admin.promotions.index', compact('promotions'));
    }

    public function create(): View
    {
        return view('admin.promotions.create', $this->targetOptions());
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatePromotion($request);
        $data['image'] = $this->storeImage($request);
        $data['status'] = $request->boolean('status');

        Promotion::create($data);

        return redirect()->route('admin.promotions.index')->with('success', 'Promotion created successfully.');
    }

    public function edit(Promotion $promotion): View
    {
        return view('admin.promotions.edit', array_merge(
            $this->targetOptions(),
            compact('promotion')
        ));
    }

    public function update(Request $request, Promotion $promotion): RedirectResponse
    {
        $data = $this->validatePromotion($request, $promotion);
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('image')) {
            $newImage = $this->storeImage($request);
            $this->deleteImage($promotion->image);
            $data['image'] = $newImage;
        }

        $promotion->update($data);

        return redirect()->route('admin.promotions.index')->with('success', 'Promotion updated successfully.');
    }

    public function destroy(Promotion $promotion): RedirectResponse
    {
        $this->deleteImage($promotion->image);
        $promotion->delete();

        return redirect()->route('admin.promotions.index')->with('success', 'Promotion deleted successfully.');
    }

    private function validatePromotion(Request $request, ?Promotion $promotion = null): array
    {
        $request->merge([
            'slug' => Str::slug($request->input('slug') ?: $request->input('name')),
            'target_id' => $request->input('target_type') === 'all_products' ? null : $request->input('target_id'),
        ]);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'promotion_label' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('promotions', 'slug')->ignore($promotion?->id)],
            'description' => ['nullable', 'string', 'max:5000'],
            /*'button_text' => ['required', 'string', 'max:60'], */
            'image' => [$promotion ? 'nullable' : 'required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'],
            'target_type' => ['required', Rule::in(array_keys(Promotion::TARGET_TYPES))],
            'target_id' => ['nullable', 'integer'],
            'starts_at' => ['required', 'date'],
            'ends_at' => ['required', 'date', 'after:starts_at'],
            'status' => ['nullable', 'boolean'],
        ]);

        if ($data['target_type'] !== 'all_products') {
            $model = match ($data['target_type']) {
                'product' => Product::class,
                'brand' => Brand::class,
                'category' => Category::class,
                'sub_category' => SubCategory::class,
            };

            if (empty($data['target_id']) || ! $model::whereKey($data['target_id'])->exists()) {
                throw ValidationException::withMessages([
                    'target_id' => 'Please select a valid promotion target.',
                ]);
            }
        } else {
            $data['target_id'] = null;
        }

        unset($data['image']);

        return $data;
    }

    private function targetOptions(): array
    {
        return [
            'products' => Product::where('status', '=', true)->select(['id', 'name'])->orderBy('name')->get(),
            'brands' => Brand::where('status', '=', true)->select(['id', 'name'])->orderBy('name')->get(),
            'categories' => Category::where('status', '=', true)->select(['id', 'name'])->orderBy('name')->get(),
            'subCategories' => SubCategory::where('status', '=', true)->select(['id', 'name'])->orderBy('name')->get(),
            'targetTypes' => Promotion::TARGET_TYPES,
        ];
    }

    private function storeImage(Request $request): string
    {
        $file = $request->file('image');
        $uploadDir = public_path('uploads/promotions');

        if (! File::exists($uploadDir)) {
            File::makeDirectory($uploadDir, 0755, true, true);
        }

        $filename = now()->format('YmdHis') . '_' . Str::random(6) . '_' . Str::slug($request->input('name')) . '.' . $file->getClientOriginalExtension();
        $file->move($uploadDir, $filename);

        return 'uploads/promotions/' . $filename;
    }

    private function deleteImage(?string $path): void
    {
        if ($path && File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
