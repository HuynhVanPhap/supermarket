@php
    $route = $route ?? '#';
    $name = $name ?? 'upload';
@endphp

<form action="{{ $route }}" method="POST" enctype="multipart/form-data" id="import-form">
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            @csrf

            @if(session()->has('failures'))
                <ul class="alert alert-danger">
                    @foreach(session()->get('failures') as $error)
                        <li>{{ "[" . "\"".$error->values()[$error->attribute()]."\"" . "] " . $error->errors()[0] }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        @include('admin.components.form.file', [
                            'label' => __("File"),
                            'name' => $name,
                            'required' => true
                        ])
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-info">{{ __('Upload') }}</button>
    </div>
</form>
