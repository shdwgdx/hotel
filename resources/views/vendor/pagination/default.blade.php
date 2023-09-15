@if ($paginator->hasPages())
    <div class="container container_pagination">
        <nav class="d-flex justify-items-center justify-content-center">
            <div>
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    <a class="page-item" href="{{ $paginator->previousPageUrl() }}">
                        <button class="btn_pagination btn_previous" id="btn_previous" rel="prev" aria-label="Previous"
                            aria-label="@lang('pagination.previous')"></button>
                    </a>

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item mlr20 " aria-current="page"><button
                                            class="page_btn active">{{ $page }}</button></li>
                                @else
                                    <li class="page-item mlr20">
                                        <a class="page_btn" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    <a class="page-item" href="{{ $paginator->nextPageUrl() }}">
                        <button class="btn_pagination btn_next" id="btn_next" rel="next"
                            aria-label="@lang('pagination.next')" aria-label="Next"></button>
                    </a>
                </ul>
            </div>
        </nav>
    </div>
@endif
