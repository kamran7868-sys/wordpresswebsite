@if ($paginator->hasPages())
  <nav class="pge-pagination" role="navigation" aria-label="Pagination Navigation">
    <div class="pge-pagination-info">
      Showing <strong>{{ $paginator->firstItem() }}</strong> to <strong>{{ $paginator->lastItem() }}</strong> of <strong>{{ $paginator->total() }}</strong> results
    </div>

    <ul class="pge-pagination-links">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
        <li class="pge-page-item disabled" aria-disabled="true" aria-label="Previous">
          <span class="pge-page-link">&laquo; Previous</span>
        </li>
      @else
        <li class="pge-page-item">
          <a class="pge-page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">&laquo; Previous</a>
        </li>
      @endif

      {{-- Pagination Elements --}}
      @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
          <li class="pge-page-item disabled" aria-disabled="true">
            <span class="pge-page-link dots">{{ $element }}</span>
          </li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li class="pge-page-item active" aria-current="page">
                <span class="pge-page-link">{{ $page }}</span>
              </li>
            @else
              <li class="pge-page-item">
                <a class="pge-page-link" href="{{ $url }}">{{ $page }}</a>
              </li>
            @endif
          @endforeach
        @endif
      @endforeach

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
        <li class="pge-page-item">
          <a class="pge-page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">Next &raquo;</a>
        </li>
      @else
        <li class="pge-page-item disabled" aria-disabled="true" aria-label="Next">
          <span class="pge-page-link">Next &raquo;</span>
        </li>
      @endif
    </ul>
  </nav>
@endif
