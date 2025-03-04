@extends('admin.app')
@section('content')
    <h1>Заявки</h1>

    <div class="filter" style="margin-bottom: 30px;">

        <h2>Фильтр</h2>
        <form method="get" class="filter_form">
            <span>Название:</span>
            <input type="text" name="search" placeholder="Введите ФИО или название препарата"
                value="{{ $_GET['search'] ?? '' }}">
            <button type="submit" class="blue_btn">Поиск</button>
        </form>

    </div>

    <table class="request-table table_dark">

        <thead>
            <tr>
                <th>№</th>
                <th>Дата:</th>
                <th>Пол:</th>
                <th>Возраст ребенка:</th>
                <th>Срок беременности:</th>
                <th>Информация о подозреваемом препарате:</th>
                <th>Информация об отправителе:</th>
                <th></th>
            </tr>
        </thead>

        <tbody>

            @foreach ($objects as $object)
                <tr>
                    <td style="vertical-align: baseline">{{ $object->id }}</td>
                    <td style="vertical-align: baseline">{{ $object->created_at->format('d.m.Y H:i') }}</td>
                    <td style="vertical-align: baseline">{{ $object->gender->name ?? '' }}</td>
                    <td style="vertical-align: baseline">{{ $object->age ?? '' }}</td>
                    <td style="vertical-align: baseline">{{ $object->pregnancy_duration }}</td>
                    <td>
                        <b>Название лекарственного препарата:</b> {{ $object->medication ?? '' }}<br>
                        <b>Серия:</b> {{ $object->series }}<br>
                        <b>Режим дозирования:</b> {{ $object->dosing }} <br>
                        <b>Показания к применению:</b> {{ $object->indication }} <br>
                        <b>Период лечения:</b> с {{ $object->treatment_beginning }} по {{ $object->treatment_ending }}
                        <br>
                        <b>Период нежелательной реакции:</b> с {{ $object->reaction_beginning }} по <br>
                        {{ $object->reaction_ending }} <br>
                        <b>Описание реакции:</b> {{ $object->reaction_description }} <br>
                        <b>Действия для купирования реакции:</b> {{ $object->actions }} <br>
                        <b>Лекарственная/немедикаментозная терапия:</b> {{ $object->therapy }} <br>
                        <b>Другие лекарственные препараты:</b> {{ $object->other_medication }} <br>
                        <b>Другие данные анамнеза:</b> {{ $object->other }} <br>
                    </td>
                    <td style="vertical-align: baseline">
                        <b>Тип отправителя:</b> {{ $object->senders->name ?? '' }} <br>
                        <b>ФИО:</b> {{ $object->sender }} <br>
                        <b>Способ связи:</b> {{ $object->communication_method }} <br>
                    </td>
                    <td style="vertical-align: baseline"><a href="?delete={{ $object->id }}" class="admin_delete"
                            title="Удалить"></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $objects->onEachSide(1)->links() }}
    <button name="exportPharmacovigilanceToExcel" style="margin-top: 2rem;" class="blue_btn">Выгрузка в Excel</button>
@endsection
