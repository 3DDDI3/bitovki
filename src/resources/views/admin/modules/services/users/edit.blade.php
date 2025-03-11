@extends('admin.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">

        <div class="admin_edit-links">
            <a href="{{ route('admin.services.users.index') }}">Назад к списку</a>
        </div>

        <form method="post" class="admin_edit-form" enctype="multipart/form-data">

            @csrf

            <fieldset>
                <legend>Класс и тип пользователя</legend>

                @include('admin.includes.select', [
                    'label' => 'Класс пользователя:',
                    'name' => 'class',
                    'select' => $userTypes,
                    'select_head' => $userTypeHeader,
                ])

            </fieldset>

            <fieldset>
                <legend>Основные данные</legend>

                <div class="column-items column-items2">
                    <div class="column-item">
                        @include('admin.includes.input', [
                            'label' => 'Email:',
                            'name' => 'email',
                            'value' => $object->email ?? '',
                            'required' => 'required',
                        ])
                        @if (session('message_email'))
                            <div class="error">{!! session('message_email') !!}</div>
                        @endif
                    </div>
                    <div class="column-item">
                        <div class="input_block">
                            <span>{{ !empty($object->id) ? 'Новый пароль' : 'Пароль' }}:</span>
                            <input type="password" name="password" value="" autocomplete="new-password">
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Профиль</legend>
                {{-- {!! \App\Helpers\GenerateForm::makeImage('Аватар', 'image', $object, '/storage/' . $object->image) !!} --}}
                <div class="column-items column-items3 column-items-margin">
                    <div class="column-item">
                        @include('admin.includes.input', [
                            'label' => 'Имя:',
                            'name' => 'name',
                            'value' => $object->name ?? '',
                        ])
                    </div>

                </div>
            </fieldset>
            @include('admin.includes.submit')
        </form>
    </div>
@endsection
