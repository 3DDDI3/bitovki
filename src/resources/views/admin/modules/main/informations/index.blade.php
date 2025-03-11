@extends('admin.app')
@section('content')
    <h1>{{ $title[0] }}</h1>

    @include('admin.includes.search', ['search_label' => 'Введите номер или текст'])
    @include('admin.includes.add')

    @if ($objects)
        @include('admin.includes.sortable.info')
        <div class="sortable_list">
            <div
                style="
            display: flex; 
            padding: 14px 30px; 
            background-color:#212121;
            color: #ffffff">
                <p style="flex-basis: 30%;">№</p>
                <p style="flex-basis: 50%;">Текст</p>
                <p style="flex-grow:1;"></p>
            </div>
            @foreach ($objects as $object)
                <div class="list_item">
                    <div class="list_item-info" style="flex-basis: 30%">
                        <h4> {{ $object->number }}</h4>
                    </div>
                    <div style="flex-basis: 50%;"> {!! $object->text !!}</div>
                    <div style="flex-grow:1;" class="list_item-actions">
                        @include('admin.includes.sortable.rating')
                        @include('admin.includes.actions.show')
                        @include('admin.includes.actions.edit')
                        @include('admin.includes.actions.delete')
                        @include('admin.includes.sortable.rating')
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
