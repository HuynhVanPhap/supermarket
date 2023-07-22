@extends('admin.master')

@section('title')
{{ __('Root Category').' | '.__('List') }}
@endsection

@section('content')
{{ Breadcrumbs::render('root-categories.index') }}

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
                            action="{{ route('admin.root-categories.index') }}"
                        >
                            <div class="row">
                                <div class="col-md-6">
                                    @include('admin.components.form.input', [
                                        'label' => __("Category's name"),
                                        'placeholder' => __("Category's name"),
                                        'name' => 'filterName'
                                    ])
                                </div>

                                <div class="col-md-6">
                                    @include('admin.components.form.selected', [
                                        'label' => __("Display"),
                                        'name' => 'filterDisplay',
                                        'data' => array_flip(config('constraint.display'))
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
                        <h3 class="card-title">{{ __('Root Categories') }}</h3>
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
                                                <th>{{ __("Category's name") }}</th>
                                                <th>{{ __('Path') }}</th>
                                                <th>{{ __('Display') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!blank($rootCategories))
                                                @foreach ($rootCategories as $key => $category)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $category->name }}</td>
                                                        <td>
                                                            <p class="text-info">{{ '/'.$category->slug }}</p>
                                                        </td>
                                                        <td>
                                                            @include('admin.components.form.switch', [
                                                                'name' => 'display_status',
                                                                'classes' => ['display-status-root-category'],
                                                                'data' => $category->id,
                                                                'checked' => $category->display_status
                                                            ])
                                                        </td>
                                                        <td>
                                                            @include('admin.components.action', [
                                                                'editUrl' => route('admin.root-categories.edit', $category->id),
                                                                'removeUrl' => route('admin.root-categories.destroy', $category->id)
                                                            ])
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {!! $rootCategories->appends(Request::all())->links('admin.components.pagination') !!}
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

@section('script')

@endsection
