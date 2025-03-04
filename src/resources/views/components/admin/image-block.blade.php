@php
    $blockId = !empty($blockId) ? $blockId : '';
    $blockTypeId = empty($object) ? '6' : null;
    $id = !empty($object?->id) ? $id . "_$object?->id" : $id;
@endphp

<div class="image-block">
    <x-admin::uploader-alt id="{{ $id }}" :isHidden=true :isDeletable=true block-id="{{ $blockId }}"
        relationship="blockFiles" :isSingle=true :isHidden=true :isMultiple=false accept="" :width=1140 :height=434
        header="Размер картинки 1140x434" page-id="{{ $pageId }}" :$object :block-type-id=null />
</div>
