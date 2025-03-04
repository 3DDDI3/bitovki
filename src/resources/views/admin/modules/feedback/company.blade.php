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
                <th>Тип:</th>
                <th>ФИО:</th>
                <th>Телефон:</th>
                <th>Адрес:</th>
                <th>Email:</th>
                <th>Сообщение:</th>
                <th>Препарат</th>
                <th>Форма выпуска</th>
                <th>Номер серии</th>
                <th>Дата</th>
                <th></th>
            </tr>
        </thead>

        <tbody>

            @foreach ($objects as $object)
                <tr>
                    <td>{{ $object->id }}</td>
                    <td>{{ $object->senders->name }}</td>
                    <td>{{ $object->fio ?? '' }}</td>
                    <td>{{ $object->phone ?? '' }}</td>
                    <td>{{ $object->address ?? '' }}</td>
                    <td>{{ $object->email ?? '' }}</td>
                    <td>{{ $object->text ?? '' }}</td>
                    <td>{{ $object->mediaction_title ?? '' }}</td>
                    <td>{{ $object->dosing ?? '' }}</td>
                    <td>{{ $object->seria }}</td>
                    <td>{{ $object->created_at->format('d.m.Y H:i') ?? '' }}</td>
                    <td><a href="?delete={{ $object->id }}" class="admin_delete" title="Удалить"></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $objects->onEachSide(1)->links() }}

    <button name="exportCompanyToExcel" style="margin-top: 2rem;" class="blue_btn">Выгрузка в Excel</button>
@endsection
