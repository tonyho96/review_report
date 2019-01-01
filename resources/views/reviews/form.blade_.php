<div class="form-group {{ $errors->has('reviewer') ? 'has-error' : ''}}">
    {!! Form::label('reviewer', 'Reviewer', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('reviewer', Auth::user()->id, ['class' => 'form-control', 'readonly' => 'true']) !!}
        {!! $errors->first('reviewer', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<?php
    $userSelectData = [];
    $users = \App\User::all();
    foreach ($users as $user) {
        if($user->id != Auth::user()->id){
            $userSelectData[$user->id] = $user->id;
        }
    }
?>

<div class="form-group {{ $errors->has('reviewee') ? 'has-error' : ''}}">
    {!! Form::label('reviewee', 'Reviewee', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('reviewee', $userSelectData, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('reviewee', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uniform') ? 'has-error' : ''}}">
    {!! Form::label('uniform', 'Uniform', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('uniform', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('uniform', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uniform_comment') ? 'has-error' : ''}}">
    {!! Form::label('uniform_comment', 'Uniform Comment', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('uniform_comment', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('uniform_comment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hygience') ? 'has-error' : ''}}">
    {!! Form::label('hygience', 'Hygience', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('hygience', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('hygience', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hygience_comment') ? 'has-error' : ''}}">
    {!! Form::label('hygience_comment', 'Hygience Comment', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('hygience_comment', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('hygience_comment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('respectful') ? 'has-error' : ''}}">
    {!! Form::label('respectful', 'Respectful', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('respectful', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('respectful', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('respectful_comment') ? 'has-error' : ''}}">
    {!! Form::label('respectful_comment', 'Respectful Comment', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('respectful_comment', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('respectful_comment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('teamwork') ? 'has-error' : ''}}">
    {!! Form::label('teamwork', 'Teamwork', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('teamwork', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('teamwork', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('teamwork_comment') ? 'has-error' : ''}}">
    {!! Form::label('teamwork_comment', 'Teamwork Comment', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('teamwork_comment', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('teamwork_comment', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('adaptability') ? 'has-error' : ''}}">
    {!! Form::label('adaptability', 'Adaptability', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('adaptability', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('adaptability', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('adaptability_comment') ? 'has-error' : ''}}">
    {!! Form::label('adaptability_comment', 'Adaptability Comment', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('adaptability_comment', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('adaptability_comment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dependability') ? 'has-error' : ''}}">
    {!! Form::label('dependability', 'Dependability', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('dependability', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('dependability', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dependability_comment') ? 'has-error' : ''}}">
    {!! Form::label('dependability_comment', 'Dependability Comment', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('dependability_comment', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('dependability_comment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('attention_to_safety') ? 'has-error' : ''}}">
    {!! Form::label('attention_to_safety', 'Attention To Safety', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('attention_to_safety', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('attention_to_safety', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('attention_to_safety_comment') ? 'has-error' : ''}}">
    {!! Form::label('attention_to_safety_comment', 'Attention To Safety Comment', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('attention_to_safety_comment', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('attention_to_safety_comment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('integrity') ? 'has-error' : ''}}">
    {!! Form::label('integrity', 'Integrity', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('integrity', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('integrity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('integrity_comment') ? 'has-error' : ''}}">
    {!! Form::label('integrity_comment', 'Integrity Comment', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('integrity_comment', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('integrity_comment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ability_to_tolerate_stress') ? 'has-error' : ''}}">
    {!! Form::label('ability_to_tolerate_stress', 'Ability To Tolerate Stress', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('ability_to_tolerate_stress', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('ability_to_tolerate_stress', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ability_to_tolerate_stress_comment') ? 'has-error' : ''}}">
    {!! Form::label('ability_to_tolerate_stress_comment', 'Ability To Tolerate Stress Comment', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('ability_to_tolerate_stress_comment', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('ability_to_tolerate_stress_comment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('decision_making') ? 'has-error' : ''}}">
    {!! Form::label('decision_making', 'Decision Making', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('decision_making', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('decision_making', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('decision_making_comment') ? 'has-error' : ''}}">
    {!! Form::label('decision_making_comment', 'Decision Making Comment', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('decision_making_comment', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('decision_making_comment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('assertiveness') ? 'has-error' : ''}}">
    {!! Form::label('assertiveness', 'Assertiveness', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('assertiveness', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('assertiveness', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('assertiveness_comment') ? 'has-error' : ''}}">
    {!! Form::label('assertiveness_comment', 'Assertiveness Comment', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('assertiveness_comment', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('assertiveness_comment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tardies') ? 'has-error' : ''}}">
    {!! Form::label('tardies', 'Tardies', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('tardies', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('tardies', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('absences') ? 'has-error' : ''}}">
    {!! Form::label('absences', 'Absences', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('absences', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('absences', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('absence_hours') ? 'has-error' : ''}}">
    {!! Form::label('absence_hours', 'Absence Hours', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('absence_hours', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('absence_hours', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('maximum_allowable_absence_hours') ? 'has-error' : ''}}">
    {!! Form::label('maximum_allowable_absence_hours', 'Maximum Allowable Absence Hours', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('maximum_allowable_absence_hours', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('maximum_allowable_absence_hours', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('academic_achievement') ? 'has-error' : ''}}">
    {!! Form::label('academic_achievement', 'Academic Achievement', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('academic_achievement', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('academic_achievement', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('class_standing') ? 'has-error' : ''}}">
    {!! Form::label('class_standing', 'Class Standing', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('class_standing', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('class_standing', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('academic_achievement_percent') ? 'has-error' : ''}}">
    {!! Form::label('academic_achievement_percent', 'Academic Achievement Percent', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('academic_achievement_percent', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('academic_achievement_percent', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('excellence_reports') ? 'has-error' : ''}}">
    {!! Form::label('excellence_reports', 'Excellence Reports', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('excellence_reports', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('excellence_reports', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('discrepancy_reports') ? 'has-error' : ''}}">
    {!! Form::label('discrepancy_reports', 'Discrepancy Reports', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('discrepancy_reports', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('discrepancy_reports', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('disciplinary_actions') ? 'has-error' : ''}}">
    {!! Form::label('disciplinary_actions', 'Disciplinary Actions', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('disciplinary_actions', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('disciplinary_actions', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('staff_comments') ? 'has-error' : ''}}">
    {!! Form::label('staff_comments', 'Staff Comments', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('staff_comments', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('staff_comments', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
