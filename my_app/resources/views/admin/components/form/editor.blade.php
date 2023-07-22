@php
    $label = $label ?? '';
    $required = $required ?? false;
    $name = $name ?? 'wysiwyg-editor';
    $defaultValue = $defaultValue ?? '';
@endphp

<label for="exampleInputEmail1">{{ $label }}</label>
@if ($required)
    <span class="right badge badge-danger">{{ __('Required') }}</span>
@endif

<div class="form-group">
    <textarea
        class="ckeditor form-control"
        name="{{ $name }}"

    >
    {{ old($name, $defaultValue) }}
    </textarea>
</div>
