@if ($paginator->hasPages())
    <nav class="wow animate__fadeInUp" data-wow-delay=".2s">
        <ul class="fsh-pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <!-- for active add "active" class and for disable add "disable" class -->
                    <a class="fsh-page-link disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 16L10 12L14 8" stroke="#0D0E10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </li>
            @else
                <li>
                    <!-- for active add "active" class and for disable add "disable" class -->
                    <a class="fsh-page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 16L10 12L14 8" stroke="#0D0E10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="fsh-page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="fsh-page-link active">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="fsh-page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="fsh-page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 8L14 12L10 16" stroke="#0D0E10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </li>
            @else
                <li>
                    <a class="fsh-page-link disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 8L14 12L10 16" stroke="#0D0E10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
