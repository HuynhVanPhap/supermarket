@php
    $name = $name ?? null;
    $checked = $checked ?? false;
    $data = $data ?? null;
    $classes = $classes ?? [];
@endphp

<div class="form-group">
    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
    <input
        type="checkbox"
        name="{{ $name }}"
        id="customSwitch{{$data}}"
        {{ ($checked) ? 'checked' : '' }}
        {{ !empty($data) ? "data-id-value=".$data : '' }}
        class="custom-control-input @error($name) is-invalid @enderror @foreach ($classes as $item)
            {{ $item }}
        @endforeach"
    >
    <label class="custom-control-label" for="customSwitch{{$data}}"></label>

    @error($name)
        <div class="error invalid-feedback" style="display: inline;">{{ $errors->first($name) }}</div>
    @enderror
</div>
