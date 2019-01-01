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
                        <h3 class="box-title">Update Review #{{ $review->id }}</h3>
                    </div>

                    <div class="box-body">
                        @can('is_admin')
                            <a href="{{ url('/reviews') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        @endcan
                        @can('is_recruit')
                                <a href="{{ url('/review-recruits') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        @endcan
                        <br />
                        <br />

                        {!! Form::model($review, [
                            'method' => 'PATCH',
                            'url' => ['/reviews', $review->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('reviews.form', ['submitButtonText' => 'Update', 'isUpdate' => true])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

@endsection
