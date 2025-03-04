@extends('admin.app')
@section('content')
    <h1>Заявки</h1>

    <div class="filter" style="margin-bottom: 30px;">

        <h2>Фильтр</h2>
        <form method="get" class="filter_form">
            <span>Название:</span>
            <input type="text" name="search" placeholder="Введите ФИО или номер телефона"
                value="{{ $_GET['search'] ?? '' }}">
            <button type="submit" class="blue_btn">Поиск</button>
        </form>

    </div>

    <table class="request-table table_dark">

        <thead>
            <tr>
                <th>№</th>
                <th>Имя:</th>
                <th>Телефон:</th>
                <th>Сообщение:</th>
                <th>Дата:</th>
                <th></th>
            </tr>
        </thead>

        <tbody>

            @foreach ($objects as $object)
                <tr>
                    <td>{{ $object->id }}</td>
                    <td>{{ $object->name ?? '' }}</td>
                    <td>{{ $object->phone ?? '' }}</td>
                    <td>{{ $object->text ?? '' }}</td>
                    <td>{{ $object->created_at->format('d.m.Y H:i') ?? '' }}</td>
                    <td><a href="?delete={{ $object->id }}" class="admin_delete" title="Удалить"></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $objects->onEachSide(1)->links() }}

    <button name="exportContactToExcel" style="margin-top: 2rem;" class="blue_btn">Выгрузка в Excel</button>
@endsection
