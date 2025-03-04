<div class="input_block">
    <span>{{ $label ?? '' }}</span>

    @if (!empty($select))
        <select name='{{ $name ?? '' }}' class='chosen {{ $class ?? '' }}' {{ isset($required) ? 'required' : '' }}>
            @foreach ($select as $option)
                <option value="{{ $option->id }}" {{ $option->name == $select_head ? 'selected' : null }}>
                    {{ $option->name }}</option>
            @endforeach
        </select>
    @endif
</div>
