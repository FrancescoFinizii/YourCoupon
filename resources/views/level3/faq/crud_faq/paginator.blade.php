@if ($paginator->lastPage() > 1)
    <div id="pagination" class="pagination-crudfaq">
        <span>{{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} di {{ $paginator->total() }} ---</span>

        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->url(1) }}">Inizio</a> |
        @else
            Inizio |
        @endif

        @if ($paginator->currentPage() != 1)
            <a href="{{ $paginator->previousPageUrl() }}">&lt; Precedente</a> |
        @else
            &lt; Precedente |
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">Successivo &gt;</a> |
        @else
            Successivo &gt; |
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->url($paginator->lastPage()) }}">Fine</a>
        @else
            Fine
        @endif
    </div>
@endif
