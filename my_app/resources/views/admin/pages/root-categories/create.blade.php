@extends('admin.master')

@section('title')
    {{ __('Root Category').' | '.__('Create') }}
@endsection

@section('content')
{{ Breadcrumbs::render('root-categories.create') }}

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Root Category') }}</h3>
                    </div>

                    <div class="card-body">
                        <form
                            method="POST"
                            action="{{ route('admin.root-categories.store') }}"
                        >

                            @csrf

                            <div class="card-body">
                                @include('admin.components.form.input', [
                                    'label' => __("Category's name"),
                                    'placeholder' => __("Category's name"),
                                    'name' => 'name'
                                ])
                            </div>

                            @include('admin.components.form-footer', [
                                'backUrl' => route('admin.root-categories.index')
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
