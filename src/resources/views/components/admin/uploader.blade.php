<div class="uploader-wrapper">
    @php
        $pathName = !preg_match('/path/', $path) ? $path . '_name' : $pathName;
        $path = !preg_match('/path/', $path) ? $path . '_path' : $path;
    @endphp

    @if (!empty($header))
        <h3 class="uploader-alt__title">{{ $header }}</h3>
    @endif

    <div @class([
        'uploader-alt',
        'uploader-alt_hidden' =>
            !empty($object->$path) && ($isDeletable && $isHidden),
    ])>
        <label for="{{ $id }}" class="uploader-alt__header" @style([
            'background-repeat: no-repeat' => !empty($object?->$path) && ($isDeletable && $isHidden),
            "background-image: url(/public/{$object?->$path})" => !empty($object?->$path) && ($isDeletable && $isHidden),
            'background-size: contain' => !empty($object?->$path) && ($isDeletable && $isHidden),
            'background-position: center center' => !empty($object?->$path) && ($isDeletable && $isHidden),
            'border-color: transparent' => !empty($object?->$path) && ($isDeletable && $isHidden),
            'cursor: default' => (!empty($object?->$path) && ($isDeletable && $isHidden)) || (!$isHidden && $isDeletable),
        ])>
            <svg viewBox="0 0 24 24" class="icon" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M7 10V9C7 6.23858 9.23858 4 12 4C14.7614 4 17 6.23858 17 9V10C19.2091 10 21 11.7909 21 14C21 15.4806 20.1956 16.8084 19 17.5M7 10C4.79086 10 3 11.7909 3 14C3 15.4806 3.8044 16.8084 5 17.5M7 10C7.43285 10 7.84965 10.0688 8.24006 10.1959M12 12V21M12 12L15 15M12 12L9 15"
                        stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>
            <p>Загрузите файл</p>
        </label>
        <div class="uploader-alt_demo">
            <div class="uploader-alt-actions">
                <svg class="uploader-alt__save" viewBox="0 0 495.426 495.426">
                    <g>
                        <g>
                            <polygon
                                points="405.584,43.295 176.428,272.452 89.84,185.865 0,275.706 86.588,362.293 176.428,452.131 266.266,362.293 495.426,133.133 "
                                fill="#000000" style="fill: rgb(101, 192, 27);"></polygon>
                        </g>
                    </g>
                </svg>
                <svg class="uploader-alt__exit" viewBox="0 0 511.999 511.999">
                    <path style="fill:#FF6465;"
                        d="M384.955,256l120.28-120.28c9.019-9.019,9.019-23.642,0-32.66L408.94,6.765 c-9.019-9.019-23.642-9.019-32.66,0l-120.28,120.28L135.718,6.765c-9.019-9.019-23.642-9.019-32.66,0L6.764,103.058 c-9.019,9.019-9.019,23.642,0,32.66l120.28,120.28L6.764,376.28c-9.019,9.019-9.019,23.642,0,32.66l96.295,96.294 c9.019,9.019,23.642,9.019,32.66,0l120.28-120.28l120.28,120.28c9.019,9.019,23.642,9.019,32.66,0l96.295-96.294 c9.019-9.019,9.019-23.642,0-32.66L384.955,256z" />
                </svg>
            </div>
        </div>
        @if ($isDeletable && $isHidden)
            <svg xmlns="http://www.w3.org/2000/svg" width="16" class="icon-delete" height="16" fill="red"
                {{ !empty($object?->$pathName) ? "data-id={$object->id}" : '' }} class="bi bi-x-lg" viewBox="0 0 16 16">
                <path
                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
            </svg>
        @endif

        @if (!$isHidden && $isDeletable)
            <div class="uploader-alt__items">
                <div class="uploader-alt__item uploader-alt__item_invisible">
                    <svg fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M15.331 6H8.5v20h15V14.154h-8.169z"></path>
                            <path d="M18.153 6h-.009v5.342H23.5v-.002z"></path>
                        </g>
                    </svg>
                    <p>Not selected file</p>
                    <svg viewBox="0 0 24 24" class="delete" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M5.16565 10.1534C5.07629 8.99181 5.99473 8 7.15975 8H16.8402C18.0053 8 18.9237 8.9918 18.8344 10.1534L18.142 19.1534C18.0619 20.1954 17.193 21 16.1479 21H7.85206C6.80699 21 5.93811 20.1954 5.85795 19.1534L5.16565 10.1534Z"
                                stroke="#000000" stroke-width="2"></path>
                            <path d="M19.5 5H4.5" stroke="#000000" stroke-width="2" stroke-linecap="round"></path>
                            <path d="M10 3C10 2.44772 10.4477 2 11 2H13C13.5523 2 14 2.44772 14 3V5H10V3Z"
                                stroke="#000000" stroke-width="2"></path>
                        </g>
                    </svg>
                </div>
                @if (!empty($object?->$pathName))
                    <div class="uploader-alt__item">
                        <svg fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M15.331 6H8.5v20h15V14.154h-8.169z"></path>
                                <path d="M18.153 6h-.009v5.342H23.5v-.002z"></path>
                            </g>
                        </svg>
                        <p>{{ $object?->$pathName }}</p>
                        <svg viewBox="0 0 24 24" data-id="{{ $object->id }}" class="delete" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M5.16565 10.1534C5.07629 8.99181 5.99473 8 7.15975 8H16.8402C18.0053 8 18.9237 8.9918 18.8344 10.1534L18.142 19.1534C18.0619 20.1954 17.193 21 16.1479 21H7.85206C6.80699 21 5.93811 20.1954 5.85795 19.1534L5.16565 10.1534Z"
                                    stroke="#000000" stroke-width="2"></path>
                                <path d="M19.5 5H4.5" stroke="#000000" stroke-width="2" stroke-linecap="round">
                                </path>
                                <path d="M10 3C10 2.44772 10.4477 2 11 2H13C13.5523 2 14 2.44772 14 3V5H10V3Z"
                                    stroke="#000000" stroke-width="2"></path>
                            </g>
                        </svg>
                    </div>
                @endif
            </div>
        @endif
        <input id={{ $id }} {{ !empty($imageId) ? "data-id=$imageId" : '' }}
            {{ $isMultiple ? 'multiple' : '' }} {{ !empty($accept) ? "accept=$accept" : '' }}
            {{ $width > 0 ? "data-width=$width" : null }} {{ $height > 0 ? "data-height=$height" : null }}
            {{ !empty($object->$path) ? 'disabled' : '' }} class="uploader-alt__file" type="file">
    </div>
</div>
