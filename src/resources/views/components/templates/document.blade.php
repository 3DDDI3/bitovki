<div class="agency-document">
    <div class="agency-document-info">
        {{ $slot }}
        <div class="agency-document-info__title">{!! html_entity_decode($attributes->get('title')) !!}</div>
    </div>
    <button data-path="{{ $attributes->get('path') }}" class="agency-document__download">Скачать</button>
</div>
