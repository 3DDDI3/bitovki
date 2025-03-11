<x-Admin.NavBar title="Основное" url="main" all="{{ isset($all) && $all }}">
    @include('admin.includes.menu.item', [
        'route' => 'admin.main.pages.index',
        'name' => 'Страницы',
        'data' => 'pages',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.main.catalog.index',
        'name' => 'Каталог',
        'data' => 'catalog',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.main.informations.index',
        'name' => 'Покупка',
        'data' => 'informations',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.main.qa.index',
        'name' => 'QA',
        'data' => 'qa',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.main.variants.index',
        'name' => 'Варианты',
        'data' => 'variants',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.main.our-works.index',
        'name' => 'Наши работы',
        'data' => 'our-works',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.main.reviews.index',
        'name' => 'Отзывы',
        'data' => 'reviews',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.main.additional-options.index',
        'name' => 'Дополнительные услуги',
        'data' => 'additional-options',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.main.infographics.index',
        'name' => 'Инфографика',
        'data' => 'infographics',
    ])
</x-Admin.NavBar>

<x-Admin.NavBar title="Служебное" url="services" all="{{ isset($all) && $all }}">
    @include('admin.includes.menu.item', [
        'route' => 'admin.services.feedback.index',
        'name' => 'Обратная связь',
        'data' => 'feedback',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.services.users.index',
        'name' => 'Пользователи',
        'data' => 'users',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.services.settings.index',
        'name' => 'Настройки',
        'data' => 'settings',
    ])
</x-Admin.NavBar>
