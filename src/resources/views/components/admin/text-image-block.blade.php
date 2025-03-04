@php
    $blockId = !empty($blockId) ? $blockId : '';
    $blockTypeId = empty($object) ? '5' : null;
    $id = !empty($object?->id) ? $id . "_$object?->id" : $id;
@endphp

<div class="text-image-block" @style(['flex-direction:row-reverse' => $object?->block_order == 1, 'flex-direction:row' => $object?->block_order == 0])>
    <div class="text-image-columng">
        <x-admin::uploader-alt id="{!! $id !!}" page-id="{{ $pageId }}" :block-id="$object?->id"
            relationship="blockFiles" :isSingle=true :object="$object" :accept=null :isMultiple=false :isHidden=true
            header="Размер картинки 350x350" :width=350 :height=350 :block-type-id=null />
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" class="text-image-block__swap"
        {{ !empty($object->id) ? "data-block-id=$object->id" : null }} width="16" height="16" fill="inherit"
        class="bi bi-arrow-left-right" viewBox="0 0 16 16">
        <title>Поменять местами</title>
        <path fill-rule="evenodd"
            d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5m14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5" />
    </svg>

    @if (!empty($object))
        @include('admin.includes.textbox', [
            'name' => "text_image_$object->id",
            'value' => $object->text ?? '',
        ])
    @else
        @include('admin.includes.textbox', [
            'name' => 'text_image',
            'value' => $object->text ?? '',
        ])
    @endif
</div>
