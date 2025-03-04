@php
    $blockId = !empty($blockId) ? $blockId : '';
    $blockTypeId = empty($object) ? '5' : null;
    $id = !empty($object?->id) ? $id . "_$object?->id" : $id;
@endphp

<style>
    .background-image-block {
        display: flex;
        column-gap: 50px;
    }
</style>

<div class="background-image-block" @style(['flex-direction:row-reverse' => $object?->block_order == 1, 'flex-direction:row' => $object?->block_order == 0])>
    <div class="background-image-column">
        <x-admin::uploader-alt id="{!! $id !!}" page-id="{{ $pageId }}" :block-id="$object?->id"
            relationship="blockFiles" :isSingle=true :object="$object" :accept=null :isMultiple=false :isHidden=true
            :width=1132 :height=434 :block-type-id=null header="Размер картинки 1132х434" />
    </div>

    @if (!empty($object))
        @include('admin.includes.textbox', [
            'name' => "background-image_$object->id",
            'value' => $object->text ?? '',
        ])
    @else
        @include('admin.includes.textbox', [
            'name' => 'background-image',
            'value' => $object->text ?? '',
        ])
    @endif
</div>
