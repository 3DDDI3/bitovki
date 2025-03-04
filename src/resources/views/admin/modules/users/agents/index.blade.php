@extends('admin.app')
@section('content')

    <h1>{{ $title[0] }}</h1>

    @include('admin.includes.search', ['search_label' => 'Введите имя'])

    {{-- @include('admin.includes.add') --}}

    {{-- @include('admin.includes.paginate.total') --}}

    @if ($objects)
        <div class="sortable_list_off" style="margin-top: 30px">
            <div
                style="
            display: flex; 
            column-gap: 30px; 
            padding: 14px 30px; 
            background-color:#212121;
            color: #ffffff">
                <p style="flex-basis: 50%;">Имя</p>
                <p style="flex-grow: 1">Email</p>
            </div>
            @foreach ($objects as $object)
                <div class="list_item" style="column-gap: 30px">
                    <div class="list_item-info" style="flex-basis: 50%">
                        <h4>{!! html_entity_decode(!empty($object->name)) ? $object->name : null !!}</h4>
                    </div>
                    <div class="list_item-info" style="flex-grow: 1">
                        <h4>{{ !empty($object->user->email) ? $object->user->email : null }}</h4>
                    </div>
                    <div class="list_item-actions">
                        {{-- @include('admin.includes.actions.open', ['link' => "/pa/$object->url"]) --}}
                        @include('admin.includes.actions.edit')
                        @include('admin.includes.actions.delete')
                    </div>
                </div>
            @endforeach
        </div>
        {{ $objects->onEachSide(1)->links() }}
    @endif

@endsection
