@extends('admin.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">

        <div class="admin_edit-links">
            <a href="{{ route('admin.' . $path . '.index') }}">Назад к списку</a>
        </div>

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            <input type="hidden" name="object_id" value="{{ $object?->id }}">

            @csrf

            @php
                $image_id = !empty($object) ? $object->id : '';
            @endphp

            <x-admin::uploader id="medication-types" :isMultiple=false image-id="{{ $image_id }}" accept="image/*"
                header="Размер картинки 30х30" path="path" path-name="name" :$object :isHidden=true :isDeletable=true />

            @include('admin.includes.input', [
                'label' => 'Тип:',
                'name' => 'title',
                'value' => $object->title ?? '',
            ])

            @include('admin.includes.submit')
        </form>

    </div>

    @component('components.admin.sorting-button')
    @endcomponent
@endsection
