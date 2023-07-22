<div class="tab-pane" id="updation">
    <form class="form-horizontal" action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method("PUT")

        <div class="form-group row">
            <div class="col-sm-12">
                @include('admin.components.form.input', [
                    'label' => __("Email"),
                    'placeholder' => __("Email"),
                    'name' => 'email',
                    'defaultValue' => $user->email,
                    'required' => true
                ])
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                @include('admin.components.form.input', [
                    'label' => __("Phone"),
                    'placeholder' => __("Phone"),
                    'name' => 'phone',
                    'defaultValue' => $user->phone,
                    'required' => true
                ])
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                @include('admin.components.form.input', [
                    'label' => __("Address"),
                    'placeholder' => __("Address"),
                    'name' => 'address',
                    'defaultValue' => $user->address,
                    'required' => true
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
