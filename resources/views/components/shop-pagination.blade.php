@if ($paginator->hasPages())
    <nav class="nbc-pagination" aria-label="Product pagination">
        <div class="nbc-pagination-controls">
            @if ($paginator->onFirstPage())
                <span class="nbc-pagination-direction" aria-disabled="true" aria-label="Previous page">
                    <i class="fa-solid fa-arrow-left" aria-hidden="true"></i><span>Previous</span>
                </span>
            @else
                <a class="nbc-pagination-direction" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous page">
                    <i class="fa-solid fa-arrow-left" aria-hidden="true"></i><span>Previous</span>
                </a>
            @endif

            <div class="nbc-pagination-pages">
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="nbc-pagination-ellipsis">{{ $element }}</span>
                    @else
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="nbc-pagination-number" aria-current="page" aria-label="Page {{ $page }}">{{ $page }}</span>
                            @else
                                <a class="nbc-pagination-number" href="{{ $url }}" aria-label="Go to page {{ $page }}">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
            <span class="nbc-pagination-mobile-page">{{ $paginator->currentPage() }} <span>/ {{ $paginator->lastPage() }}</span></span>

            @if ($paginator->hasMorePages())
                <a class="nbc-pagination-direction" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next page">
                    <span>Next</span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>
            @else
                <span class="nbc-pagination-direction" aria-disabled="true" aria-label="Next page">
                    <span>Next</span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </span>
            @endif
        </div>
        <p class="nbc-pagination-summary">Showing <strong>{{ $paginator->firstItem() }}–{{ $paginator->lastItem() }}</strong> of {{ $paginator->total() }} products</p>
    </nav>
@endif
