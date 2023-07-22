@extends('admin.master')

@section('title')
    {{ __('Category').' | '.__('Create') }}
@endsection

@section('content')
{{ Breadcrumbs::render('categories.create') }}

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Category') }}</h3>
                    </div>

                    <div class="card-body">
                        <form
                            method="POST"
                            action="{{ route('admin.categories.store') }}"
                        >

                            @csrf

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        @include('admin.components.form.input', [
                                            'label' => __("Category's name"),
                                            'placeholder' => __("Category's name"),
                                            'name' => 'name'
                                        ])
                                    </div>

                                    <div class="col-md-6">
                                        @include('admin.components.form.selected', [
                                            'label' => __("Category"),
                                            'name' => 'root_category_id',
                                            'data' => Arr::pluck($rootCategories, 'name', 'id')
                                        ])
                                    </div>
                                </div>
                            </div>

                            @include('admin.components.form-footer', [
                                'backUrl' => route('admin.categories.index')
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
