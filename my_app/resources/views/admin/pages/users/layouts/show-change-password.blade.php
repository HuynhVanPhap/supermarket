<div class="tab-pane" id="settings">
    <form class="form-horizontal" action="{{ route('admin.users.change.password', $user->email) }}" method="POST">
        @csrf

        <div class="form-group row">
            <div class="col-sm-12">
                @include('admin.components.form.input', [
                    'label' => __("Password"),
                    'placeholder' => __("Password"),
                    'name' => 'password',
                    'required' => true,
                    'type' => 'password'
                ])
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                @include('admin.components.form.input', [
                    'label' => __("Retype password"),
                    'placeholder' => __("Retype password"),
                    'name' => 'retype_password',
                    'required' => true,
                    'type' => 'password'
                ])
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-danger">{{ __('Update') }}</button>
            </div>
        </div>
    </form>
</div>
