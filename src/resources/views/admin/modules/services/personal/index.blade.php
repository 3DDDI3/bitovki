@extends('admin.app')
@section('content')
    <h1>{{ $title[0] }}</h1>

    @include('admin.includes.search')

    @include('admin.includes.add')

    @if ($objects)
        @include('admin.includes.sortable.info')
        <div class="sortable_list">
            <div
                style="
                display: flex; 
                column-gap: 30px; 
                padding: 14px 30px; 
                background-color:#212121;
                color: #ffffff">
                <p style="flex-basis: 50%;">Сотрудник</p>
                <p style="flex-grow: 1">Email</p>
            </div>
            @foreach ($objects as $object)
                <div class="list_item" style="column-gap: 30px">
                    <div class="list_item-info" style="flex-basis: 50%">
                        {{-- <h4>{{ $object->id }}</h4> --}}
                        {{ $object->name }}
                    </div>
                    <div class="list_item-info" style="flex-grow: 1">
                        {{-- <h4>{{ $object->id }}</h4> --}}
                        {{ $object->email }}
                    </div>
                    <div class="list_item-actions">
                        @include('admin.includes.sortable.rating')
                        @include('admin.includes.actions.show')
                        @include('admin.includes.actions.edit')
                        @include('admin.includes.actions.delete')
                        @include('admin.includes.sortable.rating')
                    </div>
                </div>
            @endforeach
        </div>
        {{ $objects->onEachSide(1)->links() }}
    @endif
@endsection
