<div class="tour-statistic">
    <img src="/storage/{{ $attributes->get('img') }}" alt="{{ $attributes->get('alt') }}" class="tour-statistic__icon">
    <div class="tour-statistic__block">
        <span class="tour-statistic__title">{{ $attributes->get('title') }}</span>
        <p class="tour-statistic___text">{!! html_entity_decode($attributes->get('text')) !!}</p>
        @if (!empty($attributes->get('subtitle')))
            <span class="tour-statistic__subtitle">{{ $attributes->get('subtitle') }}</span>
        @endif
    </div>
</div>
