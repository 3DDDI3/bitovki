@extends('admin.app')
@section('content')
    <h1>Заявки</h1>

    <div class="filter" style="margin-bottom: 30px;">

        <h2>Фильтр</h2>
        <form method="get" class="filter_form">
            <span>Название:</span>
            <input type="text" name="search" placeholder="Введите email" value="{{ $_GET['search'] ?? '' }}">
            <button type="submit" class="blue_btn">Поиск</button>
        </form>

    </div>

    <table class="request-table table_dark">

        <thead>
            <tr>
                <th>№</th>
                <th>Email</th>
                <th>Тип пользователя</th>
                <th>Дата:</th>
                <th></th>
            </tr>
        </thead>

        <tbody>

            @foreach ($objects as $object)
                <tr>
                    <td>{{ $object->id }}</td>
                    <td>{{ $object->email }}</td>
                    <td>{{ $object->isAgent == 1 ? 'Агент' : 'Турист' }}</td>
                    <td>{{ $object->created_at }}</td>
                    <td><a href="?delete={{ $object->id }}" class="admin_delete" title="Удалить"></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $objects->onEachSide(1)->links() }}
@endsection
