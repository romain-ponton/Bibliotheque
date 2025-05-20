@php
    $name ??= '';
    $type ??= 'text';
    $value ??= '';
    $label ??= '';
    $required ??= true;

@endphp


<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    @if ($type == 'textarea')
        <textarea name="{{ $name }}" id="{{ $name }}" rows="10" class="form-control @error($name) is-invalid @enderror"
            required>{{ $value }}</textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            class="form-control @error($name) is-invalid @enderror" value="{{ $value }}" {{ $required ? 'required' : '' }}>
    @endif


</div>

@error($name)
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
