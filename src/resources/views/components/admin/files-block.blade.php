@php
    $blockTypeId = empty($object) ? '5' : null;
    $id = !empty($object->id) ? $id . "_$object?->id" : $id;
@endphp

<div class="files-block">
    <x-admin::uploader-alt id="{{ $id }}" :isDeletable=false :isHidden=false :$object :isMultiple=true
        :block-id="$object?->id" accept="{{ $accept }}" relationship="blockFiles" :isSingle=false
        page-id="{{ $pageId }}" :block-type-id=null />
</div>
