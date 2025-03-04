<div id="{{ $attributes->get('id') }}" style="{{ $attributes->get('style') }}" class="modal-wrapper">
    <div class="modal">
        <div {{ $attributes->merge(['class' => 'modal__window']) }}>
            @if ($attributes->get('title') != '')
                <div class="modal__header">
                    <header class="modal__headding">
                        <span class="modal-header__title">{{ $attributes->get('title') }}</span>
                        @if ($attributes->get('subtitle'))
                            <span class="modal-header__subtitle">{{ $attributes->get('subtitle') }}</span>
                        @endif
                    </header>
                    <svg class="modal-header__exit" width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0 19.2366L9.23664 10L1.42187e-06 0.76336L0.763359 2.27499e-06L10 9.23664L19.2366 0L20 0.763359L10.7634 10L20 19.2366L19.2366 20L10 10.7634L0.763359 20L0 19.2366Z"
                            fill="#342635" />
                    </svg>
                </div>
            @else
                @if (!$attributes->get('exit'))
                    <svg class="modal-header__exit" width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0 19.2366L9.23664 10L1.42187e-06 0.76336L0.763359 2.27499e-06L10 9.23664L19.2366 0L20 0.763359L10.7634 10L20 19.2366L19.2366 20L10 10.7634L0.763359 20L0 19.2366Z"
                            fill="#342635" />
                    </svg>
                @endif
            @endif
            {{ $slot }}
        </div>
    </div>
</div>
