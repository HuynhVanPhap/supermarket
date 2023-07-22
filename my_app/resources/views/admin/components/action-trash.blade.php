@php
    $restoreUrl = $restoreUrl ?? null;
    $clearUrl = $clearUrl ?? null;
@endphp

<div class="btn-group" role="group" aria-label="Basic example">
    <a
        href="{{ $restoreUrl }}"
        class="btn btn-secondary mr-1 btn-restore"
        data-toggle="modal"
        data-target="#modal-default"
    >
        <i class="fas fa-trash-restore"></i>
    </a>
    <form
        class="destroy-form"
        action="{{ $clearUrl }}"
        method="POST"
    >
        @csrf

        <button
            type="submit"
            class="btn btn-dark btn-destroy"
            data-toggle="modal"
            data-target="#modal-default"
        >
            <i class="far fa-trash-alt"></i>
        </button>
    </form>
</div>
