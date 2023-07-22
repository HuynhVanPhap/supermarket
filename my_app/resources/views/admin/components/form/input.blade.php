@php
    $label = $label ?? null;
    $required = $required ?? false;
    $type = $type ?? 'text';
    $placeholder = $placeholder ?? null;
    $name = $name ?? null;
    $defaultValue = $defaultValue ?? null;
    $append = $append ?? null;
@endphp

<div class="form-group">
    <label for="exampleInputEmail1">{{ $label }}</label>

    @if ($required)
        <span class="right badge badge-danger">{{ __('Required') }}</span>
    @endif

    <div class="input-group">
        <input
            type="{{ in_array($type, config('constraint.type')) ? $type : 'text' }}"
            class="form-control @error($name) is-invalid @enderror"
            id="exampleInputEmail1"
            placeholder="{{ $placeholder }}"
            name="{{ $name }}"
            value="{{ old($name, $defaultValue) }}"
        >

        @isset($append)
            <div class="input-group-append">
                <span class="input-group-text">{{ $append }}</span>
            </div>
        @endisset
    </div>

    @error($name)
        <div class="error invalid-feedback" style="display: inline;">{{ $errors->first($name) }}</div>
    @enderror
</div>
