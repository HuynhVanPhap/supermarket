@extends('admin.master')

@section('title')
{{ __('User Info').' | '.config('constraint.brand') }}
@endsection

@section('content')
{{ Breadcrumbs::render('users.info') }}

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('admin/images/avatar.jpg') }}"
                                alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{ $user->name }}</h3>
                        <p class="text-muted text-center">{{ __($user->role->name) }}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b class="text-danger">{{ __('Order Buyed')}}</b> <a class="float-right">{{ $user->orders->count() }}</a>
                            </li>
                            <li class="list-group-item">
                                <b class="text-gray">{{ __('Pending') }}</b>
                                <a class="float-right">{{ $user->pending_orders_number }}</a>
                            </li>
                            <li class="list-group-item">
                                <b class="text-warning">{{ __('Processing') }}</b>
                                <a class="float-right">{{ $user->processing_orders_number }}</a>
                            </li>
                            <li class="list-group-item">
                                <b class="text-info">{{ __('Shipped') }}</b>
                                <a class="float-right">{{ $user->shipped_orders_number }}</a>
                            </li>
                            <li class="list-group-item">
                                <b class="text-teal">{{ __('Received') }}</b>
                                <a class="float-right">{{ $user->received_orders_number }}</a>
                            </li>
                            <li class="list-group-item">
                                <b class="text-success">{{ __('Paymented') }}</b>
                                <a class="float-right">{{ $user->paymented_orders_number }}</a>
                            </li>
                        </ul>

                        @if (Auth::user()->role->value === config('constraint.roles.super'))
                            <a href="https://www.facebook.com/phap.van.58726823" class="btn btn-primary btn-block" target="_blank"><b>{{ __('Follow') }}</b></a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#information"
                                    data-toggle="tab">{{ __('Information') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#updation" data-toggle="tab">{{ __('Update') }}</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">{{ __('Password') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            @include('admin.pages.users.layouts.show-info')
                            @include('admin.pages.users.layouts.show-update')
                            @include('admin.pages.users.layouts.show-change-password')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    @if(session()->has('success'))
        <script>toastr.success("{{session()->get('success')}}");</script>
    @endif
    @empty(!$errors)
        @foreach ($errors->all() as $message)
            <script>toastr.error("{{$message}}");</script>
        @endforeach
    @endempty
@endsection
