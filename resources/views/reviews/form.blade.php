@can('is_admin')
<div class="form-group">
    <label class="col-sm-2">Reviewer</label>
    <div class="col-sm-10">
        <select name="reviewer" class="form-control">
            @foreach(\App\Services\UserService::getOtherRecruit() as $recruit)
                <option value="{{ $recruit->id }}" {{ @$review && $review->reviewer == $recruit->id ? 'selected' : '' }}>{{ $recruit->firstname }} {{ $recruit->lastname }}</option>
            @endforeach
        </select>
    </div>
</div>
@endcan

<div class="table-div has-border mobile" style="margin-bottom: 15px;">
    <div class="table-cell-div" style="width: 20%">
        {!! Form::label('recruit', 'RECRUIT:', ['class' => 'control-label']) !!}
    </div>

    <div class="table-cell-div" style="width: 30%">
        <?php
        if (!empty($review))
        	$reviewee = $review->revieweeUser;
        ?>
        @if (empty($reviewee) || @$isUpdate)
            <select id="reviewee" name="reviewee" class="form-control">
                @foreach(\App\Services\UserService::getOtherRecruit() as $recruit)
                    <option value="{{ $recruit->id }}" {{ @$review && $review->reviewee == $recruit->id ? 'selected' : '' }}>{{ $recruit->firstname }} {{ $recruit->lastname }}</option>
                @endforeach
            </select>
        @else
            <span>{{ $reviewee->firstname }} {{ $reviewee->lastname }}</span>
            <input type="hidden" name="reviewee" value="{{ $reviewee->id }}">
        @endif
    </div>

    <div class="table-cell-div" style="width: 15%">
        {!! Form::label('recruit_date', 'DATE:', ['class' => 'control-label']) !!}
    </div>

    <div class="table-cell-div" style="width: 35%">
        11/01/2018
    </div>
</div>

