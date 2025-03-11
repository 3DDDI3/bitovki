@extends('admin.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">
        @include('admin.includes.back')

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            <input type="hidden" name="object_id" value="{{ $object?->id }}">
            @csrf

            <x-admin::accordion class="accordion">
                <x-admin::accordion-item header="Основная информация о товаре">
                    <x-admin::uploader id="catalog" image-id="{{ $object->id }}" header="Характеристика"
                        {{-- :width=248 header="Размер картинки 248x365" :height=365  --}} :isMultiple=false :block-type-id=null :isHidden=true :isDeletable=true
                        :isSingle=true :page-id=null path="image_path" pathName="image_name" accept="image/*"
                        :object="$object" />

                    @include('admin.includes.input', [
                        'label' => 'Заголовок:',
                        'name' => 'title',
                        'value' => $object->title ?? '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Подзаголовок:',
                        'name' => 'subtitle',
                        'value' => $object->subtitle ?? '',
                    ])

                    <x-admin::uploader-alt id="{{ !empty($object->id) ? $object->id : 'files' }}" :isHidden=false
                        :isDeletable=false relationship="attachedImages" block-id="item_images" :isSingle=false
                        header="Галерея изображений" :isMultiple=true accept="" {{-- :width=529 :height=353  --}} :$object />
                </x-admin::accordion-item>

                <x-admin::accordion-item header="Характеристики товара">
                    @include('admin.includes.input', [
                        'label' => 'Площадь, м2:',
                        'name' => 'area',
                        'value' => $object->specs->area ?? '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Площадь жилая, м2:',
                        'name' => 'living_area',
                        'value' => $object->specs->living_area ?? '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Площадь застройки, м2:',
                        'name' => 'building_area',
                        'value' => $object->specs->building_area ?? '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Длина, м2:',
                        'name' => 'length',
                        'value' => $object->specs->length ?? '',
                    ])
                </x-admin::accordion-item>

                <x-admin::accordion-item header="Информация о цене и рассрочке">
                    @include('admin.includes.input', [
                        'label' => 'Старая цена:',
                        'name' => 'old_price',
                        'value' => !empty($object->old_price)
                            ? number_format($object->old_price, 2, '.', ' ')
                            : null,
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Новая цена:',
                        'name' => 'new_price',
                        'value' => !empty($object->new_price)
                            ? number_format($object->new_price, 2, '.', ' ')
                            : '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Ежемесячная оплата:',
                        'name' => 'monthly_payment',
                        'value' => !empty($object->monthly_payment)
                            ? number_format($object->monthly_payment, 2, '.', ' ')
                            : '',
                    ])

                    @include('admin.includes.input', [
                        'label' => 'Кол-во месяцев',
                        'name' => 'month_count',
                        'value' => $object->month_count ?? '',
                    ])
                </x-admin::accordion-item>
            </x-admin::accordion>

            @include('admin.includes.submit')
        </form>
    </div>
@endsection
