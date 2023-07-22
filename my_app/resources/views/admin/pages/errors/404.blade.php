@extends('admin.master')

@section('title')
    {{ __('Page not found').' | '.config('constraint.brand') }}
@endsection

@section('content')
<section class="content">
    <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>
        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i>{{ __('Page not found') }}</h3>
        </div>
    </div>
</section>
@endsection
