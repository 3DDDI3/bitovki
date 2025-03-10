@extends('admin.app')
@section('content')
    <h1>Настройки</h1>
    <div class='admin_edit_block'>

        <form method="post" class="admin_edit-form" enctype="multipart/form-data">
            @csrf

            @include('admin.includes.input', [
                'label' => 'Телефон:',
                'name' => 'phone',
                'value' => $object->phone ?? '',
            ])

            @include('admin.includes.input', [
                'label' => 'Email:',
                'name' => 'email',
                'value' => $object->email ?? '',
            ])

            @include('admin.includes.input', [
                'label' => 'Адрес:',
                'name' => 'address',
                'value' => $object->address ?? '',
            ])

            @include('admin.includes.input', [
                'label' => 'ИНН:',
                'name' => 'inn',
                'value' => $object->inn ?? '',
            ])

            @include('admin.includes.input', [
                'label' => 'ОГРН:',
                'name' => 'ogrn',
                'value' => $object->ogrn ?? '',
            ])


            @include('admin.includes.submit')

        </form>
    </div>
@endsection
