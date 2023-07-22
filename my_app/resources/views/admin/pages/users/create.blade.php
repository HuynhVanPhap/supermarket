@extends('admin.master')

@section('title')
{{ __('Create').' | '.config('constraint.brand') }}
@endsection

@section('content')
{{ Breadcrumbs::render('users.create') }}

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('User') }}</h3>
                    </div>

                    <div class="card-body">
                        <form
                            method="POST"
                            action="{{ route('admin.users.store') }}"
                        >

                            @csrf

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        @include('admin.components.form.input', [
                                            'label' => __("User's name"),
                                            'placeholder' => __("User's name"),
                                            'name' => 'name',
                                            'required' => true
                                        ])
                                    </div>

                                    <div class="col-md-6">
                                        @include('admin.components.form.input', [
                                            'label' => __("Email"),
                                            'placeholder' => __("Email"),
                                            'name' => 'email',
                                            'required' => true
                                        ])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        @include('admin.components.form.input', [
                                            'label' => __("Phone"),
                                            'placeholder' => __("Phone"),
                                            'name' => 'phone',
                                            'required' => true
                                        ])
                                    </div>

                                    <div class="col-md-6">
                                        @include('admin.components.form.input', [
                                            'label' => __("Address"),
                                            'placeholder' => __("Address"),
                                            'name' => 'address',
                                            'required' => true
                                        ])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        @include('admin.components.form.input', [
                                            'label' => __("Password"),
                                            'placeholder' => __("Password"),
                                            'name' => 'password',
                                            'required' => true,
                                            'type' => 'password'
                                        ])
                                    </div>

                                    <div class="col-md-6">
                                        @include('admin.components.form.input', [
                                            'label' => __("Retype password"),
                                            'placeholder' => __("Retype password"),
                                            'name' => 'retype_password',
                                            'required' => true,
                                            'type' => 'password'
                                        ])
                                    </div>
                                </div>
                            </div>

                            @include('admin.components.form-footer', [
                                'backUrl' => route('admin.users.index')
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
