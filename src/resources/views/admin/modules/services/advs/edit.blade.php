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

            @include('admin.includes.input', [
                'label' => 'Подзаголовок:',
                'name' => 'subtitle',
                'value' => $object->subtitle ?? '',
            ])

            @include('admin.includes.textbox', [
                'label' => 'Текст:',
                'name' => 'text',
                'value' => $object->text ?? '',
            ])

            {!! \App\Helpers\GenerateForm::makeImage(
                'Рекламное изображение<br>(рекомендуемый размер 1348x484)',
                'img',
                $object,
                '/storage/' . $object->img,
                false,
                empty($object->img) ? null : 'title',
            ) !!}

            {{-- @dd($pages->all()[0]->id) --}}

            {{-- @dd($selectedPages->all(), $pages->all()) --}}

            @include('admin.includes.submit')
        </form>
    </div>
@endsection
