@php
    $backUrl = $backUrl ?? "#";
@endphp

<div class="card-footer">
    <button type="submit" class="btn btn-warning">{{ __('Send') }}</button>
    <a type="button" class="btn btn-default float-right" href="{{ $backUrl }}">{{ __('Back') }}</a>
</div>
