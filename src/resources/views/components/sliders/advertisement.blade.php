<div class="advertisement-slider-wrapper">
    <section class="advertisement-slider splide">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($attributes->get('advs') as $adv)
                    <li class="splide__slide">
                        <img src="/storage/{{ $adv->img }}" alt="">
                        <span class="advertisement-slider-adv">Реклама</span>
                        <div class="advertisement-slider__wrapper"></div>
                        <div class="advertisement__slider">
                            <h1 class="advertisement__title">{{ $adv->title }}</h1>
                            <h2 class="advertisement__subtitle">{{ $adv->subtitle }}</h2>
                            <div class="advertisement__text">{!! html_entity_decode($adv->text) !!}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</div>
