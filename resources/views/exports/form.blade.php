<style type="text/css">
    body {
        font-size: 12px;
    }

    #pdf-wraper {
        page-break-inside: avoid;
        page-break-before: avoid;
        page-break-after: avoid;
    }

    .table-div {
        display: table !important;
        width: 100%;
        margin-bottom: 15px;
    }

    .table-div.has-border {
        border: 1px solid #000000;
    }

    .table-cell-div {
        display: table-cell !important;
        float: none !important;
        width: 50%;
        vertical-align: middle;
    }

    .table-div.has-border .table-cell-div {
        border-right: 1px solid;
        padding: 5px 15px;
    }

    .table-div.has-border .table-cell-div:last-child {
        border-right: 0px;
    }

    .text-left {
        text-align: left !important;
    }

    .text-center {
        text-align: center !important;
    }

    .text-right {
        text-align: right !important;
    }

    .rotate-table {
        width: 100% !important;
        table-layout: fixed;
        width: 60%;
        clear: both;
        padding-top: 200px;
        border: 1px solid;
        overflow: hidden;
        position: relative;
    }

    .rotate-table tr th {
        height: 180px;
        transform: rotate(-90deg) translate(-5px, 15px);
        text-align: left !important;
        line-height: 3.2;
        padding: 0px;
        white-space: nowrap;
        z-index: 9999;
        font-weight: bold;
        color: #000000;
    }

    .rotate-table tr th hr {
        width: 300px;
        margin-left: -50px;
        line-height: 1px;
    }

    .rotate-table tr td {
        padding: 0px;
        margin: 0px;
        white-space: nowrap;
        border-top: 1px solid;
        z-index: 9999;
    }

    .rotate-table tr td input {
        text-align: center;
        width: 50px;
    }

    .rotate-table tr th span,
    .rotate-table tr td span {
        z-index: 9999;
    }

    .rotate-table tr td span::before {
        content: ' ';
        display: block;
        position: absolute;
        right: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        background-color: rgba(50, 80, 200, .5);
        z-index: -1;
    }

    .reviewer_comment input {
        width: 100%;
    }
</style>

