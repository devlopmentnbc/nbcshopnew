<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AttributeController extends Controller
{
    /**
     * Display a listing of the attributes.
     */
    public function index(Request $request)
    {
        $query = Attribute::with('values');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhereHas('values', function ($q) use ($search) {
                      $q->where('value_name', 'like', "%{$search}%")
                        ->orWhere('value', 'like', "%{$search}%")
                        ->orWhere('metric', 'like', "%{$search}%");
                  });
        }

        $attributes = $query->latest()->paginate(10)->withQueryString();

        return view('admin.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new attribute.
     */
    public function create()
    {
        $metrics = ['ml', 'kg', 'g', 'l', 'cm', 'm', 'mm', 'pcs', 'pack', 'unit', 'custom'];
        return view('admin.attributes.create', compact('metrics'));
    }

    /**
     * Store a newly created attribute in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:attributes,name',
            'slug' => 'nullable|string|max:255|unique:attributes,slug',
            'status' => 'nullable|boolean',
            'values' => 'nullable|array',
            'values.*.value_name' => 'required_with:values.*.value|string|max:255',
            'values.*.value' => 'required_with:values.*.value_name|string|max:255',
            'values.*.metric' => 'nullable|string|max:50',
        ]);

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);

        $attribute = Attribute::create([
            'name' => $request->name,
            'slug' => $slug,
            'status' => $request->has('status') ? (bool) $request->status : true,
        ]);

        if ($request->filled('values') && is_array($request->values)) {
            foreach ($request->values as $val) {
                if (!empty($val['value_name']) && !empty($val['value'])) {
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'value_name' => $val['value_name'],
                        'value' => $val['value'],
                        'metric' => $val['metric'] ?? null,
                        'status' => true,
                    ]);
                }
            }
        }

        return redirect()->route('admin.attributes.index')->with('success', 'Attribute created successfully.');
    }

    /**
     * Show the form for editing the specified attribute.
     */
    public function edit(Attribute $attribute)
    {
        $attribute->load('values');
        $metrics = ['ml', 'kg', 'g', 'l', 'cm', 'm', 'mm', 'pcs', 'pack', 'unit', 'custom'];
        return view('admin.attributes.edit', compact('attribute', 'metrics'));
    }

    /**
     * Update the specified attribute in storage.
     */
    public function update(Request $request, Attribute $attribute)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:attributes,name,' . $attribute->id,
            'slug' => 'nullable|string|max:255|unique:attributes,slug,' . $attribute->id,
            'status' => 'nullable|boolean',
            'values' => 'nullable|array',
            'values.*.value_name' => 'required_with:values.*.value|string|max:255',
            'values.*.value' => 'required_with:values.*.value_name|string|max:255',
            'values.*.metric' => 'nullable|string|max:50',
        ]);

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);

        $attribute->update([
            'name' => $request->name,
            'slug' => $slug,
            'status' => $request->has('status') ? (bool) $request->status : false,
        ]);

        // Delete existing attribute values and re-create
        $attribute->values()->delete();

        if ($request->filled('values') && is_array($request->values)) {
            foreach ($request->values as $val) {
                if (!empty($val['value_name']) && !empty($val['value'])) {
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'value_name' => $val['value_name'],
                        'value' => $val['value'],
                        'metric' => $val['metric'] ?? null,
                        'status' => true,
                    ]);
                }
            }
        }

        return redirect()->route('admin.attributes.index')->with('success', 'Attribute updated successfully.');
    }

    /**
     * Remove the specified attribute from storage.
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return redirect()->route('admin.attributes.index')->with('success', 'Attribute deleted successfully.');
    }
}
