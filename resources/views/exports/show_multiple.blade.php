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
                    <h3 class="box-title">Export</h3>
                </div>
                <div class="box-body">
                    @include ('exports.form_multiple')
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script>
        function updateAverageScore() {
        	var sum = 0;
	        $('.review-score').each(function() {
	        	sum += $(this).val() | 0;
            });
            var avg = sum / 11;
            $('#review_average_score').val(Math.round(avg * 10) / 10);
        }
        updateAverageScore();
        $('.review-score').change(function() {
	        updateAverageScore();
        });
    </script>
@endpush