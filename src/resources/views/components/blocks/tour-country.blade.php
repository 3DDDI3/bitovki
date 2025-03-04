<div class="services-country-tour__info">
    <div class="services-country__list">
        @foreach ($attributes->get('countries') as $country)
            @if ($country->tours->count() > 0)
                <a href="tours?country_id={{ $country->id }}" class="services-country__item">
                    <span class="services-country__name">{{ $country->name }}</span>
                    <span class="services-country__counter">{{ $country->tours->count() }}</span>
                </a>
            @endif
        @endforeach
    </div>
</div>
