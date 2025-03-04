<style>
    .menu-block {
        display: flex;
        flex-direction: column;
        row-gap: 20px;
    }

    .block-wrapper {}

    .menu-block__item {
        display: flex;
        column-gap: 20px;
        align-items: flex-end;
    }

    .menu-block__item_hidden {
        display: none;
    }

    .menu-block__actions {
        display: flex;
        align-items: flex-end;

        column-gap: 10px;

        .input_block {
            margin-top: unset;
        }
    }
</style>

<div class="menu-block">
    <div class="block-wrapper">
        <div class="menu-block__item menu-block__item_hidden">
            @include('admin.includes.input', [
                'label' => 'Название:',
                'name' => 'menu_title',
                'value' => $company->okpo ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Ссылка:',
                'name' => 'menu_url',
                'value' => $company->okpo ?? '',
            ])
            <div class='input_block'>
                <button data-block-type-id="7" class="menu-block__delete">Удалить</button>
            </div>
        </div>

        @if (!empty($object->menu))
            @foreach ($object->menu as $menu)
                <div class="menu-block__item">
                    @include('admin.includes.input', [
                        'label' => 'Название:',
                        'name' => "menu_title_$menu->id",
                        'value' => $menu->title ?? '',
                    ])
                    @include('admin.includes.input', [
                        'label' => 'Ссылка:',
                        'name' => "menu_url_$menu->id",
                        'value' => $menu->url ?? '',
                    ])
                    <div class='input_block'>
                        <button data-block-id="{{ $menu->id }}" data-block-type-id="7"
                            class="menu-block__delete">Удалить</button>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
    <div class="menu-block__actions">
        <div class='input_block'>
            <button class="menu-block__create" {{ !empty($pageId) ? "data-page-id=$pageId" : '' }}
                {{ !empty($blockId) ? "data-block-id=$blockId" : '' }} data-block-type-id="7">Добавить пункт</button>
        </div>
    </div>
</div>
