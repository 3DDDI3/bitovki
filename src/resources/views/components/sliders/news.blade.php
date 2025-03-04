<section class="news__slider splide">
    <div class="splide__track">
        <ul class="splide__list">
            @foreach ($attributes->get('news') as $new)
                <li class="splide__slide">
                    <x-templates.news url="{{ $new->url }}" img="{{ $new->preview_image }}" alt=""
                        date="{{ $new->created_at }}" title="{{ $new->title }}" />
                </li>
            @endforeach
        </ul>
    </div>

</section>
