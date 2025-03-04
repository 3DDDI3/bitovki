<div class="input_block">
    @if (!empty($label))
        {{ $label }}
    @endif
    <textarea name="{{ $name ?? '' }}" class="editor" id="editor_{{ $name ?? '' }}">{{ $value ?? '' }}</textarea>
</div>
