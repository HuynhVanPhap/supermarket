@extends('admin.master')

@section('title')
    {{ __('Product').' | '.__('Create') }}
@endsection

@section('content')
{{ Breadcrumbs::render('products.create') }}

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Product') }}</h3>
                    </div>

                    <div class="card-body">
                        <form
                            method="POST"
                            action="{{ route('admin.products.store') }}"
                            enctype="multipart/form-data"
                        >

                            @csrf

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        @include('admin.components.form.input', [
                                            'label' => __("Product's name"),
                                            'placeholder' => __("Product's name"),
                                            'name' => 'name',
                                            'required' => true
                                        ])
                                    </div>

                                    <div class="col-md-6">
                                        @include('admin.components.form.selected', [
                                            'label' => __("Product"),
                                            'name' => 'category_id',
                                            'data' => Arr::pluck($categories, 'name', 'id'),
                                            'required' => true
                                        ])
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        @include('admin.components.form.file', [
                                            'label' => __("Product's image"),
                                            'name' => 'image',
                                            'required' => true
                                        ])
                                    </div>

                                    <div class="col-md-6">
                                        @include('admin.components.form.input', [
                                            'label' => __("Price"),
                                            'name' => 'price',
                                            'placeholder' => __("Price"),
                                            'required' => true,
                                            'append' => 'VNĐ',
                                            'defaultValue' => 0
                                        ])
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        @include('admin.components.form.input', [
                                            'label' => __("Stock"),
                                            'placeholder' => __("Stock"),
                                            'name' => 'stock',
                                            'required' => true,
                                            'defaultValue' => 0
                                        ])
                                    </div>

                                    <div class="col-md-6">
                                        @include('admin.components.form.input', [
                                            'label' => __("Discount Percent"),
                                            'placeholder' => __("Discount Percent"),
                                            'name' => 'discount_percent',
                                            'append' => '%',
                                            'defaultValue' => 0
                                        ])
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        @include('admin.components.form.editor', [
                                            'label' => __("Description", ['name' => __("Product")]),
                                            'name' => 'description'
                                        ])
                                    </div>
                                </div>
                            </div>

                            @include('admin.components.form-footer', [
                                'backUrl' => route('admin.products.index')
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="card-title">{{ __('Upload products') }}</h3>
                            </div>

                            <div class="col-sm-6">
                                <div class="btn-group float-right">
                                    <button type="button" class="btn btn-danger">{{ __('Download form') }}</button>
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu" style="">
                                        {{-- <a class="dropdown-item" href="#">Excel</a> --}}
                                        <a class="dropdown-item download-form" href="#"><span class="text-danger">Excel</span></a>
                                    </div>
                                </div>

                                @if (Auth::user()->role->value === config('constraint.roles.super'))
                                    <div class="btn-group float-right mr-1">
                                        <button type="button" class="btn btn-warning">{{ __('Create form') }}</button>
                                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu" style="">
                                            {{-- <a class="dropdown-item" href="#">Excel</a> --}}
                                            <a class="dropdown-item create-form" href="#"><span class="text-danger">Excel</span></a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    @include('admin.components.form.upload', [
                        'route' => route('admin.products.import')
                    ])
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@if(session()->has('success'))
    <script>toastr.success("{{session()->get('success')}}");</script>
@endif
@if(session()->has('error'))
    <script>toastr.error("{{session()->get('error')}}");</script>
@endif

@endsection

@section('script')
    @include('admin.scripts.upload')
@endsection
