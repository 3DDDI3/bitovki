@extends('admin.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">

        <div class="admin_edit-links">
            <a href="{{ route('admin.' . $PATH . '.index') }}">Назад к списку</a>
        </div>

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">

            @csrf

            {!! \App\Helpers\GenerateForm::makeCheckbox('header_show', $object->header_show, 'Показывать в выпадающем меню') !!}
            {!! \App\Helpers\GenerateForm::makeCheckbox('footer_show', $object->footer_show, 'Показывать в подвале') !!}

            <div class="input_block">
                <span>Секция:</span>
                <select name="section_id">
                    <option value="0">Выбрать</option>
                    @foreach ($sections as $value)
                        <option value="{{ $value->id }}" @if ($object && $value->id == $object->section_id) selected="selected" @endif>
                            {{ $value->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input_block">
                <span>Заголовок:</span>
                <textarea type="text" name="title" required="">{{ $object->title ?? '' }}</textarea>
            </div>

            {!! \App\Helpers\GenerateForm::makeImage('Баннер', 'banner', $object, '/storage/' . $object->banner) !!}

            {!! \App\Helpers\GenerateForm::makeTextbox('Текст', 'text', $object->text ?? '') !!}

            <div class="input_block">
                <span>Ссылка (автоматически):</span>
                <input type="text" name="url" value="{{ $object->url ?? '' }}">
            </div>

            @include('admin.includes.input', [
                'label' => 'Рейтинг (для сортировки):',
                'name' => 'rating',
                'value' => $object->rating ?? '',
            ])

            @include('admin.includes.submit')
        </form>

    </div>
@endsection
