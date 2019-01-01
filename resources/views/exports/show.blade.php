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
                    @include ('exports.form')
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
		
		$('#add_uniform_comment').click(function(){
			$('#uniform_comment').append('<input type="text" style="border: none;" name="uniform_comments[]">  </br>');
		});
		$('#add_hygience_comment').click(function(){
			$('#hygience_comment').append('<input type="text" style="border: none;" name="hygience_comments[]">  </br>');
		});
		$('#add_respectful_comment').click(function(){
			$('#respectful_comment').append('<input type="text" style="border: none;" name="respectful_comments[]">  </br>');
		});
		$('#add_teamwork_comment').click(function(){
			$('#teamwork_comment').append('<input type="text" style="border: none;" name="teamwork_comments[]">  </br>');
		});
		$('#add_adaptability_comment').click(function(){
			$('#adaptability_comment').append('<input type="text" style="border: none;" name="adaptability_comments[]">  </br>');
		});
		$('#add_attention_to_safety_comment').click(function(){
			$('#attention_to_safety_comment').append('<input type="text" style="border: none;" name="attention_to_safety_comments[]">  </br>');
		});
		$('#add_dependability_comment').click(function(){
			$('#dependability_comment').append('<input type="text" style="border: none;" name="dependability_comments[]">  </br>');
		});
		$('#add_integrity_comment').click(function(){
			$('#integrity_comment').append('<input type="text" style="border: none;" name="integrity_comments[]">  </br>');
		});
		$('#add_ability_to_tolerate_stress_comment').click(function(){
			$('#ability_to_tolerate_stress_comment').append('<input type="text" style="border: none;" name="ability_to_tolerate_stress_comments[]">  </br>');
		});
		$('#add_decision_making_comment').click(function(){
			$('#decision_making_comment').append('<input type="text" style="border: none;" name="decision_making_comments[]">  </br>');
		});
		$('#add_assertiveness_comment').click(function(){
			$('#assertiveness_comment').append('<input type="text" style="border: none;" name="assertiveness_comments[]">  </br>');
		});
		$('#add_general_comment').click(function(){
			$('#general_comment').append('<input type="text" style="border: none;" name="general_comments[]">  </br>');
		});

		$(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'mm/dd/yyyy',
                autoclose: true
            });

            $('#evaluation_period_from').on('change', function () {
                endDate = $('#evaluation_period_to').val();
                startDate = $(this).val();
                if (endDate != '' && endDate < startDate){
                    alert("Start date must before end date in evaluation!");
                    $(this).val('');
                }
            });

            $('#evaluation_period_to').on('change', function () {
                startDate = $('#evaluation_period_from').val();
                endDate = $(this).val();
                if (endDate < startDate){
                    alert("End date must after start date in evaluation!");
                    $(this).val('');
                }
                console.log($(this).val());
            });

        });


    </script>
@endpush