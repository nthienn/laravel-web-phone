<!-- Pagination -->
<ul class="pagination home-product__pagination">
    @foreach ($elements as $element)
        @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
                <li class="pagination-item--active pagination-item">
                    <a href="{{ $url }}" class="pagination-item-link">{{ $page }}</a>
                </li>
            @else
                <li class="pagination-item">
                    <a href="{{ $url }}" class="pagination-item-link">{{ $page }}</a>
                </li>
            @endif
        @endforeach
    @endforeach
</ul>
