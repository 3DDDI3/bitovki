@extends('admin.app')
@section('content')
    <h1>Настройки</h1>
    <div class='admin_edit_block'>

        <form method="post" class="admin_edit-form" enctype="multipart/form-data">
            @csrf

            <style>
                .social-networks {
                    display: flex;
                    column-gap: 50px;
                    flex-direction: column;

                    .social-network__row {
                        display: flex;
                        flex-direction: column;
                    }

                    .social-network {
                        display: flex;
                        align-items: center;
                        column-gap: 50px;
                    }

                    .social-network__delete {
                        flex-shrink: 0;
                        width: 30px;
                        height: 30px;
                    }
                }
            </style>
            <x-admin::accordion class="accordion">
                <x-admin::accordion-item header="Медиа">
                    <div class="social-networks">
                        <div class="social-network" style="display: none;">
                            <div class="social-network__row">
                                <x-admin::uploader id="url" :isMultiple=false image-id="null" accept="image/*"
                                    header="Размер иконки 16х16" path="path" path-name="name" :$object :isHidden=true
                                    :isDeletable=true />

                                @include('admin.includes.input', [
                                    'label' => 'Ссылка',
                                    'name' => 'url',
                                    'value' => '',
                                ])
                            </div>
                            <svg class="social-network__delete" data-block-id="34" xmlns="http://www.w3.org/2000/svg"
                                width="16" style="cursor: pointer" height="16" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5">
                                </path>
                            </svg>
                        </div>
                        @foreach ($socialNetworks as $socialNetwork)
                            <div class="social-network">
                                <div class="social-network__row">
                                    <x-admin::uploader id="url_{{ $socialNetwork->id }}" :isMultiple=false
                                        image-id="{{ $socialNetwork->id }}" accept="image/*" header="Размер иконки 16х16"
                                        path="path" path-name="name" :object="$socialNetwork" :isHidden=true
                                        :isDeletable=true />

                                    @include('admin.includes.input', [
                                        'label' => 'Ссылка',
                                        'name' => "url_$socialNetwork->id",
                                        'value' => $socialNetwork->url,
                                    ])
                                </div>
                                <svg class="social-network__delete" data-block-id="{{ $socialNetwork->id }}"
                                    style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5">
                                    </path>
                                </svg>
                            </div>
                        @endforeach
                    </div>

                    <div class='input_block'>
                        <button class="social-network__create">Добавить соц.сеть</button>
                    </div>
                </x-admin::accordion-item>

                <x-admin::accordion-item header="Документы">
                    <x-admin::uploader id="agreement" :isHidden=false path="agreement" :isDeletable=true :isSingle=false
                        :isMultiple=false accept="" :object="$object" header="Пользовательское соглашение" />
                    <x-admin::uploader id="privacy" :isHidden=false path="privacy" :isDeletable=true :isSingle=false
                        :isMultiple=false accept="" :object="$object" header="Политика Конфиденциальности" />
                    <x-admin::uploader id="consent" :isHidden=false path="consent" :isDeletable=true :isSingle=false
                        :isMultiple=false accept="" :object="$object"
                        header="Согласие на обработку персональных данных" />
                </x-admin::accordion-item>
            </x-admin::accordion>


            @include('admin.includes.submit')

        </form>
    </div>
@endsection
