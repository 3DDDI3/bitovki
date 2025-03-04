@extends('admin.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">
        @include('admin.includes.back')

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf

            <div style="margin-top: 30px">
                @include('admin.includes.checkbox', [
                    'label' => 'Подтвержденный агент',
                    'name' => 'isConfirmed',
                    'value' => $object->isConfirmed,
                ])
                @include('admin.includes.checkbox', [
                    'label' => 'Активный агент',
                    'name' => 'isActive',
                    'value' => $object->isActive,
                ])
            </div>

            @include('admin.includes.textbox', [
                'label' => 'Имя',
                'name' => 'name',
                'value' => $object->name ?? '',
            ])

            @include('admin.includes.input', [
                'label' => 'Телефон',
                'name' => 'phone',
                'value' => $object->phone ?? '',
            ])

            @include('admin.includes.input', [
                'label' => 'Email',
                'name' => 'email',
                'value' => $object->user->email ?? '',
            ])

            @include('admin.includes.textbox', [
                'label' => 'Адрес:',
                'name' => 'address',
                'value' => $object->address ?? '',
            ])

            {!! \App\Helpers\GenerateForm::makeImage(
                'Логотип<br>размер 190х160',
                'logo',
                $object,
                '/storage/' . $object->logo,
                false,
                empty($object->logo) ? null : 'title',
            ) !!}

            @include('admin.includes.submit')
        </form>
    </div>
@endsection
