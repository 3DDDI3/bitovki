<section class="{{ $attributes->get('slider_class') }} splide">

    @if ($attributes->get('header'))
        <h2 class="tour-gallary__title">{{ $attributes->get('header') }}</h2>
    @endif

    <div class="splide__track">
        <ul class="splide__list">
            {{ $slot }}
        </ul>
    </div>
</section>
