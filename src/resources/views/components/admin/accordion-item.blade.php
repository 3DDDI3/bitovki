<article class="accordion__item" data-page-id="{{ $pageId }}" data-block-type-id="{{ $blockTypeId }}"
    {{ !empty($blockId) ? "data-block-id=$blockId" : '' }}>
    <div class="accordion__wrapper">
        <div class="accordion__header">
            @if ($isEditableHeader)
                @include('admin.includes.input', [
                    'label' => "$header:",
                    'name' => $headerName,
                    'value' => $headerValue ?? '',
                ])
            @else
                <h2>{{ $header }}</h2>
            @endif

            <svg {{ !empty($style) ? 'style=transform:rotate(0deg)' : '' }} width="12" height="15"
                viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_889_1000)">
                    <path
                        d="M6.20719 12.2594C6.06208 12.2522 5.92416 12.1965 5.8172 12.1019L0.949996 7.78191C0.889811 7.72824 0.841208 7.66369 0.806968 7.59195C0.772728 7.52021 0.753522 7.4427 0.750441 7.36382C0.747359 7.28494 0.76046 7.20626 0.789007 7.13225C0.817553 7.05825 0.86098 6.99037 0.916808 6.93251C0.972635 6.87464 1.03977 6.82792 1.11438 6.795C1.18899 6.76208 1.26961 6.74361 1.35164 6.74066C1.43367 6.7377 1.5155 6.75031 1.59247 6.77776C1.66943 6.80521 1.74002 6.84697 1.8002 6.90066L6.2423 10.8419L10.6844 6.90066C10.7446 6.84697 10.8152 6.80521 10.8921 6.77776C10.9691 6.75031 11.0509 6.7377 11.1329 6.74066C11.215 6.74361 11.2956 6.76208 11.3702 6.795C11.4448 6.82792 11.5119 6.87464 11.5678 6.93251C11.6236 6.99038 11.667 7.05825 11.6956 7.13225C11.7241 7.20626 11.7372 7.28494 11.7342 7.36382C11.7311 7.4427 11.7119 7.52021 11.6776 7.59195C11.6434 7.66369 11.5948 7.72824 11.5346 7.78191L6.66739 12.1019C6.60564 12.1566 6.53306 12.1987 6.45398 12.2258C6.37491 12.2528 6.29097 12.2643 6.20719 12.2594Z"
                        fill="#008DDE" />
                </g>
                <defs>
                    <clipPath id="clip0_889_1000">
                        <rect width="15" height="12" fill="white"
                            transform="matrix(-4.37114e-08 1 1 4.37114e-08 0 0)" />
                    </clipPath>
                </defs>
            </svg>
        </div>
        <div class="accordion__block" {{ !empty($style) ? "style=$style" : '' }}>
            {{ $slot }}
        </div>
    </div>
    @if (!empty($isDeletable))
        <svg class="accordion-item__delete" data-block-id="{{ $blockId }}" xmlns="http://www.w3.org/2000/svg"
            width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
            <path
                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
        </svg>
    @endif
</article>
