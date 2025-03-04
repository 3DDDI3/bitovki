@extends('admin.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">

        <div class="admin_edit-links">
            <a href="{{ route('admin.' . $path . '.index') }}">Назад к списку</a>
        </div>

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">

            @csrf

            @include('admin.includes.input', [
                'label' => 'Должность:',
                'name' => 'name',
                'value' => $object->name ?? '',
            ])

            @include('admin.includes.submit')
        </form>

    </div>

    @component('components.admin.sorting-button')
    @endcomponent
@endsection
