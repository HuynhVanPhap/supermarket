@extends('admin.master')

@section('title')
{{ __('Product').' | '.__('Trash') }}
@endsection

@section('content')
{{ Breadcrumbs::render('products.trash') }}

<section class="content">
    <div class="container-fluid">
        @include('admin.layouts.success')
        @include('admin.layouts.error')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Products') }}</h3>
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
                                                <th>{{ __("Product's image") }}</th>
                                                <th>{{ __("Product's name") }}</th>
                                                <th>{{ __('Path') }}</th>
                                                <th>{{ __('Stock') }}</th>
                                                <th>{{ __("Category's name") }}
                                                <th>{{ __('Deleted time') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!blank($products))
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td>{{ $product->id }}</td>
                                                        <td>
                                                            <img
                                                                src="{{ asset(config('constraint.link.image.products.avatar').$product->image) }}"
                                                                alt="image"
                                                            >
                                                        </td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>
                                                            <p class="text-info">{{ '/'.$product->slug }}</p>
                                                        </td>
                                                        <td>
                                                            <span class="right badge badge-danger">{{ $product->stock }}</span>
                                                        </td>
                                                        <td>
                                                            <span class="right badge badge-info">{{ $product->category?->name }}</span>
                                                        </td>
                                                        <td>
                                                            <p class="text-success">{{ $product->deleted_at }}</p>
                                                        </td>
                                                        <td>
                                                            @include('admin.components.action-trash', [
                                                                'restoreUrl' => route('admin.products.restore', $product->id),
                                                                'clearUrl' => route('admin.products.clear', $product->id)
                                                            ])
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {!! $products->links('admin.components.pagination') !!}
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
