@extends('admin.master')

@section('title')
    {{ __('Root Category').' | '.__('Edit') }}
@endsection

@section('content')
{{ Breadcrumbs::render('root-categories.edit', $rootCategory) }}

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
                            action="{{ route('admin.root-categories.update', $rootCategory->id) }}"
                        >

                            @csrf
                            @method("PUT")

                            <div class="card-body">
                                <div class="row">
                                    @include('admin.components.form.input', [
                                        'label' => __("Category's name"),
                                        'placeholder' => __("Category's name"),
                                        'name' => 'name',
                                        'defaultValue' => $rootCategory->name
                                    ])
                                </div>
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
