@if(Session::has('success'))
<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">{{ __('Success') }} !</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>

            </div>

            <div class="card-body">
                {{Session::get('success')}}
            </div>

        </div>
    </div>
</div>
@endif
