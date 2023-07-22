@php
    $label = $label ?? '';
    $required = $required ?? false;
    $disabled = $disabled ?? false;
    $data = $data ?? []; // [ key => value ]
    $name = $name ?? '';
    $defaultValue = $defaultValue ?? '';
    $default = $default ?? true;
    $id = $id ?? '';
    $class = $class ?? '';
    $multiple = ($multiple) ?? false;
@endphp

<div class="form-group">
    <label>{{ $label }}</label>
    @if ($required)
        <span class="right badge badge-danger">{{ __('Required') }}</span>
    @endif
    <select
        id="{{ $id }}"
        {{ ($required) ? 'required' : '' }}
        {{ ($multiple) ? 'multiple' : '' }}
        class="{{ $class }} form-control select2 @error($name) is-invalid @enderror"
        name="{{ $name }}"
        @if($disabled)
            {{'disabled'}}
        @endif
        style="width: 100%;"
    >
        @if(isset($data))
            @if($default)
            <option value="">
                {{ __("Select your's option") }}
            </option>
            @endif

            @foreach($data as $value => $item)
                <option value="{{ $value }}" {{ (old($name, $defaultValue) == $value) ? 'selected' : '' }}>
                    {{ __(ucwords($item)) }}
                </option>
            @endforeach
        @else
            <option value="">
                {{ __("Select your's option") }}
            </option>
        @endif
    </select>

    @error($name)
        <div class="error invalid-feedback" style="display: inline;">{{ $errors->first($name) }}</div>
    @enderror
</div>