<div class="table-div has-border mobile" style="margin-bottom: 15px;">
    <div class="table-cell-div" style="width: 25%">
        {!! Form::label('evaluation_period', 'EVALUATION PERIOD:', ['class' => 'control-label']) !!}
    </div>

    <div class="table-cell-div" style="width: 25%">
        11/01/18 to 11/01/18
    </div>

    <div class="table-cell-div" style="width: 20%">
        {!! Form::label('attendance', 'ATTENDANCE:', ['class' => 'control-label']) !!}
    </div>

    <div class="table-cell-div" style="width: 30%">
        {!! Form::number('attendance', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
</div>

<div class="form-group" style="max-width: 500px; padding: 0px 15px;">
    {!! Form::label('general_comments', 'GENERAL COMMENTS:', ['class' => 'control-label']) !!}
    {{ Form::textarea('general_comments', null, ['class' => 'form-control']) }}
</div>

<div id="uniform" class="table-div" style="max-width: 500px;">
    <div class="table-cell-div table-cell-top" style="width: 50%;">
        {!! Form::label('uniform', 'Uniform / Appearance', ['class' => 'control-label']) !!}
        <p class="rating-comment">
            {{ @$review->uniform_comment }}
        </p>
        {!! $errors->first('uniform_comment', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <span class="rating-point">{{ @$review->uniform | 0 }}</span>
        {!! $errors->first('uniform', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <a href="javascript:void(0)" class="rating btn btn-primary btn-sm">Rate</a>
    </div>
    {!! Form::hidden('uniform', @$review->uniform, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
    {!! Form::hidden('uniform_comment', @$review->uniform_comment, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
</div>

<div id="hygience" class="table-div" style="max-width: 500px;">
    <div class="table-cell-div table-cell-top" style="width: 50%;">
        {!! Form::label('hygience', 'Hygience / Grooming', ['class' => 'control-label']) !!}
        <p class="rating-comment">
            {{ @$review->hygience_comment }}
        </p>
        {!! $errors->first('hygience_comment', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <span class="rating-point">{{ @$review->hygience | 0 }}</span>
        {!! $errors->first('hygience', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <a href="javascript:void(0)" class="rating btn btn-primary btn-sm">Rate</a>
    </div>
    {!! Form::hidden('hygience', @$review->hygience, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
    {!! Form::hidden('hygience_comment', @$review->hygience_comment, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
</div>

<div id="respectful" class="table-div" style="max-width: 500px;">
    <div class="table-cell-div table-cell-top" style="width: 50%;">
        {!! Form::label('respectful', 'Respectful / Tactful Communication', ['class' => 'control-label']) !!}
        <p class="rating-comment">
            {{ @$review->respectful_comment }}
        </p>
        {!! $errors->first('respectful_comment', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <span class="rating-point">{{ @$review->respectful | 0 }}</span>
        {!! $errors->first('respectful', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <a href="javascript:void(0)" class="rating btn btn-primary btn-sm">Rate</a>
    </div>
    {!! Form::hidden('respectful', @$review->respectful, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
    {!! Form::hidden('respectful_comment', @$review->respectful_comment, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
</div>

<div id="teamwork" class="table-div" style="max-width: 500px;">
    <div class="table-cell-div table-cell-top" style="width: 50%;">
        {!! Form::label('teamwork', 'Teamwork', ['class' => 'control-label']) !!}
        <p class="rating-comment">
            {{ @$review->teamwork_comment }}
        </p>
        {!! $errors->first('teamwork_comment', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <span class="rating-point">{{ @$review->teamwork | 0 }}</span>
        {!! $errors->first('teamwork', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <a href="javascript:void(0)" class="rating btn btn-primary btn-sm">Rate</a>
    </div>
    {!! Form::hidden('teamwork', @$review->teamwork, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
    {!! Form::hidden('teamwork_comment', @$review->teamwork_comment, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
</div>

<div id="adaptability" class="table-div" style="max-width: 500px;">
    <div class="table-cell-div table-cell-top" style="width: 50%;">
        {!! Form::label('adaptability', 'Adaptability', ['class' => 'control-label']) !!}
        <p class="rating-comment">
            {{ @$review->teamwork_comment }}
        </p>
        {!! $errors->first('adaptability_comment', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <span class="rating-point">{{ @$review->adaptability | 0 }}</span>
        {!! $errors->first('adaptability', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <a href="javascript:void(0)" class="rating btn btn-primary btn-sm">Rate</a>
    </div>
    {!! Form::hidden('adaptability', @$review->adaptability, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
    {!! Form::hidden('adaptability_comment', @$review->teamwork_comment, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
</div>

<div id="dependability" class="table-div" style="max-width: 500px;">
    <div class="table-cell-div table-cell-top" style="width: 50%;">
        {!! Form::label('dependability', 'Dependability', ['class' => 'control-label']) !!}
        <p class="rating-comment">
            {{ @$review->dependability_comment }}
        </p>
        {!! $errors->first('dependability_comment', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <span class="rating-point">{{ @$review->dependability | 0 }}</span>
        {!! $errors->first('dependability', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <a href="javascript:void(0)" class="rating btn btn-primary btn-sm">Rate</a>
    </div>
    {!! Form::hidden('dependability', @$review->dependability, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
    {!! Form::hidden('dependability_comment', @$review->dependability_comment, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
</div>

<div id="attention_to_safety" class="table-div" style="max-width: 500px;">
    <div class="table-cell-div table-cell-top" style="width: 50%;">
        {!! Form::label('attention_to_safety', 'Attention to Safety', ['class' => 'control-label']) !!}
        <p class="rating-comment">
            {{ @$review->attention_to_safety_comment }}
        </p>
        {!! $errors->first('attention_to_safety_comment', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <span class="rating-point">{{ @$review->attention_to_safety | 0 }}</span>
        {!! $errors->first('attention_to_safety', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <a href="javascript:void(0)" class="rating btn btn-primary btn-sm">Rate</a>
    </div>
    {!! Form::hidden('attention_to_safety', @$review->attention_to_safety, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
    {!! Form::hidden('attention_to_safety_comment', @$review->attention_to_safety_comment, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
</div>

<div id="integrity" class="table-div" style="max-width: 500px;">
    <div class="table-cell-div table-cell-top" style="width: 50%;">
        {!! Form::label('integrity', 'Integrity / Ethics', ['class' => 'control-label']) !!}
        <p class="rating-comment">
            {{ @$review->integrity_comment }}
        </p>
        {!! $errors->first('integrity_comment', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <span class="rating-point">{{ @$review->integrity | 0 }}</span>
        {!! $errors->first('integrity', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <a href="javascript:void(0)" class="rating btn btn-primary btn-sm">Rate</a>
    </div>
    {!! Form::hidden('integrity', @$review->integrity, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
    {!! Form::hidden('integrity_comment', @$review->integrity_comment, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
</div>

<div id="ability_to_tolerate_stress" class="table-div" style="max-width: 500px;">
    <div class="table-cell-div table-cell-top" style="width: 50%;">
        {!! Form::label('ability_to_tolerate_stress', 'Ability to Tolerate Stress', ['class' => 'control-label']) !!}
        <p class="rating-comment">
            {{ @$review->ability_to_tolerate_stress_comment }}
        </p>
        {!! $errors->first('ability_to_tolerate_stress_comment', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <span class="rating-point">{{ @$review->ability_to_tolerate_stress | 0 }}</span>
        {!! $errors->first('ability_to_tolerate_stress', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <a href="javascript:void(0)" class="rating btn btn-primary btn-sm">Rate</a>
    </div>
    {!! Form::hidden('ability_to_tolerate_stress', @$review->ability_to_tolerate_stress, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
    {!! Form::hidden('ability_to_tolerate_stress_comment', @$review->ability_to_tolerate_stress_comment, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
</div>

<div id="decision_making" class="table-div" style="max-width: 500px;">
    <div class="table-cell-div table-cell-top" style="width: 50%;">
        {!! Form::label('decision_making', 'Decision Making', ['class' => 'control-label']) !!}
        <p class="rating-comment">
            {{ @$review->decision_making_comment }}
        </p>
        {!! $errors->first('decision_making_comment', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <span class="rating-point">{{ @$review->decision_making | 0 }}</span>
        {!! $errors->first('decision_making', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <a href="javascript:void(0)" class="rating btn btn-primary btn-sm">Rate</a>
    </div>
    {!! Form::hidden('decision_making', @$review->decision_making, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
    {!! Form::hidden('decision_making_comment', @$review->decision_making_comment, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
</div>

<div id="assertiveness" class="table-div" style="max-width: 500px;">
    <div class="table-cell-div table-cell-top" style="width: 50%;">
        {!! Form::label('assertiveness', 'Assertiveness', ['class' => 'control-label']) !!}
        <p class="rating-comment">
            {{ @$review->assertiveness_comment }}
        </p>
        {!! $errors->first('assertiveness_comment', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <span class="rating-point">{{ @$review->assertiveness | 0 }}</span>
        {!! $errors->first('assertiveness', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="table-cell-div table-cell-top" style="width: 25%;">
        <a href="javascript:void(0)" class="rating btn btn-primary btn-sm">Rate</a>
    </div>
    {!! Form::hidden('assertiveness', @$review->assertiveness, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
    {!! Form::hidden('assertiveness_comment', @$review->assertiveness_comment, ['class' => 'form-control', 'readonly' => 'true', 'required' => true]) !!}
</div>
<br/><br/>
<div class="form-group text-center">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Submit', ['class' => 'btn btn-primary']) !!}
      @if (Auth::user()->isAdmin() || Auth::user()->isRecruit())
          <a href="{{ URL::previous() }}" title="Back" class="btn btn-warning">Cancel</a>
      @endif
</div>
