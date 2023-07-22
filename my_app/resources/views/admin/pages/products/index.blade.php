@extends('admin.master')

@section('title')
{{ __('Product').' | '.__('List') }}
@endsection

@section('content')
{{ Breadcrumbs::render('products.index') }}

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
                            action="{{ route('admin.products.index') }}"
                        >
                            <div class="row">
                                <div class="col-md-4">
                                    @include('admin.components.form.input', [
                                        'label' => __("Product's name"),
                                        'placeholder' => __("Product's name"),
                                        'name' => 'filterName'
                                    ])
                                </div>

                                <div class="col-md-4">
                                    @include('admin.components.form.selected', [
                                        'label' => __("Categories"),
                                        'name' => 'filterCategoryId',
                                        'data' => Arr::pluck($categories, 'name', 'id')
                                    ])
                                </div>

                                <div class="col-md-4">
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
                        <h3 class="card-title">{{ __('Products') }}</h3>
                    </div>

                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            {{-- @include('admin.components.action-index') --}}

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
                                                <th>{{ __('Discount percent') }}</th>
                                                <th>{{ __("Category's name") }}</th>
                                                <th>{{ __('Display') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!blank($products))
                                                @foreach ($products as $key => $product)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
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
                                                            <span class="right badge badge-warning">{{ $product->stock }}</span>
                                                        </td>
                                                        <td>
                                                            <span class="right badge badge-danger">{{ $product->discount_percent }}%</span>
                                                        </td>
                                                        <td>
                                                            <span class="right badge badge-info">{{ $product->category->name }}</span>
                                                        </td>
                                                        <td>
                                                            @include('admin.components.form.switch', [
                                                                'name' => 'display_status',
                                                                'classes' => ['display-status-product'],
                                                                'data' => $product->id,
                                                                'checked' => $product->display_status
                                                            ])
                                                        </td>
                                                        <td>
                                                            @include('admin.components.action', [
                                                                'editUrl' => route('admin.products.edit', $product->id),
                                                                'removeUrl' => route('admin.products.destroy', $product->id)
                                                            ])
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {!! $products->withQueryString()->links('admin.components.pagination') !!}
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@include('admin.components.modals.default', [
    'title' => __('Alert'),
    'content' => __('Are you want continue ?')
])
@endsection

@section('script')

@endsection
