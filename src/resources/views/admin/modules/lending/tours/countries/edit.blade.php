@extends('admin.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">
        @include('admin.includes.back')
        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf

            @include('admin.includes.input', [
                'label' => 'Название:',
                'name' => 'name',
                'value' => $object->name ?? '',
            ])

            {!! \App\Helpers\GenerateForm::makeImage(
                'Иконка<br>размер 35х35',
                'icon',
                $object,
                '/storage/' . $object->icon,
                false,
                empty($object->icon) ? null : 'title',
            ) !!}

            {!! \App\Helpers\GenerateForm::makeImage(
                'Карточка<br>размер 425х200',
                'image',
                $object,
                '/storage/' . $object->image,
                false,
                empty($object->image) ? null : 'title',
            ) !!}

            @include('admin.includes.submit')
        </form>
    </div>
@endsection
