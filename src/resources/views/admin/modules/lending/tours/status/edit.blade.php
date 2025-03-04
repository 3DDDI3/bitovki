@extends('admin.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">
        @include('admin.includes.back')

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf

            @include('admin.includes.input', [
                'label' => 'Статус:',
                'name' => 'name',
                'value' => $object->name ?? '',
            ])

            {!! \App\Helpers\GenerateForm::makeImage(
                'Иконка<br>размер 24х24',
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
