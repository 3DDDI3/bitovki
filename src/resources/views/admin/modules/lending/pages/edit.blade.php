@extends('admin.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">
        @include('admin.includes.back')

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf

            @include('admin.includes.input', [
                'label' => 'Название:',
                'name' => 'title',
                'value' => $object->title ?? '',
            ])

            {{-- @dd($docs) --}}

            @switch($object->id)
                @case(1)
                    @include('admin.includes.textbox', [
                        'label' => 'Текст слева:',
                        'name' => 'about_text_1',
                        'value' => $object->about_text_1 ?? '',
                    ])

                    @include('admin.includes.textbox', [
                        'label' => 'Текст справа:',
                        'name' => 'about_text_2',
                        'value' => $object->about_text_2 ?? '',
                    ])

                    {!! \App\Helpers\GenerateForm::makeGallery('Галерея', 'galary', $images, '/images/tours/gallary/') !!}
                @break

                @case(2)
                    {{-- {!! \App\Helpers\GenerateForm::makeFile('Прикрепленные документы', 'attached_files', $docs, '/storage/files') !!} --}}
                @break

                @default
            @endswitch

            {!! \App\Helpers\GenerateForm::makeMultipleSelect(
                'Прикрепленные страницы',
                'attached_pages',
                $pages,
                $attached_pages->all(),
            ) !!}


            {!! \App\Helpers\GenerateForm::makeMultipleSelect(
                'Прикрепленные документы',
                'attached_files',
                $docs,
                $selectedDocs->all(),
            ) !!}

            @include('admin.includes.textbox', [
                'label' => 'Текст:',
                'name' => 'text',
                'value' => $object->text ?? '',
            ])

            {{-- @php
                $background_image = empty($object->background_image) ? '' : $object->background_image;
            @endphp --}}
            {{-- 
            {!! \App\Helpers\GenerateForm::makeImage(
                'Фоновое изображение',
                'background_image',
                $object,
                '/storage/' . $background_image,
                false,
                empty($object->background_image) ? null : 'title',
            ) !!}

            {!! \App\Helpers\GenerateForm::makeGallery(
                'Галерея',
                'galary',
                $object->gallery()->get()->all(),
                '/images/tours/gallary',
            ) !!} --}}

            @include('admin.includes.submit')
        </form>
    </div>
@endsection
