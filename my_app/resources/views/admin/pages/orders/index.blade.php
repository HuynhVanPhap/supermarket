@extends('admin.master')

@section('title')
    {{ __('Order').' | '.__('List') }}
@endsection

@section('content')
{{ Breadcrumbs::render('orders.index') }}

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Filter') }}</h3>
                    </div>
                    <div class="card-body">
                        <form
                            method="GET"
                            action="{{ route('admin.orders.index') }}"
                        >
                            <div class="row">
                                <div class="col-md-6">
                                    @include('admin.components.form.input', [
                                        'label' => __("Order"),
                                        'placeholder' => __("Search order"),
                                        'name' => 'filterName'
                                    ])
                                </div>

                                <div class="col-md-6">
                                    @include('admin.components.form.selected', [
                                        'label' => __("Display"),
                                        'name' => 'filterStatusOrder',
                                        'data' => array_flip(config('constraint.status.order'))
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

        @include('admin.pages.orders.layouts.table')

        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
