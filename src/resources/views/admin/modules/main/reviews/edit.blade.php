@extends('admin.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">
        @include('admin.includes.back')

        <input type="hidden" name="object_id" value="{{ $object?->id }}">

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf

            <x-admin::uploader id="review" image-id="{{ $object->id }}" {{-- :width=248 header="Размер картинки 248x365" :height=365  --}} :isMultiple=false
                :block-type-id=null :isHidden=true :isDeletable=true :isSingle=true :page-id=null path="image_path"
                pathName="image_name" accept="image/*" :object="$object" />

            @include('admin.includes.submit')
        </form>
    </div>
@endsection
