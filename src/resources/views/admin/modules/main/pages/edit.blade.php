@extends('admin.app')

@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">
        <div class="admin_edit-links">
            <a href="{{ route('admin.' . $path . '.index') }}">Назад к списку</a>
        </div>

        <style>
            .admin_content {
                width: 100% !important;
            }
        </style>

        <style>
            .demo.croppie-container {
                height: 300px;
                width: 300px;
                margin-bottom: 100px;
            }

            .panel-heading.note-toolbar .note-para .dropdown-toggle.list-styles {
                width: 20px;
                padding-left: 5px;
            }

            .panel-heading.note-toolbar .dropdown-list-styles {
                padding: 5px 0 !important;
                min-width: 120px !important;
            }

            .dropdown-list-styles>li>a>ol {
                margin-bottom: 0px;
            }
        </style>

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">

            @csrf

            <x-admin::accordion class="accordion" style="margin-bottom: 2rem;">
                <x-admin::accordion-item id="main-ifno" header="Основная информация">
                    @include('admin.includes.input', [
                        'label' => 'Название страницы:',
                        'name' => 'name',
                        'value' => $object->name ?? '',
                    ])
                    @include('admin.includes.input', [
                        'label' => 'Ссылка (генерируется автоматически при отсутствии):',
                        'name' => 'url',
                        'value' => $object->url ?? '',
                    ])
                </x-admin::accordion-item>

                @switch($object->id)
                    @case(1)
                        <x-admin::accordion-item id="infografika" header="Инфографика">
                            @include('admin.includes.input', [
                                'label' => 'Заголовок 1:',
                                'name' => 'title_1',
                                'value' => $infografika->title_1 ?? '',
                            ])
                            @include('admin.includes.textarea', [
                                'label' => 'Описание 1:',
                                'name' => 'text_1',
                                'value' => $infografika->text_1 ?? '',
                            ])
                            @include('admin.includes.input', [
                                'label' => 'Заголовок 2:',
                                'name' => 'title_2',
                                'value' => $infografika->title_2 ?? '',
                            ])
                            @include('admin.includes.textarea', [
                                'label' => 'Описание 2:',
                                'name' => 'text_2',
                                'value' => $infografika->text_2 ?? '',
                            ])
                            @include('admin.includes.input', [
                                'label' => 'Заголовок 3:',
                                'name' => 'title_3',
                                'value' => $infografika->title_3 ?? '',
                            ])
                            @include('admin.includes.textarea', [
                                'label' => 'Описание 3:',
                                'name' => 'text_3',
                                'value' => $infografika->text_3 ?? '',
                            ])
                        </x-admin::accordion-item>

                        <style>
                            .block-wrapper {
                                display: flex;
                                column-gap: 50px;

                                .block__row {
                                    display: flex;
                                    flex-direction: column;
                                    flex-grow: 1;
                                }
                            }
                        </style>

                        <style>
                            .list {
                                display: flex;
                                flex-direction: column;
                                row-gap: 20px;
                                margin-top: 20px;

                                .item {
                                    display: flex;
                                    column-gap: 20px;
                                    align-items: self-end;
                                }
                            }
                        </style>

                        <x-admin::accordion-item id="cards" header="Карточки">
                            @foreach ($object->cards as $card)
                                <fieldset>
                                    <legend>Карточка #{{ $card->id }}</legend>
                                    <div class="block-wrapper">
                                        <x-admin::uploader id="card_{{ $card->id }}" image-id="{{ $card->id }}" :width=248
                                            header="Размер картинки 248x365" :height=365 :isMultiple=false :block-type-id=null
                                            :isHidden=true :isDeletable=true :isSingle=true :page-id=null path="path"
                                            pathName="path" accept="image/*" :object="$card" />
                                        <div class="block__row">
                                            @include('admin.includes.input', [
                                                'label' => 'Заголовок',
                                                'name' => "card_title_$card->id",
                                                'value' => $card->title ?? '',
                                            ])
                                            <div class="list-block">
                                                <div class="list">
                                                    <div class="item" style="display: none;">
                                                        @include('admin.includes.textarea', [
                                                            'label' => 'Заголовок',
                                                            'name' => 'card_item',
                                                            'value' => '',
                                                        ])
                                                        <div class="input_block">
                                                            <button class="list__delete">Удалить</button>
                                                        </div>
                                                    </div>
                                                    @foreach ($card->items as $item)
                                                        <div class="item">
                                                            @include('admin.includes.textarea', [
                                                                'label' => 'Заголовок',
                                                                'name' => "card_item_{$item->id}",
                                                                'value' => $item->text,
                                                            ])
                                                            <div class="input_block">
                                                                <button data-id="{{ $item->id }}"
                                                                    class="list__delete">Удалить</button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="input_block">
                                                    <button data-id="{{ $card->id }}" class="list__update">Добавить элемент
                                                        списка</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            @endforeach
                        </x-admin::accordion-item>

                        <x-admin::accordion-item id="media-content" header="Медиаконтент">
                            <x-admin::video-uploader id="video-uploader" :object="$mainPage" />
                        </x-admin::accordion-item>
                    @break

                    @case(2)
                        {{-- Страница Контакты --}}
                        <x-admin::accordion-item id="contact-info" header="Контактная информация">
                            <style>
                                .block-wrapper {
                                    display: flex;
                                    column-gap: 50px;

                                    .right-column,
                                    .left-column {
                                        flex-basis: 50%;

                                        .row {
                                            margin-top: 15px;
                                            display: flex;
                                            column-gap: 20px;

                                            .input_block {
                                                margin-top: unset;
                                            }
                                        }
                                    }
                                }
                            </style>
                            <div class="block-wrapper">
                                <div class="left-column">
                                    <h3>Контактная информация ИИХР:</h3>
                                    <div class="row">
                                        @include('admin.includes.input', [
                                            'label' => 'Номер:',
                                            'name' => 'phone1',
                                            'value' => $companyContact[0]->phone ?? '',
                                        ])
                                        @include('admin.includes.input', [
                                            'label' => 'доб.:',
                                            'name' => 'phone_description1',
                                            'value' => $companyContact[0]->phone_description ?? '',
                                        ])
                                    </div>
                                    @include('admin.includes.input', [
                                        'label' => 'ФИО:',
                                        'name' => 'name1',
                                        'value' => $companyContact[0]->name ?? '',
                                    ])
                                    @include('admin.includes.input', [
                                        'label' => 'Почта:',
                                        'name' => 'email1',
                                        'value' => $companyContact[0]->email ?? '',
                                    ])
                                </div>
                                <div class="right-column">
                                    <h3>По вопросам закупки:</h3>
                                    <div class="row">
                                        @include('admin.includes.input', [
                                            'label' => 'Номер:',
                                            'name' => 'phone2',
                                            'value' => $companyContact[1]->phone ?? '',
                                        ])
                                        @include('admin.includes.input', [
                                            'label' => 'доб.:',
                                            'name' => 'phone_description2',
                                            'value' => $companyContact[1]->phone_description ?? '',
                                        ])
                                    </div>
                                    @include('admin.includes.input', [
                                        'label' => 'ФИО:',
                                        'name' => 'name2',
                                        'value' => $companyContact[1]->name ?? '',
                                    ])
                                    @include('admin.includes.input', [
                                        'label' => 'Почта:',
                                        'name' => 'email2',
                                        'value' => $companyContact[1]->email ?? '',
                                    ])
                                </div>
                            </div>
                        </x-admin::accordion-item>
                        <x-admin::accordion-item id="contact-info" header="Блок с Yandex картой">
                            <div class="block-wrapper">
                                <x-admin::uploader id="map-image" :isMultiple=false :isHidden=true path="photo" :width=349
                                    header="Размер картинки 349х246" :height=246 path-name="photo_name" :isDeletable=true
                                    :isSingle=true accept="image/*" :object="$companyAddress" header="Изображение возле карты" />
                                <x-admin::uploader id="map-schema" :isHidden=false path="schema" :isDeletable=true :isSingle=true
                                    :isMultiple=false accept="pdf" :object="$companyAddress" header="Схема проезда" />
                            </div>
                            @include('admin.includes.input', [
                                'label' => 'Заголовок:',
                                'name' => 'title',
                                'value' => $companyAddress->title ?? '',
                            ])
                            @include('admin.includes.input', [
                                'label' => 'Адрес:',
                                'name' => 'address',
                                'value' => $companyAddress->address ?? '',
                            ])
                            @include('admin.includes.input', [
                                'label' => 'Режим работы:',
                                'name' => 'subtitle',
                                'value' => $companyAddress->subtitle ?? '',
                            ])
                        </x-admin::accordion-item>
                        <x-admin::accordion-item id="contact-info" header="Блок с маршрутом">
                            @include('admin.includes.textbox', [
                                'label' => 'Маршрут на автомобиле:',
                                'name' => 'auto_text',
                                'value' => $companyAddress->auto_text ?? '',
                            ])
                            @include('admin.includes.textbox', [
                                'label' => 'Маршрут на общественном транспорте:',
                                'name' => 'bus_text',
                                'value' => $companyAddress->bus_text ?? '',
                            ])
                        </x-admin::accordion-item>
                        <x-admin::accordion-item id="contact-info" header="Блок с реквизитами">
                            @include('admin.includes.input', [
                                'label' => 'ИНН:',
                                'name' => 'inn',
                                'value' => $company->inn ?? '',
                            ])
                            @include('admin.includes.input', [
                                'label' => 'КПП:',
                                'name' => 'kpp',
                                'value' => $company->kpp ?? '',
                            ])
                            @include('admin.includes.input', [
                                'label' => 'ОГРН:',
                                'name' => 'ogrn',
                                'value' => $company->ogrn ?? '',
                            ])
                            @include('admin.includes.input', [
                                'label' => 'ОКПО:',
                                'name' => 'okpo',
                                'value' => $company->okpo ?? '',
                            ])
                            <x-admin::uploader id="requisites" :isHidden=false path="requisites" :isDeletable=true :isSingle=false
                                :isMultiple=false accept="image/*" :object="$company" header="Реквизиты" />
                        </x-admin::accordion-item>
                    @break

                    @case(3)
                        {{-- Страница о нас --}}
                        @foreach ($object->blocks as $block)
                            @switch($block->block_type_id)
                                @case(1)
                                    <x-admin::accordion-item header="Блок с описанием" block-type-id="1" page-id="{{ $object->id }}"
                                        block-id="{{ $block->id }}">
                                        <x-admin::description-block page-id="{{ $object->id }}" :object="$block" :isDeletable=true
                                            id="text-image-uploader" />
                                    </x-admin::accordion-item>
                                @break

                                @case(2)
                                    <x-admin::accordion-item header="Текстовый блок с изображением" block-type-id="2"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}">
                                        <x-admin::text-image-block page-id="{{ $object->id }}" :isDeletable=true :object="$block"
                                            id="text-image-uploader" />
                                    </x-admin::accordion-item>
                                @break

                                @case(3)
                                    <x-admin::accordion-item header="Блок с комментарием" id="comment-block" block-type-id="3"
                                        page-id="{{ $object->id }}" block-id="{{ $block->id }}">
                                        <x-admin::comment-block :object="$block" page-id="{{ $object->id }}" :isDeletable=true
                                            id="comment-upload" />
                                    </x-admin::accordion-item>
                                @break

                                @case(4)
                                    <x-admin::accordion-item header="Блок с сотрудниками" id="people-block" block-type-id="4"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}">
                                        <x-admin::people-block :object="$personal" block-id="{{ $block->id }}" :selected-object="$block->has('personal')->get()"
                                            id="personal_block" page-id="{{ $object->id }}" block-type-id="4" />
                                    </x-admin::accordion-item>
                                @break

                                @case(5)
                                    <x-admin::accordion-item header="Блок с прикрепленными файлами" block-type-id="5"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}" style="display: none;">
                                        <x-admin::files-block :object=$block page-id="{{ $object->id }}" id="files" />
                                    </x-admin::accordion-item>
                                @break

                                @case(6)
                                    <x-admin::accordion-item header="Блок с изображением" block-type-id="6"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}" style="display: none;">
                                        <x-admin::image-block :object=$block page-id="{{ $object->id }}"
                                            block-id="{{ $block->id }}" id="image-block-uploader" />
                                    </x-admin::accordion-item>
                                @break

                                @case(7)
                                    <x-admin::accordion-item header="Блок с меню" block-type-id="7" page-id="{{ $object->id }}"
                                        block-id="{{ $block->id }}">
                                        <x-admin::menu-block page-id="{{ $object->id }}" block-id="{{ $block->id }}"
                                            :object="$block" />
                                    </x-admin::accordion-item>
                                @break

                                @case(9)
                                    <x-admin::accordion-item header="Блок с описанием и рамкой" block-type-id="9"
                                        page-id="{{ $object->id }}" block-id="{{ $block->id }}">
                                        <x-admin::description-block page-id="{{ $object->id }}" :object="$block" :isDeletable=true
                                            id="text-image-uploader" />
                                    </x-admin::accordion-item>
                                @break
                            @endswitch
                        @endforeach
                    @break

                    @case(4)
                        {{-- Страница о Производство АФС --}}
                        @foreach ($object->blocks as $block)
                            @switch($block->block_type_id)
                                @case(1)
                                    <x-admin::accordion-item header="Блок с описанием" block-type-id="1" page-id="{{ $object->id }}"
                                        block-id="{{ $block->id }}" :isDeletable=true>
                                        <x-admin::description-block page-id="{{ $object->id }}" :object="$block" :isDeletable=true
                                            id="text-image-uploader" />
                                    </x-admin::accordion-item>
                                @break

                                @case(2)
                                    <x-admin::accordion-item header="Текстовый блок с изображением" block-type-id="2"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}" :isDeletable=true>
                                        <x-admin::text-image-block page-id="{{ $object->id }}" :isDeletable=true :object="$block"
                                            id="text-image-uploader" />
                                    </x-admin::accordion-item>
                                @break

                                @case(3)
                                    <x-admin::accordion-item header="Блок с комментарием" id="comment-block" block-type-id="3" :width=529
                                        :height=353 page-id="{{ $object->id }}" :isDeletable=true block-id="{{ $block->id }}">
                                        <x-admin::comment-block :object="$block" page-id="{{ $object->id }}" :isDeletable=true
                                            id="comment-upload" />
                                    </x-admin::accordion-item>
                                @break

                                @case(4)
                                    <x-admin::accordion-item header="Блок с сотрудниками" id="people-block" block-type-id="4"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}" :isDeletable=true>
                                        <x-admin::people-block :object="$personal" block-id="{{ $block->id }}" :selected-object="$block->has('personal')->get()"
                                            id="personal_block" page-id="{{ $object->id }}" block-type-id="4" />
                                    </x-admin::accordion-item>
                                @break

                                @case(5)
                                    <x-admin::accordion-item header="Блок с прикрепленными файлами" isDeletable="true" block-type-id="5"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}" style="display: none;">
                                        <x-admin::files-block :object=$block page-id="{{ $object->id }}" id="files" />
                                    </x-admin::accordion-item>
                                @break

                                @case(6)
                                    <x-admin::accordion-item header="Блок с изображением" isDeletable="true" block-type-id="6"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}" style="display: none;">
                                        <x-admin::image-block :object=$block page-id="{{ $object->id }}"
                                            block-id="{{ $block->id }}" id="image-main-block-uploader" />
                                    </x-admin::accordion-item>
                                @break

                                @case(7)
                                    <x-admin::accordion-item header="Блок с меню" block-type-id="7" page-id="{{ $object->id }}"
                                        block-id="{{ $block->id }}" :isDeletable=true>
                                        <x-admin::menu-block page-id="{{ $object->id }}" block-id="{{ $block->id }}"
                                            :object="$block" />
                                    </x-admin::accordion-item>
                                @break

                                @case(8)
                                    <x-admin::accordion-item header="Блок с прикрепленными изображениями" isDeletable="true"
                                        block-type-id="8" block-id="{{ $block->id }}" page-id="{{ $object->id }}"
                                        style="display: none;">
                                        <x-admin::files-block :object=$block page-id="{{ $object->id }}" id="files" />
                                    </x-admin::accordion-item>
                                @break

                                @case(9)
                                    <x-admin::accordion-item header="Блок с описанием и рамкой" block-type-id="9"
                                        page-id="{{ $object->id }}" block-id="{{ $block->id }}" :isDeletable=true>
                                        <x-admin::description-block page-id="{{ $object->id }}" :object="$block" :isDeletable=true
                                            id="text-image-uploader" />
                                    </x-admin::accordion-item>
                                @break
                            @endswitch
                        @endforeach
                    @break

                    @case(5)
                        {{-- Страница о Производство ГЛФ --}}
                        @foreach ($object->blocks as $block)
                            @switch($block->block_type_id)
                                @case(1)
                                    <x-admin::accordion-item header="Блок с описанием" block-type-id="1" page-id="{{ $object->id }}"
                                        block-id="{{ $block->id }}" :isDeletable=true>
                                        <x-admin::description-block page-id="{{ $object->id }}" :object="$block" :isDeletable=true
                                            id="description-block" />
                                    </x-admin::accordion-item>
                                @break

                                @case(2)
                                    <x-admin::accordion-item header="Текстовый блок с изображением" block-type-id="2"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}" :isDeletable=true>
                                        <x-admin::text-image-block page-id="{{ $object->id }}" :isDeletable=true :object="$block"
                                            id="text-image-uploader" />
                                    </x-admin::accordion-item>
                                @break

                                @case(3)
                                    <x-admin::accordion-item header="Блок с комментарием" id="comment-block" block-type-id="3" :width=529
                                        :height=353 page-id="{{ $object->id }}" :isDeletable=true block-id="{{ $block->id }}">
                                        <x-admin::comment-block :object="$block" page-id="{{ $object->id }}" :isDeletable=true
                                            id="comment-upload" />
                                    </x-admin::accordion-item>
                                @break

                                @case(4)
                                    <x-admin::accordion-item header="Блок с сотрудниками" id="people-block" block-type-id="4"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}" :isDeletable=true>
                                        <x-admin::people-block :object="$personal" block-id="{{ $block->id }}" :selected-object="$block->has('personal')->get()"
                                            id="personal_block" page-id="{{ $object->id }}" block-type-id="4" />
                                    </x-admin::accordion-item>
                                @break

                                @case(5)
                                    <x-admin::accordion-item header="Блок с прикрепленными файлами" isDeletable="true" block-type-id="5"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}" style="display: none;">
                                        <x-admin::files-block :object=$block page-id="{{ $object->id }}" id="files" />
                                    </x-admin::accordion-item>
                                @break

                                @case(6)
                                    <x-admin::accordion-item header="Блок с изображением" isDeletable="true" block-type-id="6"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}" style="display: none;">
                                        <x-admin::image-block :object=$block page-id="{{ $object->id }}"
                                            block-id="{{ $block->id }}" id="image-main-block-uploader" />
                                    </x-admin::accordion-item>
                                @break

                                @case(7)
                                    <x-admin::accordion-item header="Блок с меню" block-type-id="7" page-id="{{ $object->id }}"
                                        block-id="{{ $block->id }}" :isDeletable=true>
                                        <x-admin::menu-block page-id="{{ $object->id }}" block-id="{{ $block->id }}"
                                            :object="$block" />
                                    </x-admin::accordion-item>
                                @break

                                @case(8)
                                    <x-admin::accordion-item header="Блок с прикрепленными изображениями" isDeletable="true"
                                        block-type-id="8" block-id="{{ $block->id }}" page-id="{{ $object->id }}"
                                        style="display: none;">
                                        <x-admin::files-block :object=$block page-id="{{ $object->id }}" id="files" />
                                    </x-admin::accordion-item>
                                @break

                                @case(9)
                                    <x-admin::accordion-item header="Блок с описанием и рамкой" block-type-id="9"
                                        page-id="{{ $object->id }}" block-id="{{ $block->id }}" :isDeletable=true>
                                        <x-admin::description-block page-id="{{ $object->id }}" :object="$block" :isDeletable=true
                                            id="text-image-uploader" />
                                    </x-admin::accordion-item>
                                @break
                            @endswitch
                        @endforeach
                    @break

                    @case(6)
                        {{-- Страница о Фармацевтическая разработка --}}
                        @foreach ($object->blocks as $block)
                            @switch($block->block_type_id)
                                @case(1)
                                    <x-admin::accordion-item header="Блок с описанием" block-type-id="1" page-id="{{ $object->id }}"
                                        block-id="{{ $block->id }}" :isDeletable=true>
                                        <x-admin::description-block page-id="{{ $object->id }}" :object="$block" :isDeletable=true
                                            id="text-image-uploader" />
                                    </x-admin::accordion-item>
                                @break

                                @case(2)
                                    <x-admin::accordion-item header="Текстовый блок с изображением" block-type-id="2"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}" :isDeletable=true>
                                        <x-admin::text-image-block page-id="{{ $object->id }}" :isDeletable=true :object="$block"
                                            id="text-image-uploader" />
                                    </x-admin::accordion-item>
                                @break

                                @case(3)
                                    <x-admin::accordion-item header="Блок с комментарием" id="comment-block" block-type-id="3" :width=529
                                        :height=353 page-id="{{ $object->id }}" :isDeletable=true block-id="{{ $block->id }}">
                                        <x-admin::comment-block :object="$block" page-id="{{ $object->id }}" :isDeletable=true
                                            id="comment-upload" />
                                    </x-admin::accordion-item>
                                @break

                                @case(4)
                                    <x-admin::accordion-item header="Блок с сотрудниками" id="people-block" block-type-id="4"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}" :isDeletable=true>
                                        <x-admin::people-block :object="$personal" block-id="{{ $block->id }}" :selected-object="$block->has('personal')->get()"
                                            id="personal_block" page-id="{{ $object->id }}" block-type-id="4" />
                                    </x-admin::accordion-item>
                                @break

                                @case(5)
                                    <x-admin::accordion-item header="Блок с прикрепленными файлами" isDeletable="true" block-type-id="5"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}" style="display: none;">
                                        <x-admin::files-block :object=$block page-id="{{ $object->id }}" id="files" />
                                    </x-admin::accordion-item>
                                @break

                                @case(6)
                                    <x-admin::accordion-item header="Блок с изображением" isDeletable="true" block-type-id="6"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}" style="display: none;">
                                        <x-admin::image-block :object=$block page-id="{{ $object->id }}"
                                            block-id="{{ $block->id }}" id="image-block-uploader" />
                                    </x-admin::accordion-item>
                                @break

                                @case(7)
                                    <x-admin::accordion-item header="Блок с меню" block-type-id="7" page-id="{{ $object->id }}"
                                        block-id="{{ $block->id }}" :isDeletable=true>
                                        <x-admin::menu-block page-id="{{ $object->id }}" block-id="{{ $block->id }}"
                                            :object="$block" />
                                    </x-admin::accordion-item>
                                @break

                                @case(8)
                                    <x-admin::accordion-item header="Блок с прикрепленными изображениями" isDeletable="true"
                                        block-type-id="8" block-id="{{ $block->id }}" page-id="{{ $object->id }}"
                                        style="display: none;">
                                        <x-admin::files-block :object=$block page-id="{{ $object->id }}" id="files" />
                                    </x-admin::accordion-item>
                                @break

                                @case(9)
                                    <x-admin::accordion-item header="Блок с описанием и рамкой" block-type-id="9"
                                        page-id="{{ $object->id }}" block-id="{{ $block->id }}" :isDeletable=true>
                                        <x-admin::description-block page-id="{{ $object->id }}" :object="$block" :isDeletable=true
                                            id="text-image-uploader" />
                                    </x-admin::accordion-item>
                                @break
                            @endswitch
                        @endforeach
                    @break

                    @case(9)
                        @foreach ($object->blocks as $block)
                            @switch($block->block_type_id)
                                @case(1)
                                    <x-admin::accordion-item header="Блок с описанием" block-type-id="1" page-id="{{ $object->id }}"
                                        block-id="{{ $block->id }}" :isDeletable=true>
                                        <x-admin::description-block page-id="{{ $object->id }}" :object="$block" :isDeletable=true
                                            id="text-image-uploader" />
                                    </x-admin::accordion-item>
                                @break

                                @case(5)
                                    <x-admin::accordion-item header="Блок с прикрепленными файлами" isDeletable="true" block-type-id="5"
                                        block-id="{{ $block->id }}" page-id="{{ $object->id }}" style="display: none;">
                                        <x-admin::files-block :object=$block page-id="{{ $object->id }}" id="files" />
                                    </x-admin::accordion-item>
                                @break

                                @case(10)
                                    <x-admin::accordion-item header="Блок с фоновым изображением и текстом" block-type-id="10"
                                        page-id="{{ $object->id }}" block-id="{{ $block->id }}" :isDeletable=true>
                                        <x-admin::background-image-block page-id="{{ $object->id }}" :object="$block"
                                            :isDeletable=true id="text-image-uploader" />
                                    </x-admin::accordion-item>
                                @break
                            @endswitch
                        @endforeach
                    @break


                @break

            @endswitch

        </x-admin::accordion>

        @if (in_array($object->id, [4, 5, 6, 9]))
            <x-admin::button-with-list :object="$blockTypes" />
            <x-admin::sorting-button />
        @endif

        <x-admin::accordion class="template" style="display:none">
            <x-admin::accordion-item header="Блок с описанием" block-type-id="1" page-id="{{ $object->id }}"
                :isDeletable=true>
                <x-admin::description-block page-id="{{ $object->id }}" :isDeletable=true :object=null
                    id="description" />
            </x-admin::accordion-item>

            <x-admin::accordion-item header="Текстовый блок с изображением" block-type-id="2"
                page-id="{{ $object->id }}" :isDeletable=true>
                <x-admin::text-image-block page-id="{{ $object->id }}" :isDeletable=true :object=null
                    id="text-image-uploader" />
            </x-admin::accordion-item>

            <x-admin::accordion-item header="Блок комментариев" id="comment-block" block-type-id="3"
                page-id="{{ $object->id }}" :isDeletable=true>
                <x-admin::comment-block :object=null page-id="{{ $object->id }}" :isDeletable=true
                    id="comment-upload" />
            </x-admin::accordion-item>

            <x-admin::accordion-item header="Блок с сотрудниками" id="people-block" block-type-id="4"
                page-id="{{ $object->id }}" :isDeletable=true>
                <x-admin::people-block :object="$personal" id="personal_block" page-id="{{ $object->id }}"
                    block-type-id="4" />
            </x-admin::accordion-item>

            <x-admin::accordion-item header="Блок с изображением" isDeletable="true" block-type-id="6"
                page-id="{{ $object->id }}" style="display: none;">
                <x-admin::image-block :object=null page-id="{{ $object->id }}" id="image-block-uploader" />
            </x-admin::accordion-item>

            <x-admin::accordion-item header="Блок с прикрепленными файлами" isDeletable="true" block-type-id="5"
                page-id="{{ $object->id }}" style="display: none;">
                <x-admin::files-block :object=null page-id="{{ $object->id }}" id="files" />
            </x-admin::accordion-item>

            <x-admin::accordion-item header="Блок с меню" block-type-id="7" page-id="{{ $object->id }}"
                :isDeletable=true>
                <x-admin::menu-block page-id="{{ $object->id }}" :object=null />
            </x-admin::accordion-item>

            <x-admin::accordion-item header="Блок с прикрепленными изображениями" block-type-id="8"
                page-id="{{ $object->id }}" :isDeletable=true>
                <x-admin::files-block page-id="{{ $object->id }}" accept="image/*" id="files" :object=null />
            </x-admin::accordion-item>

            <x-admin::accordion-item header="Блок с описанием и рамкой" block-type-id="9"
                page-id="{{ $object->id }}" :isDeletable=true>
                <x-admin::description-block page-id="{{ $object->id }}" :isDeletable=true :object=null
                    id="description" />
            </x-admin::accordion-item>

            <x-admin::accordion-item header="Блок с фоновым изображением с текстом" block-type-id="10"
                page-id="{{ $object->id }}" :isDeletable=true>
                <x-admin::background-image-block page-id="{{ $object->id }}" :isDeletable=true :object=null
                    id="background-image" />
            </x-admin::accordion-item>

        </x-admin::accordion>

        @include('admin.includes.submit')
    </form>

</div>
@endsection
