@if ($paginator->hasPages())
    <nav role="navigation" class="navigation" aria-label="{{ __('Pagination Navigation') }}">

        <div class="navigation__info-block">
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    {!! __('Показано с') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('по') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('из') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('записей') !!}
                </p>
            </div>

            <div class="navigation__links-block">
                <span class="navigation___link-list">
                    {{-- Previous Page Link --}}
                    @if (!$paginator->onFirstPage())
                        <a style="display: flex" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="navigation__link-item link-item link-item_prev"
                            aria-label="{{ __('pagination.previous') }}">
                            <svg style="width: 18px; height: 18px;" style="width: 18px; height: 18px;" class="w-5 h-5"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif
                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="navigation__link-item link-item link-item_dots">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span
                                            class="navigation__link-item link-item link-item_active">{{ $page }}</span>
                                    </span>
                                @else
                                    <a style="display: flex" href="{{ $url }}"
                                        class="navigation__link-item link-item"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a style="display: flex" href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="navigation__link-item link-item__next" aria-label="{{ __('pagination.next') }}">
                            <svg style="width: 18px; height: 18px" class="w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif
                </span>
            </div>
        </div>
    </nav>
    <style>
        .navigation {
            margin-top: 18px
        }

        .navigation__info-block {
            display: flex;
            justify-content: space-around;
            flex-direction: row-reverse;
        }

        .navigation___link-list {
            display: flex;
            column-gap: 5px;
            justify-content: center
        }
    </style>
@endif
