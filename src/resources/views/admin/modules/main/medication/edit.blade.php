@extends('admin.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">
        @include('admin.includes.back')

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            <input type="hidden" name="object_id" value="{{ $object?->id }}">

            @csrf

            <style>
                .block-wrapper {
                    display: flex;
                    column-gap: 50px;
                }

                .block-row {
                    flex-grow: 1;
                }
            </style>

            <x-admin::accordion class="accordion">
                <x-admin::accordion-item header="Превью препарата">
                    <div class="block-wrapper">
                        <x-admin::uploader id="medication-preview"
                            image-id="{{ !empty($object?->preview) ? $object?->preview?->id : null }}" :isMultiple=false
                            :width=600 :height=514 relationship="preview" :block-type-id=null :isHidden=true
                            header="Размер картинки 600x514" :isDeletable=true :isSingle=true :page-id=null path="path"
                            pathName="name" accept="image/*" :object="$object->preview" />
                        <div class="block-row">
                            @include('admin.includes.input', [
                                'label' => 'Название:',
                                'name' => 'preview_title',
                                'value' => $object->preview->title ?? '',
                            ])
                            @include('admin.includes.input', [
                                'label' => 'Описание:',
                                'name' => 'preview_subtitle',
                                'value' => $object->preview->subtitle ?? '',
                            ])
                        </div>
                    </div>
                </x-admin::accordion-item>

                <x-admin::accordion-item header="Основная информация">
                    <div class="block-wrapper">
                        <div class="block-row">
                            @include('admin.includes.select', [
                                'label' => 'Тип препарата',
                                'name' => 'medicationType',
                                'select' => $medicationTypes,
                                'select_head' => $medicationTypeHeader,
                            ])
                            <x-admin::uploader id="description-file" image-id="{{ $object->id ?? null }}" :isMultiple=false
                                :width=90 :height=90 relationship="preview" :block-type-id=null :isHidden=true
                                header="Размер иконки 90x90" :isDeletable=true :isSingle=true :page-id=null
                                path="description_path" pathName="description_name" accept="image/*" :object="$object" />
                            @include('admin.includes.textarea', [
                                'label' => 'Краткое описание:',
                                'name' => 'short_description',
                                'value' => $object->short_description ?? '',
                            ])
                            @include('admin.includes.textbox', [
                                'label' => 'Описание препарата',
                                'name' => 'description',
                                'value' => $object->description ?? '',
                            ])
                        </div>
                    </div>
                </x-admin::accordion-item>

                <x-admin::accordion-item header="Инструкция" :isEditableHeader=true headerName="instraction_title"
                    headerValue="{{ $object->instraction_title }}">
                    <div class="block-wrapper">
                        <div class="block-row">
                            @include('admin.includes.textarea', [
                                'label' => 'Подпись к инструкции:',
                                'name' => 'instraction_short',
                                'value' => $object->instraction_short ?? '',
                            ])
                            @include('admin.includes.textbox', [
                                'label' => 'Краткое описание:',
                                'name' => 'instraction_short_descripion',
                                'value' => $object->instraction_short_descripion ?? '',
                            ])
                            @include('admin.includes.textbox', [
                                'label' => 'Показания:',
                                'name' => 'indications',
                                'value' => $object->indications ?? '',
                            ])
                        </div>
                    </div>

                    <x-admin::uploader id="medication-character" image-id="{{ $object->id }}" :isMultiple=false
                        header="Общая характеристика лекарственного препарата" :relationship=null :block-type-id=null
                        :isHidden=false :isDeletable=true :isSingle=true :page-id=null path="instraction_path"
                        pathName="instraction_name" accept=".pdf" :object="$object" />
                </x-admin::accordion-item>

                <x-admin::accordion-item header="Прикрепленные файлы">
                    <x-admin::uploader-alt id="medication-file" :isHidden=false relationship="files" :block-type-id=null
                        :block-id="$object->id" accept="" :isMultiple=true :isSingle=false :isDeletable=false :page-id=null
                        :object="$object" path="path" path-name="name" />
                </x-admin::accordion-item>

                <style>
                    .phases {
                        display: flex;
                        flex-direction: column;
                        row-gap: 20px;
                    }

                    .phase {
                        display: flex;
                        column-gap: 20px;
                        align-items: center;

                        .phase__delete {
                            flex-shrink: 0;
                            width: 20px;
                            height: 20px;
                            cursor: pointer;
                        }
                    }
                </style>

                <x-admin::accordion-item header="Исследования эффективности и безопасности" :isEditableHeader=true
                    headerName="reseaches_title" headerValue="{{ $object->reseaches_title }}">
                    @include('admin.includes.textarea', [
                        'label' => 'Описание исследований:',
                        'name' => 'researches_description',
                        'value' => $object->researches_description ?? '',
                    ])
                    @include('admin.includes.input', [
                        'label' => 'Кол-во добровольцев:',
                        'name' => 'volunteers_count',
                        'value' => $object->volunteers_count ?? '',
                    ])
                    @include('admin.includes.input', [
                        'label' => 'Кол-во рандомизированных:',
                        'name' => 'patients_count',
                        'value' => $object->patients_count ?? '',
                    ])
                    @include('admin.includes.input', [
                        'label' => 'Текст вместо "рандомизированных":',
                        'name' => 'patient_title',
                        'value' => $object->patient_title,
                    ])
                    @include('admin.includes.input', [
                        'label' => htmlspecialchars(
                            'Текст вместо "Всего в исследованиях приняло участие (используйте <br> для переноса текста)":'),
                        'name' => 'phases_text',
                        'value' => $object->phases_text,
                    ])
                    @include('admin.includes.input', [
                        'label' => 'Текст вместо "добровольцев":',
                        'name' => 'patients_count_title',
                        'value' => $object->patients_count_title,
                    ])
                    @include('admin.includes.input', [
                        'label' => 'Кол-во субъектов:',
                        'name' => 'subjects_count',
                        'value' => $object->subjects_count ?? '',
                    ])
                </x-admin::accordion-item>

                <x-admin::accordion-item header="Фазы исследований" {{-- :isEditableHeader=true headerName="phases_title"
                    headerValue="{{ $object->phases_title }}" --}}>
                    <div class="phases">
                        <div class="phase" style="display: none;">
                            {{-- @include('admin.includes.input', [
                                'label' => 'Фаза:',
                                'name' => 'reseaches_phase',
                                'value' => '',
                            ]) --}}
                            @include('admin.includes.textarea', [
                                'label' => 'Описание фазы:',
                                'name' => 'reseaches_description',
                                'value' => '',
                            ])
                            <svg class="phase__delete" data-block-id="34" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5">
                                </path>
                            </svg>
                        </div>
                        @include('admin.includes.textarea', [
                            'label' => 'Заголовок:',
                            'name' => 'researches_title',
                            'value' => $object->researches_title,
                        ])
                        @foreach ($object->researches as $research)
                            <div class="phase">
                                <style>
                                    .phases {
                                        margin-bottom: 40px;
                                    }
                                </style>
                                {{-- @include('admin.includes.input', [
                                    'label' => 'Фаза:',
                                    'name' => "reseaches_phase_$research->id",
                                    'value' => $research->phase,
                                ]) --}}
                                @include('admin.includes.textarea', [
                                    'label' => 'Описание фазы:',
                                    'name' => "reseaches_description_$research->id",
                                    'value' => $research->description,
                                ])
                                <svg class="phase__delete" data-block-id="{{ $research->id }}"
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5">
                                    </path>
                                </svg>
                            </div>
                        @endforeach
                    </div>
                    <div class='input_block'>
                        <button class="phase__create">Добавить исследование</button>
                    </div>
                </x-admin::accordion-item>

            </x-admin::accordion>

            @include('admin.includes.submit')
        </form>
    </div>
@endsection
