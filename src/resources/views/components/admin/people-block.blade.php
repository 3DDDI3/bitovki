<div class="people-block">
    @php
        if (!empty($selectedObject) && !empty($selectedObject->first())) {
            foreach ($selectedObject->first()->personal as $obj) {
                $selectedPersonal[] = $obj->name;
            }
        }
    @endphp

    <h3>Выберите сотрудника</h3>
    <select class="select" multiple="true" name="{{ $id }}" data-placeholder="Выберите сотрудника"
        {{ !empty($blockId) ? "data-block-id=$blockId" : '' }}
        {{ !empty($blockTypeId) ? "data-block-type-id=$blockTypeId" : '' }}
        {{ !empty($pageId) ? "data-page-id=$pageId" : '' }} style="width:400px;">
        @if (!empty($object))
            @foreach ($object as $obj)
                <option>{{ $obj->name }}</option>
            @endforeach
        @endif
    </select>

    @if (!empty($selectedPersonal))
        <script src='/lib/jquery.min.js'></script>
        <script>
            let selected = @json($selectedPersonal);
            $(".select").val(selected).trigger('change');
        </script>
    @endif
</div>
