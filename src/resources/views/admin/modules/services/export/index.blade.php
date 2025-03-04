@extends('admin.app')
@section('content')
    <h1>{{ $title[0] }}</h1>

    @include('admin.includes.search')

    <form style="margin: 30px 0" method="get">
        <button class="exportButton" type="submit">Обновить данные</button>
    </form>

    @if ($objects)
        {{-- @include('admin.includes.sortable.info') --}}
        {{-- <div class="sortable_list"> --}}
        <div
            style="
                display: flex; 
                column-gap: 30px; 
                padding: 14px 30px; 
                background-color:#212121;
                color: #ffffff">
            <p style="flex-basis: 10%;">ID</p>
            <p style="flex-grow: 1">Тур</p>
        </div>
        <style>
            .list_item:not(:last-child) {
                border-bottom-color: #E6E6E6;
            }
        </style>
        @foreach ($objects as $object)
            <div class="list_item" style="column-gap: 30px">
                <div class="list_item-info" style="flex-basis: 10%">
                    {{-- <h4>{{ $object->id }}</h4> --}}
                    {{ $object->id }}
                </div>
                <div class="list_item-info" style="flex-grow: 1">
                    {{-- <h4>{{ $object->id }}</h4> --}}
                    {{ $object->name }}
                </div>
                {{-- <div class="list_item-actions">
                        @include('admin.includes.sortable.rating')
                        @include('admin.includes.actions.show')
                        @include('admin.includes.actions.edit')
                        @include('admin.includes.actions.delete')
                        @include('admin.includes.sortable.rating')
                    </div> --}}
            </div>
        @endforeach
        {{-- </div> --}}
        {{ $objects->onEachSide(1)->links() }}
    @endif
@endsection
