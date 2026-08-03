@extends('admin.layouts.app')

@section('title', 'Edit Attribute - Admin Unimart')

@section('content')
<main class="px-4 py-6 lg:px-6 min-h-[calc(100vh-140px)]">
    <!-- Header -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-[24px] font-semibold text-ink-900">Edit Attribute</h1>
            <p class="mt-1 text-[14px] text-ink-500">Update attribute details and manage existing/new values & metrics.</p>
        </div>
        <div>
            <a href="{{ route('admin.attributes.index') }}" class="inline-flex h-11 items-center gap-2 rounded-base border border-surface-line px-4 text-[14px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors">
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
                Back to Attributes
            </a>
        </div>
    </div>

    <!-- Form Card -->
    <div class="max-w-4xl rounded-card border border-surface-line bg-surface-card p-6 shadow-card">
        <form action="{{ route('admin.attributes.update', $attribute->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Attribute Name -->
                <div>
                    <label for="name" class="block text-[14px] font-semibold text-ink-900 mb-2">Attribute Name <span class="text-danger-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $attribute->name) }}" required placeholder="e.g. Size, Weight, Volume" class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('name') border-danger-500 @enderror">
                    @error('name')
                        <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-[14px] font-semibold text-ink-900 mb-2">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $attribute->slug) }}" placeholder="e.g. size, weight" class="h-11 w-full rounded-base border border-surface-line bg-surface-body px-4 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none @error('slug') border-danger-500 @enderror">
                    @error('slug')
                        <p class="mt-1.5 text-[13px] text-danger-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Status -->
            <div class="flex items-center gap-3 pt-2">
                <input type="checkbox" name="status" id="status" value="1" {{ old('status', $attribute->status) ? 'checked' : '' }} class="h-4 w-4 rounded border-surface-line text-brand-600 focus:ring-brand-600">
                <label for="status" class="text-[14px] font-semibold text-ink-900 cursor-pointer">Active Status</label>
            </div>

            <hr class="border-surface-line my-6">

            <!-- Attribute Values Repeater -->
            <div>
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-[18px] font-semibold text-ink-900">Attribute Values & Metrics</h2>
                        <p class="text-[13px] text-ink-500">Define or update values for this attribute.</p>
                    </div>
                    <button type="button" id="add-value-btn" class="inline-flex h-9 items-center gap-1.5 rounded-base bg-brand-50 px-3 text-[13px] font-semibold text-brand-600 hover:bg-brand-100 transition-colors">
                        <i data-lucide="plus" class="h-4 w-4"></i>
                        Add Value Row
                    </button>
                </div>

                <div id="values-container" class="space-y-3">
                    @forelse ($attribute->values as $index => $val)
                        <div class="value-row flex flex-wrap items-center gap-3 rounded-base border border-surface-line bg-surface-body p-3">
                            <div class="flex-1 min-w-[150px]">
                                <label class="block text-[12px] font-semibold text-ink-700 mb-1">Value Name</label>
                                <input type="text" name="values[{{ $index }}][value_name]" value="{{ old("values.{$index}.value_name", $val->value_name) }}" placeholder="e.g. 50 ml" class="h-10 w-full rounded-base border border-surface-line bg-surface-card px-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
                            </div>

                            <div class="w-32 min-w-[100px]">
                                <label class="block text-[12px] font-semibold text-ink-700 mb-1">Value</label>
                                <input type="text" name="values[{{ $index }}][value]" value="{{ old("values.{$index}.value", $val->value) }}" placeholder="e.g. 50" class="h-10 w-full rounded-base border border-surface-line bg-surface-card px-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
                            </div>

                            <div class="w-40 min-w-[120px]">
                                <label class="block text-[12px] font-semibold text-ink-700 mb-1">Metric / Unit</label>
                                <select name="values[{{ $index }}][metric]" class="h-10 w-full rounded-base border border-surface-line bg-surface-card px-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
                                    <option value="">None</option>
                                    @foreach (['ml', 'kg', 'g', 'l', 'cm', 'm', 'mm', 'pcs', 'pack', 'unit'] as $m)
                                        <option value="{{ $m }}" {{ old("values.{$index}.metric", $val->metric) == $m ? 'selected' : '' }}>{{ $m }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="pt-5">
                                <button type="button" class="remove-row-btn inline-flex h-10 w-10 items-center justify-center rounded-base border border-surface-line text-ink-400 hover:bg-danger-50 hover:text-danger-500 transition-colors" title="Remove Row">
                                    <i data-lucide="trash-2" class="h-4 w-4"></i>
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="value-row flex flex-wrap items-center gap-3 rounded-base border border-surface-line bg-surface-body p-3">
                            <div class="flex-1 min-w-[150px]">
                                <label class="block text-[12px] font-semibold text-ink-700 mb-1">Value Name</label>
                                <input type="text" name="values[0][value_name]" placeholder="e.g. 50 ml" class="h-10 w-full rounded-base border border-surface-line bg-surface-card px-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
                            </div>

                            <div class="w-32 min-w-[100px]">
                                <label class="block text-[12px] font-semibold text-ink-700 mb-1">Value</label>
                                <input type="text" name="values[0][value]" placeholder="e.g. 50" class="h-10 w-full rounded-base border border-surface-line bg-surface-card px-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
                            </div>

                            <div class="w-40 min-w-[120px]">
                                <label class="block text-[12px] font-semibold text-ink-700 mb-1">Metric / Unit</label>
                                <select name="values[0][metric]" class="h-10 w-full rounded-base border border-surface-line bg-surface-card px-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
                                    <option value="">None</option>
                                    <option value="ml" selected>ml</option>
                                    <option value="kg">kg</option>
                                    <option value="g">g</option>
                                    <option value="l">l</option>
                                    <option value="cm">cm</option>
                                    <option value="m">m</option>
                                    <option value="mm">mm</option>
                                    <option value="pcs">pcs</option>
                                    <option value="pack">pack</option>
                                    <option value="unit">unit</option>
                                </select>
                            </div>

                            <div class="pt-5">
                                <button type="button" class="remove-row-btn inline-flex h-10 w-10 items-center justify-center rounded-base border border-surface-line text-ink-400 hover:bg-danger-50 hover:text-danger-500 transition-colors" title="Remove Row">
                                    <i data-lucide="trash-2" class="h-4 w-4"></i>
                                </button>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="pt-4 flex items-center gap-3">
                <button type="submit" class="inline-flex h-11 items-center gap-2 rounded-base bg-brand-600 px-6 text-[14px] font-semibold text-white transition-colors hover:bg-brand-700">
                    <i data-lucide="check" class="h-4 w-4"></i>
                    Update Attribute
                </button>
                <a href="{{ route('admin.attributes.index') }}" class="inline-flex h-11 items-center gap-2 rounded-base border border-surface-line px-6 text-[14px] font-semibold text-ink-700 hover:bg-surface-muted transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</main>

<script>
    let rowIndex = {{ max(count($attribute->values), 1) }};

    document.getElementById('add-value-btn').addEventListener('click', function() {
        const container = document.getElementById('values-container');
        const row = document.createElement('div');
        row.className = 'value-row flex flex-wrap items-center gap-3 rounded-base border border-surface-line bg-surface-body p-3';
        row.innerHTML = `
            <div class="flex-1 min-w-[150px]">
                <label class="block text-[12px] font-semibold text-ink-700 mb-1">Value Name</label>
                <input type="text" name="values[${rowIndex}][value_name]" placeholder="e.g. 50 kg" class="h-10 w-full rounded-base border border-surface-line bg-surface-card px-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
            </div>

            <div class="w-32 min-w-[100px]">
                <label class="block text-[12px] font-semibold text-ink-700 mb-1">Value</label>
                <input type="text" name="values[${rowIndex}][value]" placeholder="e.g. 50" class="h-10 w-full rounded-base border border-surface-line bg-surface-card px-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
            </div>

            <div class="w-40 min-w-[120px]">
                <label class="block text-[12px] font-semibold text-ink-700 mb-1">Metric / Unit</label>
                <select name="values[${rowIndex}][metric]" class="h-10 w-full rounded-base border border-surface-line bg-surface-card px-3 text-[14px] text-ink-900 focus:border-brand-600 focus:outline-none">
                    <option value="">None</option>
                    <option value="ml">ml</option>
                    <option value="kg">kg</option>
                    <option value="g">g</option>
                    <option value="l">l</option>
                    <option value="cm">cm</option>
                    <option value="m">m</option>
                    <option value="mm">mm</option>
                    <option value="pcs">pcs</option>
                    <option value="pack">pack</option>
                    <option value="unit">unit</option>
                </select>
            </div>

            <div class="pt-5">
                <button type="button" class="remove-row-btn inline-flex h-10 w-10 items-center justify-center rounded-base border border-surface-line text-ink-400 hover:bg-danger-50 hover:text-danger-500 transition-colors" title="Remove Row">
                    <i data-lucide="trash-2" class="h-4 w-4"></i>
                </button>
            </div>
        `;
        container.appendChild(row);
        rowIndex++;
        lucide.createIcons();
    });

    document.getElementById('values-container').addEventListener('click', function(e) {
        if (e.target.closest('.remove-row-btn')) {
            const rows = document.querySelectorAll('.value-row');
            if (rows.length > 1) {
                e.target.closest('.value-row').remove();
            } else {
                alert('At least one value row must remain.');
            }
        }
    });
</script>
@endsection
