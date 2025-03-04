@extends('admin.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">
        @include('admin.includes.back')

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            <input type="hidden" name="object_id" value="{{ $object?->id }}">

            @csrf

            <x-admin::accordion class="accordion">
                <x-admin::accordion-item header="Превью новости">
                    @include('admin.includes.input', [
                        'label' =>
                            'Дата добавления (автоматическая подстановка при отсутсвии):<br><b>Формат записи: дд.мм.гггг</b>',
                        'name' => 'created_at',
                        'value' => $object->created_at?->format('d.m.Y') ?? '',
                    ])
                    @include('admin.includes.input', [
                        'label' => 'Заголовок:',
                        'name' => 'title',
                        'value' => $object->preview?->title ?? '',
                    ])
                    @include('admin.includes.textarea', [
                        'label' => 'Краткое описание:',
                        'name' => 'description',
                        'value' => $object->preview?->description ?? '',
                    ])
                    @include('admin.includes.checkbox', [
                        'label' => 'Главная новость:',
                        'name' => 'main_news',
                        'value' => $object->main_news ?? '',
                    ])

                    <x-admin::uploader header="Изображение" id="preview-news-image"
                        image-id="{{ !empty($object?->preview) ? $object?->preview?->id : null }}" :isHidden=true
                        header="Размер картинки 292x383" :width=292 :height=383 relationship="preview" :block-type-id=null
                        accept="" :isMultiple=true :isSingle=true :isDeletable=true :page-id=null :object="$object?->preview"
                        path="path" pathName="name" />
                </x-admin::accordion-item>
                <x-admin::accordion-item header="Содержание новости">
                    @include('admin.includes.textbox', [
                        'label' => '',
                        'name' => 'text',
                        'value' => $object->text ?? '',
                    ])
                </x-admin::accordion-item>
            </x-admin::accordion>

            @include('admin.includes.submit')
        </form>
    </div>
@endsection
