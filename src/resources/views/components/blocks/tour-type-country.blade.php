<div class="tour-country-type-block" data-href="{{ $attributes->get('url') }}">
    @if ($attributes->get('icon') != null)
        <img src="/storage/{{ $attributes->get('icon') }}" alt="{{ $attributes->get('iconAlt') }}"
            class="tour-country-type-block__image">
    @else
        <div></div>
    @endif
    <div class="tour-country-type-block__description">
        <span class="tour-country-type-block__title">{{ $attributes->get('title') }}</span>
        <span class="tour-country-type-block__subtitle">{{ $attributes->get('subtitle') }}</span>
    </div>
    <img class="tour-country-type-block__bg-image" src="/storage/{{ $attributes->get('image') }}"
        alt="{{ $attributes->get('imageAlt') }}">
</div>
