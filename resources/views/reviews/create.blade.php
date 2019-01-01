@extends('adminlte::page')

@section('adminlte_custom_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/jquery-confirm.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/create-review-recruit.css') }}">
@stop

@section('adminlte_custom_js')
    <script src="{{ asset('vendor/adminlte/js/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/js/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/js/create-review-recruit.js') }}"></script>
@stop

@section('content')

        <div class="row">

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Create New Review</h3>
                    </div>
                    <div class="box-body">
                        
                        {!! Form::open(['url' => '/reviews', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('reviews.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

@endsection
