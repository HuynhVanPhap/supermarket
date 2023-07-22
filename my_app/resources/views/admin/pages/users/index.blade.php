@extends('admin.master')

@section('title')
{{ __('User Manager').' | '.__('List') }}
@endsection

@section('content')
{{ Breadcrumbs::render('users.index') }}

<section class="content">
    <div class="container-fluid">
        @include('admin.layouts.success')
        @include('admin.layouts.error')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Filter') }}</h3>
                    </div>
                    <div class="card-body">
                        <form
                            method="GET"
                            action="{{ route('admin.users.index') }}"
                        >
                            <div class="row">
                                <div class="col-md-6">
                                    @include('admin.components.form.input', [
                                        'label' => __("User"),
                                        'placeholder' => __("Search user"),
                                        'name' => 'filterName'
                                    ])
                                </div>

                                <div class="col-md-6">
                                    @include('admin.components.form.selected', [
                                        'label' => __("Level"),
                                        'name' => 'filterRole',
                                        'data' => array_flip(config('constraint.roles'))
                                    ])
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning float-right">{{ __('Search') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('User') }}</h3>
                    </div>

                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __("User") }}</th>
                                                <th>{{ __('Contact address') }}</th>
                                                <th>{{ __('Level') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!blank($users))
                                                @foreach ($users as $key => $user)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td class="more-infor">
                                                            <b>{{ __('Email') }} :</b> {{ $user->email }} <br>
                                                            <b>{{ __('Phone') }} :</b> {{ $user->phone }} <br>
                                                            <b>{{ __('Address') }} :</b> {{ $user->address }} <br>
                                                        </td>
                                                        <td><span class="badge badge-danger">{{ __($user->role->name) }}</span></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-success" data-toggle="dropdown">
                                                                    <i class="fas fa-list-alt"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="{{ route('admin.users.show', $user->email) }}">
                                                                        <p class="text-info">{{ __('User Info') }}</p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {!! $users->appends(Request::all())->links('admin.components.pagination') !!}
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@include('admin.components.modals.default', [
    'title' => __('Alert'),
    'content' => __('This action will affect the associated data. Are you want continue ?')
])
@endsection

