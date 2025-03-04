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

            <style>
                .block-wrapper {
                    display: flex;
                    column-gap: 50px;
                }

                .right-column {
                    width: 100%;
                }

                .uploader-alt {
                    margin-top: unset;
                }

                .uploader-alt__title {
                    margin: 0 0 1em 0;
                }
            </style>

            @php
                $image_id = !empty($object) ? $object->id : '';
            @endphp

            <div class="block-wrapper">

                <x-admin::uploader id="person" :isMultiple=false image-id="{{ $image_id }}" accept="image/*"
                    :width=358 :height=280 path="path" header="Размеры картинки 358х280" path-name="name" :$object
                    :isHidden=true :isDeletable=true />

                <div class="right-column">
                    @include('admin.includes.input', [
                        'label' => 'ФИО:',
                        'name' => 'name',
                        'value' => $object->name ?? '',
                    ])

                    @include('admin.includes.select', [
                        'label' => 'Должность:',
                        'name' => 'specialty',
                        'select' => $specialties->all(),
                        'select_head' => $specialty_head,
                    ])
                    @include('admin.includes.submit')
                </div>
            </div>
        </form>
    </div>
@endsection
