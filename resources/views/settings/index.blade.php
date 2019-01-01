@extends('adminlte::page')

@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Settings</h3>
                </div>
                <div class="box-body">

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <?php
                        $date = DB::table('settings')->where('key', 'date')->value('value');
                        $max_allow_absence_hours = DB::table('settings')->where('key', 'max_allow_absence_hours')->value('value');
                        $class_standing = DB::table('settings')->where('key', 'class_standing')->value('value');
                        $academy_staff_officer = DB::table('settings')->where('key', 'academy_staff_officer')->value('value');
                        $evaluation_start_date = DB::table('settings')->where('key', 'evaluation_start_date')->value('value');
                        $evaluation_end_date = DB::table('settings')->where('key', 'evaluation_end_date')->value('value');
                    ?>

                    {!! Form::open(['url' => '/settings', 'class' => 'form-horizontal', 'files' => true]) !!}

                        <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                            {!! Form::label('date', 'Date', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('date', $date, ('' == 'required') ? ['class' => 'form-control datepicker', 'required' => 'required'] : ['class' => 'form-control datepicker']) !!}
                                {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('max_allow_absence_hours') ? 'has-error' : ''}}">
                            {!! Form::label('max_allow_absence_hours', 'Maximum Allowable Absence Hours', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('max_allow_absence_hours', $max_allow_absence_hours, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('max_allow_absence_hours', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('class_standing') ? 'has-error' : ''}}">
                            {!! Form::label('class_standing', 'Class Standing', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('class_standing', $class_standing, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('class_standing', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('academy_staff_officer') ? 'has-error' : ''}}">
                            {!! Form::label('academy_staff_officer', 'Academy Staff Officer', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('academy_staff_officer', $academy_staff_officer, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('evaluation_start_date') ? 'has-error' : ''}}">
                            {!! Form::label('evaluation_start_date', 'Evaluation Start Date', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('evaluation_start_date', $evaluation_start_date, ('required' == 'required') ? ['class' => 'form-control datepicker', 'required' => 'required'] : ['class' => 'form-control datepicker']) !!}
                                {!! $errors->first('evaluation_start_date', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('evaluation_end_date') ? 'has-error' : ''}}">
                            {!! Form::label('evaluation_end_date', 'Evaluation End Date', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('evaluation_end_date', $evaluation_end_date, ('required' == 'required') ? ['class' => 'form-control datepicker', 'required' => 'required'] : ['class' => 'form-control datepicker']) !!}
                                {!! $errors->first('evaluation_end_date', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Update', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
//            startDate: '',
            autoclose: true
        });

        $('#evaluation_start_date').on('change', function () {
            endDate = $('#evaluation_end_date').val();
            startDate = $(this).val();
            if (endDate != '' && endDate < startDate){
                alert("Start date must before end date in evaluation!");
                $(this).val('');
            }
        });

        $('#evaluation_end_date').on('change', function () {
            startDate = $('#evaluation_start_date').val();
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
