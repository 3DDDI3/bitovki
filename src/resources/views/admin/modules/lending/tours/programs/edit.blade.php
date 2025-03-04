@extends('admin.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">
        @include('admin.includes.back')

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf

            @include('admin.includes.input', [
                'label' => 'День: (1-й день и т.п.)',
                'name' => 'day',
                'value' => $object->day ?? '',
            ])

            @include('admin.includes.input', [
                'label' => 'Заголовок:',
                'name' => 'title',
                'value' => $object->title ?? '',
            ])

            @include('admin.includes.select', [
                'label' => 'Тур',
                'name' => 'tour_id',
                'select' => $tours->all(),
                'select_head' => $selectedTour,
            ])

            @include('admin.includes.textbox', [
                'label' => 'Текст:',
                'name' => 'text',
                'value' => $object->text ?? '',
            ])

            {!! \App\Helpers\GenerateForm::makeGallery('Галерея', 'galary', $images, '/images/tours/programs') !!}

            @include('admin.includes.submit')
        </form>
    </div>
@endsection
