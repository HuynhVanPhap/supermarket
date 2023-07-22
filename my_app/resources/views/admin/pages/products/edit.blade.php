@extends('admin.master')

@section('title')
    {{ __('Product').' | '.__('Edit') }}
@endsection

@section('content')
{{ Breadcrumbs::render('products.edit', $product) }}

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
                            action="{{ route('admin.products.update', $product->id) }}"
                            enctype="multipart/form-data"
                        >

                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        @include('admin.components.form.input', [
                                            'label' => __("Product's name"),
                                            'placeholder' => __("Product's name"),
                                            'name' => 'name',
                                            'required' => true,
                                            'defaultValue' => $product->name
                                        ])
                                    </div>

                                    <div class="col-md-6">
                                        @include('admin.components.form.selected', [
                                            'label' => __("Product"),
                                            'name' => 'category_id',
                                            'data' => Arr::pluck($categories, 'name', 'id'),
                                            'required' => true,
                                            'defaultValue' => $product->category_id
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
                                            'defaultValue' => $product->price
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
                                            'defaultValue' => $product->stock
                                        ])
                                    </div>

                                    <div class="col-md-6">
                                        @include('admin.components.form.input', [
                                            'label' => __("Discount Percent"),
                                            'placeholder' => __("Discount Percent"),
                                            'name' => 'discount_percent',
                                            'append' => '%',
                                            'defaultValue' => $product->discount_percent
                                        ])
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        @include('admin.components.form.editor', [
                                            'label' => __("Description", ['name' => __("Product")]),
                                            'name' => 'description',
                                            'defaultValue' => $product->description
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
@endsection

@section('script')

@endsection
