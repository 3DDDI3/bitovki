@extends('admin.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">
        @include('admin.includes.back')

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf

            @include('admin.includes.textarea', [
                'label' => 'Вопрос:',
                'name' => 'question',
                'value' => $object->question ?? '',
            ])

            @include('admin.includes.textarea', [
                'label' => 'Ответ:',
                'name' => 'answer',
                'value' => $object->answer ?? '',
            ])

            @include('admin.includes.submit')
        </form>
    </div>
@endsection
