{{-- One sub-category table row. $sortable adds the drag handle column. --}}
<tr class="hover:bg-surface-body/70 transition-colors" data-sub-category-id="{{ $subCategory->id }}">
    @if ($sortable)
        <td class="py-3 pr-4 w-12">
            <button type="button" draggable="true" data-drag-handle
                class="inline-flex h-8 w-8 items-center justify-center rounded-base border border-surface-line text-ink-400 hover:bg-surface-muted hover:text-ink-700"
                style="cursor: grab" aria-label="Drag {{ $subCategory->name }} to reorder"
                title="Drag to reorder">
                <i data-lucide="grip-vertical" class="h-4 w-4 pointer-events-none"></i>
            </button>
        </td>
    @endif
    <td class="py-3 pr-4">
        <span class="font-semibold text-ink-900 block">{{ $subCategory->name }}</span>
    </td>
    @unless ($sortable)
        <td class="py-3 pr-4">
            @if ($subCategory->category)
                <span class="inline-flex items-center gap-1.5 font-medium text-brand-600">
                    <i data-lucide="folder" class="h-3.5 w-3.5"></i>
                    {{ $subCategory->category->name }}
                </span>
            @else
                <span class="text-ink-400 italic">N/A</span>
            @endif
        </td>
    @endunless
    <td class="py-3 pr-4 text-ink-500 font-mono text-[13px]">
        {{ $subCategory->slug }}
    </td>
    <td class="py-3 pr-4">
        @if ($subCategory->status)
            <span class="inline-flex items-center rounded-full bg-success-50 px-2.5 py-0.5 text-[12px] font-semibold text-success-600">Active</span>
        @else
            <span class="inline-flex items-center rounded-full bg-danger-50 px-2.5 py-0.5 text-[12px] font-semibold text-danger-500">Inactive</span>
        @endif
    </td>
    <td class="py-3 pr-4 text-right">
        <div class="inline-flex items-center gap-2">
            <a href="{{ route('admin.sub-categories.edit', $subCategory->id) }}" class="inline-flex h-8 w-8 items-center justify-center rounded-base border border-surface-line text-ink-500 hover:bg-brand-50 hover:text-brand-600 hover:border-brand-200 transition-colors" title="Edit Sub Category">
                <i data-lucide="pencil" class="h-4 w-4"></i>
            </a>
            <form action="{{ route('admin.sub-categories.destroy', $subCategory->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this sub-category?');" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex h-8 w-8 items-center justify-center rounded-base border border-surface-line text-ink-500 hover:bg-danger-50 hover:text-danger-500 hover:border-danger-200 transition-colors" title="Delete Sub Category">
                    <i data-lucide="trash-2" class="h-4 w-4"></i>
                </button>
            </form>
        </div>
    </td>
</tr>
