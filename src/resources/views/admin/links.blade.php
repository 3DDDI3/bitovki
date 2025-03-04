<x-Admin.NavBar title="Основное" url="main" all="{{ isset($all) && $all }}">
    @include('admin.includes.menu.item', [
        'route' => 'admin.main.pages.index',
        'name' => 'страницы',
        'data' => 'pages',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.main.news.index',
        'name' => 'Новости',
        'data' => 'news',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.main.medication.index',
        'name' => 'Препараты',
        'data' => 'medication',
    ])
</x-Admin.NavBar>

<x-Admin.NavBar title="Вспомогательное" url="auxiliary" all="{{ isset($all) && $all }}">
    @include('admin.includes.menu.item', [
        'route' => 'admin.auxiliary.staff.index',
        'name' => 'Сотрудники',
        'data' => 'staff',
    ])
    @include('admin.includes.menu.item', [
        'route' => 'admin.auxiliary.specialties.index',
        'name' => 'Должности',
        'data' => 'specialties',
    ])
    @include('admin.includes.menu.item', [
        'route' => 'admin.auxiliary.medication-types.index',
        'name' => 'Типы препаратов',
        'data' => 'medication-types',
    ])
</x-Admin.NavBar>

<x-Admin.NavBar title="Обратная связь" url="feedback" all="{{ isset($all) && $all }}">
    @include('admin.includes.menu.item', [
        'route' => 'admin.feedback.pharmacovigilance.index',
        'name' => 'Фармаконадзор',
        'data' => 'pharmacovigilance',
    ])
    @include('admin.includes.menu.item', [
        'route' => 'admin.feedback.company.index',
        'name' => 'Анкета по качеству',
        'data' => 'company',
    ])
    @include('admin.includes.menu.item', [
        'route' => 'admin.feedback.contact.index',
        'name' => 'Запрос',
        'data' => 'contact',
    ])
</x-Admin.NavBar>

<x-Admin.NavBar title="Служебное" url="services" all="{{ isset($all) && $all }}">
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
