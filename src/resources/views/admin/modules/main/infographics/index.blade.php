@extends('admin.app')
@section('content')
    <h1>{{ $title[0] }}</h1>

    @include('admin.includes.search', ['search_label' => 'Введите текст'])
    @include('admin.includes.add')

    @if ($objects)
        @include('admin.includes.sortable.info')
        <div class="sortable_list">
            <div
                style="
            display: flex; 
            column-gap: 10px;
            padding: 14px 30px; 
            background-color:#212121;
            color: #ffffff">
                <p style="flex-basis: 10%;">№</p>
                <p style="flex-basis: 20%;">Изображение</p>
                <p style="flex-basis: 50%;">Текст</p>
                <p style="flex-basis: 20%;"></p>
            </div>
            @foreach ($objects as $object)
                <div class="list_item" style="column-gap: 10px">
                    <div class="list_item-info" style="flex-basis: 10%">
                        <h4> {{ $object->id }}</h4>
                    </div>
                    <div style="flex-basis: 20%; background-color: #fe8934; justify-content: center;"
                        class="list_item-actions">
                        <img src="{{ asset('media/' . $object->image_path) }}" alt="">
                    </div>
                    <div style="flex-basis: 50%;"> {!! $object->title !!}</div>
                    <div style="flex-basis: 20%;" class="list_item-actions">
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
