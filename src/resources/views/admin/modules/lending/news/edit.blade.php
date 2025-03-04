@extends('admin.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">
        @include('admin.includes.back')

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf

            @include('admin.includes.input', [
                'label' => 'Заголовок:',
                'name' => 'title',
                'value' => $object->title ?? '',
            ])

            @include('admin.includes.textbox', [
                'label' => 'Текст на превью:',
                'name' => 'preview_text',
                'value' => $object->preview_text ?? '',
            ])

            @include('admin.includes.textbox', [
                'label' => 'Текст:',
                'name' => 'text',
                'value' => $object->text ?? '',
            ])

            @php
                $image = empty($object->image) ? '' : $object->image;
                $preview_image = empty($object->preview_image) ? '' : $object->preview_image;
            @endphp

            {!! \App\Helpers\GenerateForm::makeImage(
                'Изображение<br>размер 1015х432',
                'image',
                $object,
                '/storage/' . $image,
                false,
                empty($object->image) ? null : 'title',
            ) !!}

            {!! \App\Helpers\GenerateForm::makeImage(
                'Изоабражение на превью<br>размер 359х162',
                'preview_image',
                $object,
                '/storage/' . $preview_image,
                false,
                empty($object->preview_image) ? null : 'title',
            ) !!}

            @include('admin.includes.submit')
        </form>
    </div>
@endsection
