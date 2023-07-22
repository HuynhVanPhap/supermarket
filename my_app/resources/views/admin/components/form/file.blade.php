@php
    $label = $label ?? null;
    $required = $required ?? false;
    $name = $name ?? null;
@endphp

<div class="form-group">
    <label for="exampleInputFile">{{ $label }}</label>
    @if ($required)
        <span class="right badge badge-danger">{{ __('Required') }}</span>
    @endif

    <div class="input-group">
        <div class="custom-file">
            <input
                type="file"
                class="custom-file-input @error($name) is-invalid @enderror"
                id="customFile"
                name="{{ $name }}"
            >
            <label class="custom-file-label" for="customFile">{{ __('Choose file') }}</label>
        </div>
    </div>

    @error($name)
        <div class="error invalid-feedback" style="display: inline;">{{ $errors->first($name) }}</div>
    @enderror
</div>
