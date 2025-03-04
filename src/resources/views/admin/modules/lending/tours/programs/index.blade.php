@extends('admin.app')
@section('content')
    <h1>{{ $title[0] }}</h1>

    @if ($tours->count() > 0)
        @include('admin.includes.select', [
            'label' => 'Тур',
            'name' => 'infografika_tour',
            'select' => $tours->all(),
            'select_head' => $selectedTour,
        ])
    @endif

    {{-- @include('admin.includes.search') --}}
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
                <p style="flex-basis: 50%;">Название</p>
            </div>
            @foreach ($objects as $object)
                <div class="list_item">
                    <div class="list_item-info" style="column-gap: 30px">
                        {{-- <h4>{{ $object->id }}</h4> --}}
                        {{ $object->title }}
                        @if ($object->image)
                            @include('admin.includes.image', ['path' => '/storage/' . $object->image])
                        @endif
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
