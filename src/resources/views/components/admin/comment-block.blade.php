@php
    $blockId = !empty($blockId) ? $blockId : '';
    $blockTypeId = empty($object) ? '3' : null;
    $id = !empty($object->id) ? $id . "_$object?->id" : $id;
@endphp

<div class="comment-block">
    <div class="comment-wrapper">
        <div>
            @if (!empty($object->id))
                @include('admin.includes.input', [
                    'label' => 'Автор:',
                    'name' => "comment_name_$object->id",
                    'value' => $object->name ?? '',
                ])
            @else
                @include('admin.includes.input', [
                    'label' => 'Автор:',
                    'name' => 'comment_name',
                    'value' => $object->name ?? '',
                ])
            @endif
            <x-admin::uploader-alt id="{{ $id }}" :isHidden=true :isDeletable=true relationship="blockFiles"
                :block-id="$object?->id" :isSingle=true :isHidden=true :isMultiple=false accept="" isSingle=true :width=529
                :height=353 header="Размер картинки 529х353" page-id="{{ $pageId }}" :$object :block-type-id=null />
        </div>
        @if (!empty($object))
            @include('admin.includes.textbox', [
                'name' => "comment_$object->id",
                'value' => $object->text ?? '',
            ])
        @else
            @include('admin.includes.textbox', [
                'name' => 'comment',
                'value' => $object->text ?? '',
            ])
        @endif
    </div>
</div>