<form action="{{ url('/export/pdf') }}" method="POST">
    {{ csrf_field() }}
    <div id="pdf-wraper">
        <div id="header">
            <div class="table-div">
                <div class="table-cell-div text-left" style="width: 33%;">
                    MODULAR ACADEMY
                </div>

                <div class="table-cell-div text-center" style="width: 33%;">
                    RECRUIT PERFORMANCE EVALUATION
                </div>

                <div class="table-cell-div text-right" style="width: 33%;">
                    MODULE {{$reviewee->module}}
                </div>
            </div>
        </div>
        <br/><br/>

        <div id="content">

            <div class="table-div has-border">

                <div class="table-cell-div" style="width: 15%;">
                    RECRUIT:
                </div>

                <div class="table-cell-div" style="width: 35%;">
                    <input type="text" name="recruit_lastname" required value="{{ $reviewee->firstname }} " style="border: none;">
                    <input type="text" name="recruit_firstname" required value="{{$reviewee->lastname}}" style="border: none;">
                </div>

                <div class="table-cell-div" style="width: 10%;">
                    DATE:
                </div>

                <div class="table-cell-div" style="width: 40%;">
                    <input type="text" name="review_date" value="{{ @$settings['date'] }}" required style="border: none;" class="datepicker">
                </div>
            </div>

            <div class="table-div has-border" style="margin: 0px;">
                <div class="table-cell-div" style="width: 16%;">
                    EVALUATION PERIOD:
                </div>

                <div class="table-cell-div" style="width: 34%;">
                    <input type="text" id="evaluation_period_from" name="evaluation_period_from" required value="{{ @$settings['evaluation_start_date'] }}" style="border: none;" class="datepicker">
                    to
                    <input type="text" id="evaluation_period_to" name="evaluation_period_to" required value="{{ @$settings['evaluation_end_date'] }}" style="border: none" class="datepicker">
                </div>

                <div class="table-cell-div" style="width: 20%;">
                    ATTENDANCE:
                </div>

                <div class="table-cell-div" style="width: 30%;">
                    <input type="text" name="review_attendance" required value="{{ $scores['attendance'] }}" style="border: none;">
                </div>
            </div>

            <div class="table-div has-border" style="width: 30%; margin: 0px; position: relative; left: 55%; border-bottom: 0px;">
                <div class="table-cell-div" style="width: 80%;">
                    Tardy(ies):
                </div>

                <div class="table-cell-div" style="width: 20%;">
                    <input type="number" name="review_tardies" required value="0" style="border: none;">
                </div>
            </div>

            <div class="table-div has-border" style="width: 30%; margin: 0px; position: relative; left: 55%; border-bottom: 0px;">
                <div class="table-cell-div" style="width: 80%;">
                    Absence(s):
                </div>

                <div class="table-cell-div" style="width: 20%;">
                    <input type="number" name="review_absences" required value="0" style="border: none;">
                </div>
            </div>

            <div class="table-div has-border" style="width: 30%; margin: 0px; position: relative; left: 55%; border-bottom: 0px;">
                <div class="table-cell-div" style="width: 80%;">
                    Absence Hours:
                </div>

                <div class="table-cell-div" style="width: 20%;">
                    <input type="number" name="review_absence_hours" required value="0" style="border: none;">
                </div>
            </div>

            <div class="table-div has-border" style="width: 40%; position: relative; left: 55%;">
                <div class="table-cell-div" style="width: 80%;">
                    Maximum allowable absece hours:
                </div>

                <div class="table-cell-div" style="width: 20%;">
                    <input type="number" name="review_maximum_allowable_absence_hours" required value="{{ @$settings['max_allow_absence_hours'] }}" style="border: none;">
                </div>
            </div>

            <div class="table-div has-border" style="width: 60%;">
                <div class="table-cell-div" style="width: 80%;">
                    ACADEMIC ACHIEVEMENT/CLASS STANDING:
                </div>

                <div class="table-cell-div text-center" style="width: 10%;">
                    <input type="number" name="review_academic_achievement" required value="0" style="border: none;">
                </div>

                <div class="table-cell-div text-center" style="width: 10%;">
                    of
                </div>

                <div class="table-cell-div text-center" style="width: 10%;">
                    <input type="number" name="review_class_standing" required value="{{ @$settings['class_standing'] }}" style="border: none;">
                </div>
            </div>

            <div class="table-div has-border" style="width: 85%;">
                <div class="table-cell-div" style="width: 30%;">
                    After completing
                </div>

                <div class="table-cell-div text-center" style="width: 10%;">
                    <input type="number" name="review_class_standing" required value="" style="border: none;">
                </div>

                <div class="table-cell-div text-center" style="width: 50%;">
                    tests, you have an overall academic achievement of
                </div>

                <div class="table-cell-div text-center" style="width: 10%;">
                    <input type="number" name="review_academic_achievement_percent" min="0" max="100" required value="" style="width: 60%; border: none;">%
                </div>
            </div>

            <div class="table-div has-border" style="width: 65%;">
                <div class="table-cell-div" style="width: 40%;">
                    EXCELLENCE REPORTS:
                </div>

                <div class="table-cell-div text-center" style="width: 10%;">
                    <input type="number" name="review_excellence_reports" required value="" style="border: none;">
                </div>

                <div class="table-cell-div" style="width: 40%;">
                    DISCREPANCY REPORTS:
                </div>

                <div class="table-cell-div text-center" style="width: 10%;">
                    <input type="number" name="review_discrepancy_reports" required value="" style="border: none;">
                </div>
            </div>

            <div class="table-div has-border">
                <div class="table-cell-div" style="width: 35%;">
                    DISCIPLINARY:
                </div>

                <div class="table-cell-div" style="width: 65%;">
                    <input type="text" name="review_disciplinary_actions" required value="" style="border: none; width: 99%">
                </div>
            </div>

            <div class="table-div has-border">
                <div class="table-cell-div" style="width: 100%;">
                    PEER EVALUATION SUMMARY: EVALUATIONS ON A SCALE OF 0 (not responding to training) TO 5 (excellent)
                </div>
            </div>

            <table class="text-center rotate-table">
                <tr>
                    <th>
                        UNIFORM/APPEARANCE
                        <hr>
                    </th>
                    <th>
                        HYGIENCE/GROOMING
                        <hr>
                    </th>
                    <th>
                        RESPECTFUL/TACTFUL COM.
                        <hr>
                    </th>
                    <th>
                        TEAMWORK
                        <hr>
                    </th>
                    <th>
                        ADAPTABILITY
                        <hr>
                    </th>
                    <th>
                        DEPENDABILITY
                        <hr>
                    </th>
                    <th>
                        ATTENTION TO SAFETY
                        <hr>
                    </th>
                    <th>
                        INTEGRITY/ETHICS
                        <hr>
                    </th>
                    <th>
                        ABILITY TO TOLERATE STRESS
                        <hr>
                    </th>
                    <th>
                        DECISION-MAKING
                        <hr>
                    </th>
                    <th>
                        ASSERTIVENESS
                        <hr>
                    </th>
                    <th>
                        <span>AVERAGE</span>
                    </th>
                </tr>
                <tr>
                    <td>
                        <input type="number" name="review_uniform" class="review-score" min="0" max="5" required  value="{{$scores['uniform']}}" step="0.1" style="border: none;">
                    </td>
                    <td>
                        <input type="number" name="review_hygience" class="review-score" min="0" max="5" required value="{{$scores['hygience']}}" step="0.1"style="border: none;">
                    </td>
                    <td>
                        <input type="number" name="review_respectful" class="review-score" min="0" max="5" required value="{{$scores['respectful']}}" step="0.1" style="border: none;">
                    </td>
                    <td>
                        <input type="number" name="review_teamwork" class="review-score" min="0" max="5" required value="{{$scores['teamwork']}}" step="0.1" style="border: none;">
                    </td>
                    <td>
                        <input type="number" name="review_adaptability" class="review-score" min="0" max="5" required value="{{$scores['adaptability']}}" step="0.1" style="border: none;">
                    </td>
                    <td>
                        <input type="number" name="review_dependability" class="review-score" min="0" max="5" required value="{{$scores['dependability']}}" step="0.1" style="border: none;">
                    </td>
                    <td>
                        <input type="number" name="review_attention_to_safety" class="review-score" min="0" max="5" required value="{{$scores['attention_to_safety']}}" step="0.1" style="border: none;">
                    </td>
                    <td>
                        <input type="number" name="review_integrity" class="review-score" min="0" max="5" required value="{{$scores['integrity']}}" step="0.1" style="border: none;">
                    </td>
                    <td>
                        <input type="number" name="review_ability_to_tolerate_stress" min="0" max="5" required class="review-score" value="{{$scores['ability_to_tolerate_stress']}}" step="0.1" style="border: none;">
                    </td>
                    <td>
                        <input type="number" name="review_decision_making" class="review-score" min="0" max="5" required value="{{$scores['decision_making']}}" step="0.1" style="border: none;">
                    </td>
                    <td>
                        <input type="number" name="review_assertiveness" class="review-score" min="0" max="5" required value="{{$scores['assertiveness']}}" step="0.1" style="border: none;">
                    </td>
                    <td>
                        <input type="number" id="review_average_score" name="review_average_score" class="" value="0" step="0.1" style="border: none;" readonly>
                    </td>
                </tr>
            </table>

            <br/>

            <div class="table-div">
                <div class="table-cell-div" style="width: 20%; vertical-align: top; padding: 0px">
                    <div style="border: 1px solid; border-right: 0px; padding: 5px;">STAFF COMMENTS:</div>
                </div>
                <div class="table-cell-div" style="width: 80%; border: 1px solid; height: 100px; vertical-align: top;">
                    <div style="padding: 5px;">
                        <textarea name="review_staff_comments" style="border: none;"></textarea>
                    </div>
                </div>
            </div>
			
			
			<!-------i add this------>
			<div class="table-div has-border" style="margin: 0px; border-bottom: 0px; text-align: left;">
				<div class="table-cell-div" style="width: 100%; ">
					COMMENTS
				</div>
		
				
			</div>
			<div class="table-div has-border" style="margin: 0px; border-bottom: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					UNIFORM/APPEARANCE
				</div>	
				<div class="table-cell-div uniform_comments reviewer_comment" style="width: 65%;">
					<div id="uniform_comment">
					<?php
						foreach ($comment['uniform_comment'] as $comment0) {
							if($comment0!=''){
								?>
							<input type="text" value="<?php echo $comment0;?> " style="border: none;" name="uniform_comments[]">  </br>
						<?php }} ?>
					</div>
						<button type="button" id="add_uniform_comment">Add Comment</button>
                </div>
			</div>
			<div class="table-div has-border" style="margin: 0px; border-bottom: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					HYGIENCE/GROOMING
				</div>	
				<div class="table-cell-div reviewer_comment" style="width: 65%;">
					<div id="hygience_comment">
                    <?php
						foreach ($comment['hygience_comment'] as $comment1) {
							if($comment1!=''){
							  ?>
							<input type="text" value="<?php echo $comment1;?> " style="border: none;" name="hygience_comments[]">  </br>
						<?php }} ?>
					</div>
					<button type="button" id="add_hygience_comment">Add Comment</button>
                </div>
			</div>
			<div class="table-div has-border" style="margin: 0px; border-bottom: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					RESPECTFUL/TACTFUL COM.
				</div>	
				<div class="table-cell-div reviewer_comment" style="width: 65%;">
					<div id="respectful_comment">
                   <?php
						foreach ($comment['respectful_comment'] as $comment2) {
							if($comment2!=''){
							   ?>
							<input type="text" value="<?php echo $comment2;?> " style="border: none;" name="respectful_comments[]">  </br>
						<?php }} ?>
					</div>
					<button type="button" id="add_respectful_comment">Add Comment</button>
                </div>
			</div>
			<div class="table-div has-border" style="margin: 0px; border-bottom: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					TEAMWORK
				</div>	
				<div class="table-cell-div reviewer_comment" style="width: 65%;">
					<div id="teamwork_comment">
                    <?php
						foreach ($comment['teamwork_comment'] as $comment3) {
							if($comment3!=''){
							    ?>
							<input type="text" value="<?php echo $comment3;?> " style="border: none;" name="teamwork_comments[]">  </br>
						<?php }} ?>
					
						
					 </div>
					 <button type="button" id="add_teamwork_comment">Add Comment</button>
                </div>
			</div>
			<div class="table-div has-border" style="margin: 0px; border-bottom: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					ADAPTABILITY
				</div>	
				<div class="table-cell-div reviewer_comment" style="width: 65%;">
					<div id="adaptability_comment">
					<?php
						foreach ($comment['adaptability_comment'] as $comment4) {
							if($comment4!=''){
							    ?>
							<input type="text" value="<?php echo $comment4;?> " style="border: none;" name="adaptability_comments[]">  </br>
						<?php }} ?>
						
					
					 </div>
					 	<button type="button" id="add_adaptability_comment">Add Comment</button>
                </div>
			</div>
			<div class="table-div has-border" style="margin: 0px; border-bottom: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					DEPENDABILITY
				</div>	
				<div class="table-cell-div reviewer_comment" style="width: 65%;">
					<div id="dependability_comment">
					<?php
						foreach ($comment['dependability_comment'] as $comment5) {
							if($comment5!=''){
							   ?>
							<input type="text" value="<?php echo $comment5;?> " style="border: none;" name="dependability_comments[]">  </br>
						<?php }} ?>			
						
						
					</div>					
					<button type="button" id="add_dependability_comment">Add Comment</button>					
                </div>
			</div>
			
			<div class="table-div has-border" style="margin: 0px; border-bottom: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					ATTENTION TO SAFETY
				</div>	
				<div class="table-cell-div reviewer_comment" style="width: 65%;">
					<div id="attention_to_safety_comment">
				<?php
						foreach ($comment['attention_to_safety_comment'] as $comment6) {
							if($comment6!=''){
							   ?>
							<input type="text" value="<?php echo $comment6;?> " style="border: none;" name="attention_to_safety_comments[]">  </br>
						<?php }} ?>
					
						
					</div>
					<button type="button" id="add_attention_to_safety_comment">Add Comment</button>
                </div>
			</div>
			
			<div class="table-div has-border" style="margin: 0px; border-bottom: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					INTEGRITY/ETHICS
				</div>	
				<div class="table-cell-div reviewer_comment" style="width: 65%;">
					<div id="integrity_comment">
				<?php
						foreach ($comment['integrity_comment'] as $comment7) {
							if($comment7!=''){
							   ?>
							<input type="text" value="<?php echo $comment7;?> " style="border: none;" name="integrity_comments[]">  </br>
						<?php }} ?>
					
						
						</div>
						<button type="button" id="add_integrity_comment">Add Comment</button>
				</div>
			</div>
			<div class="table-div has-border" style="margin: 0px; border-bottom: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					ABILITY TO TOLERATE STRESS
				</div>	
				<div class="table-cell-div reviewer_comment" style="width: 65%;">
					<div id="ability_to_tolerate_stress_comment">
						<?php
						foreach ($comment['ability_to_tolerate_stress_comment'] as $comment8) {
							if($comment8!=''){
							   ?>
							<input type="text" value="<?php echo $comment8;?> " style="border: none;" name="ability_to_tolerate_stress_comments[]">  </br>
						<?php }} ?>
					
					</div>
					<button type="button" id="add_ability_to_tolerate_stress_comment">Add Comment</button>
                </div>
			</div>
			<div class="table-div has-border" style="margin: 0px; border-bottom: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					DECISION-MAKING
				</div>	
				<div class="table-cell-div reviewer_comment" style="width: 65%;">
					<div id="decision_making_comment">
				<?php
						foreach ($comment['decision_making_comment'] as $comment9) {
							if($comment9!=''){
							   ?>
							<input type="text" value="<?php echo $comment9;?> " style="border: none;" name="decision_making_comments[]">  </br>
						<?php }} ?>
					
						</div>
						<button type="button" id="add_decision_making_comment">Add Comment</button>
                </div>
			</div>
			<div class="table-div has-border" style="margin: 0px; border-bottom: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					ASSERTIVENESS
				</div>	
				<div class="table-cell-div reviewer_comment" style="width: 65%;">
					<div id="assertiveness_comment">
					<?php
						foreach ($comment['assertiveness_comment'] as $comment10) {
							if($comment10!=''){
							 ?>
							<input type="text" value="<?php echo $comment10;?> " style="border: none;" name="assertiveness_comments[]">  </br>
						<?php }} ?>
					
					</div>
					<button type="button" id="add_assertiveness_comment">Add Comment</button>
                </div>
			</div>
			<div class="table-div has-border" style="margin: 0px 0px 20px 0px;">
				<div class="table-cell-div" style="width: 35%;">
					GENERAL COMMENTS
				</div>	
				<div class="table-cell-div reviewer_comment" style="width: 65%;">
					<div id="general_comment">
					<?php
                        foreach ($comment['general_comments'] as $comment11) {
                            if($comment11!=''){
                             ?>
                            <input type="text" value="<?php echo $comment11;?> " style="border: none;" name="general_comments[]">  </br>
                        <?php }} ?>
					</div>
					<button type="button" id="add_general_comment">Add Comment</button>
                </div>
			</div>
			<!-------------------->
			
			
            <div class="table-div has-border" style="margin: 0px; border-bottom: 0px;">
                <div class="table-cell-div" style="width: 35%;">
                    ACADEMY STAFF OFFICER:
                </div>

                <div class="table-cell-div" style="width: 65%;">

                </div>
            </div>

            <div class="table-div has-border" style="margin: 0px; border-bottom: 0px;">
                <div class="table-cell-div" style="width: 35%;">
                    RECRUIT SIGNATURE:
                </div>

                <div class="table-cell-div" style="width: 65%;">

                </div>
            </div>

            <div class="table-div has-border" style="margin: 0px;">
                <div class="table-cell-div" style="width: 35%;">
                    COMMANDER REVIEW/APPROVAL:
                </div>

                <div class="table-cell-div" style="width: 65%;">

                </div>
            </div>
        </div>
        <br>
        <div class="text-center">
            <input type="submit" class="btn btn-warning" value="Export">
        </div>
        <br>
        <br>
    </div>
</form>


