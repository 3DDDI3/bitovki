<div class="description-block">
    @if (!empty($object))
        @include('admin.includes.textbox', [
            'name' => "description_$object->id",
            'value' => $object->text ?? '',
        ])
    @else
        @include('admin.includes.textbox', [
            'name' => 'description',
            'value' => $object->description ?? '',
        ])
    @endif
</div>
