@extends('admin.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">
        @include('admin.includes.back')

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            <input type="hidden" name="object_id" value="{{ $object?->id }}">
            @csrf
            <x-admin::accordion class="accordion">
                <x-admin::accordion-item header="Блок 1">

                    @include('admin.includes.input', [
                        'label' => 'Заголовок:',
                        'name' => 'block_1_title',
                        'value' => $object->block_1_title ?? '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Подзаголовок:',
                        'name' => 'block_1_subtitle',
                        'value' => $object->block_1_subtitle ?? '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Текст над ценой:',
                        'name' => 'block_1_price_title',
                        'value' => $object->block_1_price_title ?? '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Цена:',
                        'name' => 'block_1_price_value',
                        'value' => number_format($object->block_1_price_value, 2, '.', ' ') ?? '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Текст под ценой:',
                        'name' => 'block_1_price_subtitle',
                        'value' => $object->block_1_price_subtitle ?? '',
                    ])

                    <x-admin::uploader id="block_1_image" image-id="{{ $object->id }}" header="Размер картинки 995x850"
                        {{-- :width=248  :height=365  --}} :isMultiple=false :block-type-id=null :isHidden=true :isDeletable=true
                        :isSingle=true :page-id=null path="block_1_image_path" pathName="block_1_image_name"
                        accept="image/*" :object="$object" />

                </x-admin::accordion-item>

                <x-admin::accordion-item header="Блок 2">
                    @include('admin.includes.textbox', [
                        'label' => 'Заголовок:',
                        'name' => 'block_2_title',
                        'value' => $object->block_2_title ?? '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Подзаголовок:',
                        'name' => 'block_2_subtitle',
                        'value' => $object->block_2_subtitle ?? '',
                    ])

                    @include('admin.includes.textbox', [
                        'label' => 'Текст слева:',
                        'name' => 'block_2_text1',
                        'value' => $object->block_2_text1 ?? '',
                    ])

                    @include('admin.includes.textbox', [
                        'label' => 'Текст справа:',
                        'name' => 'block_2_text2',
                        'value' => $object->block_2_text2 ?? '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Подпись к изображению:',
                        'name' => 'block_2_image_description',
                        'value' => $object->block_2_image_description ?? '',
                    ])

                    <x-admin::uploader id="block_2_image" image-id="{{ $object->id }}" {{-- :width=248  :height=365  --}}
                        header="Размер картинки 810x562" :isMultiple=false :block-type-id=null :isHidden=true
                        :isDeletable=true :isSingle=true :page-id=null path="block_2_image_path"
                        pathName="block_2_image_name" accept="image/*" :object="$object" />
                </x-admin::accordion-item>

                <x-admin::accordion-item header="Блок 3">
                    @include('admin.includes.textbox', [
                        'label' => 'Заголовок 1:',
                        'name' => 'block_3_title',
                        'value' => $object->block_3_title ?? '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Подзаголовок 1:',
                        'name' => 'block_3_subtitle',
                        'value' => $object->block_3_subtitle ?? '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Надпись над ценой 1:',
                        'name' => 'block_3_economy_title',
                        'value' => $object->block_3_economy_title ?? '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Цена 1:',
                        'name' => 'block_3_economy_value',
                        'value' => $object->block_3_economy_value ?? '',
                    ])

                    <x-admin::uploader id="block_3_image1" image-id="{{ $object->id }}" {{-- :width=248  :height=365  --}}
                        header="Размер картинки 1280x960" :isMultiple=false :block-type-id=null :isHidden=true
                        :isDeletable=true :isSingle=true :page-id=null path="block_3_image_path"
                        pathName="block_3_image_name" accept="image/*" :object="$object" />

                    @include('admin.includes.textbox', [
                        'label' => 'Текст 1:',
                        'name' => 'block_3_text',
                        'value' => $object->block_3_text ?? '',
                    ])

                    @include('admin.includes.textbox', [
                        'label' => 'Заголовок 2:',
                        'name' => 'block_3_1_title',
                        'value' => $object->block_3_1_title ?? '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Подзаголовок 2:',
                        'name' => 'block_3_1_subtitle',
                        'value' => $object->block_3_1_subtitle ?? '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Надпись над ценой 2:',
                        'name' => 'block_3_1_economy_title:',
                        'value' => $object->block_3_1_economy_title ?? '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Цена 2:',
                        'name' => 'block_3_1_economy_value',
                        'value' => $object->block_3_1_economy_value ?? '',
                    ])

                    <x-admin::uploader id="block_3_image2" image-id="{{ $object->id }}" {{-- :width=248 header="Размер картинки 248x365" :height=365  --}}
                        header="Размер картинки 1280x960" :isMultiple=false :block-type-id=null :isHidden=true
                        :isDeletable=true :isSingle=true :page-id=null path="block_3_1_image_path"
                        pathName="block_3_1_image_name" accept="image/*" :object="$object" />

                    @include('admin.includes.textbox', [
                        'label' => 'Текст 2:',
                        'name' => 'block_3_1_text',
                        'value' => $object->block_3_1_text ?? '',
                    ])
                </x-admin::accordion-item>

                <x-admin::accordion-item header="Блок 4">
                    @include('admin.includes.textbox', [
                        'label' => 'Заголовок:',
                        'name' => 'block_4_title',
                        'value' => $object->block_4_title ?? '',
                    ])

                    @include('admin.includes.textbox', [
                        'label' => 'Текст:',
                        'name' => 'block_4_text',
                        'value' => $object->block_4_text ?? '',
                    ])

                    <x-admin::uploader id="block_4_image1" image-id="{{ $object->id }}" {{-- :width=248 header="Размер картинки 248x365" :height=365  --}}
                        header="Размер картинки 570x450" :isMultiple=false :block-type-id=null :isHidden=true
                        :isDeletable=true :isSingle=true :page-id=null path="block_4_image1_path"
                        pathName="block_4_image1_name" accept="image/*" :object="$object" />

                    @include('admin.includes.input', [
                        'label' => 'Надпись под изображением 1:',
                        'name' => 'block_4_image1_description',
                        'value' => $object->block_4_image1_description ?? '',
                    ])
                    <x-admin::uploader id="block_4_image2" image-id="{{ $object->id }}" {{-- :width=248 header="Размер картинки 248x365" :height=365  --}}
                        header="Размер картинки 570x450" :isMultiple=false :block-type-id=null :isHidden=true
                        :isDeletable=true :isSingle=true :page-id=null path="block_4_image2_path"
                        pathName="block_4_image2_name" accept="image/*" :object="$object" />

                    @include('admin.includes.input', [
                        'label' => 'Надпись под изображением 2:',
                        'name' => 'block_4_image2_description',
                        'value' => $object->block_4_image2_description ?? '',
                    ])
                </x-admin::accordion-item>
            </x-admin::accordion>

            @include('admin.includes.submit')
        </form>
    </div>
@endsection
