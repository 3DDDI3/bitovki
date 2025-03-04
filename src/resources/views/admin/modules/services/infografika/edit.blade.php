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

            {{-- @dd($pages->all()[0]->id) --}}

            {{-- @dd($selectedPages->all(), $pages->all()) --}}

            @include('admin.includes.select', [
                'label' => 'Страница',
                'name' => 'attached_pages',
                'select' => $pages->all(),
                'select_head' => $selectedPage,
                'class' => 'page',
            ])

            @include('admin.includes.select', [
                'label' => 'Тур',
                'name' => 'tour_id',
                'select' => $tours->all(),
                'select_head' => $selectedTour,
                'class' => 'tour',
            ])

            @include('admin.includes.textbox', [
                'label' => 'Текст:',
                'name' => 'text',
                'value' => $object->text ?? '',
            ])

            @include('admin.includes.input', [
                'label' => 'Дополнительный блок:',
                'name' => 'subtitle',
                'value' => $object->subtitle ?? '',
            ])

            {!! \App\Helpers\GenerateForm::makeImage(
                'Иконка',
                'icon',
                $object,
                '/storage/' . $object->icon,
                false,
                empty($object->icon) ? null : 'title',
            ) !!}

            @include('admin.includes.submit')
        </form>
    </div>
@endsection
