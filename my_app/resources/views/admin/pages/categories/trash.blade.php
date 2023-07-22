@extends('admin.master')

@section('title')
{{ __('Category').' | '.__('Trash') }}
@endsection

@section('content')
{{ Breadcrumbs::render('categories.trash') }}

<section class="content">
    <div class="container-fluid">
        @include('admin.layouts.success')
        @include('admin.layouts.error')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Categories') }}</h3>
                    </div>

                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dtr-inline"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __("Category's name") }}</th>
                                                <th>{{ __('Path') }}</th>
                                                <th>{{ __('Category') }}</th>
                                                <th>{{ __('Deleted time') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!blank($categories))
                                                @foreach ($categories as $category)
                                                    <tr>
                                                        <td>{{ $category->id }}</td>
                                                        <td>{{ $category->name }}</td>
                                                        <td>
                                                            <p class="text-info">{{ '/'.$category->slug }}</p>
                                                        </td>
                                                        <td>
                                                            <span class="right badge badge-info">{{ $category->rootCategory?->name }}</span>
                                                        </td>
                                                        <td>
                                                            <p class="text-success">{{ $category->deleted_at }}</p>
                                                        </td>
                                                        <td>
                                                            @include('admin.components.action-trash', [
                                                                'restoreUrl' => route('admin.categories.restore', $category->id),
                                                                'clearUrl' => route('admin.categories.clear', $category->id)
                                                            ])
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {!! $categories->links('admin.components.pagination') !!}
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
