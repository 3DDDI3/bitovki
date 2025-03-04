@if (!empty($attributes->get('objects')))
    <div class="combobox__list combobox__list_invisible">
        @foreach ($attributes->get('objects') as $object)
            <span data-id="{{ $object->id }}" class="combobox__item">
                {{ $object->name }}
            </span>
        @endforeach
    </div>
@else
    <div class="combobox__list combobox__list_invisible">
        <span data-id="0" class="combobox__item">
            Нет совпадений
        </span>
    </div>
@endif
