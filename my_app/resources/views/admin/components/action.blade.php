@php
    $editUrl = $editUrl ?? null;
    $removeUrl = $removeUrl ?? null;
@endphp

<div class="btn-group" role="group" aria-label="Basic example">
    <a
        href="{{ $editUrl }}"
        class="btn btn-warning mr-1"
    >
        <i class="fas fa-pencil-alt"></i>
    </a>
    <form
        class="delete-form"
        action="{{ $removeUrl }}"
        method="POST"
    >
        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="btn btn-danger btn-remove"
            data-toggle="modal"
            data-target="#modal-default"
        >
            <i class="fas fa-trash"></i>
        </button>
    </form>
</div>
