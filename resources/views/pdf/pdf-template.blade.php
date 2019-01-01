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
  		transform: rotate(-90deg);
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

	.page-break {
		page-break-after: always;
		page-break-inside: avoid;
	}
</style>

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
				MODULE I
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
				{{ $recruit_firstname }}, {{ $recruit_lastname }}
			</div>

			<div class="table-cell-div" style="width: 10%;">
				DATE:
			</div>

			<div class="table-cell-div" style="width: 40%;">
				{{ date('d/m/Y', strtotime($review_date)) }}
			</div>
		</div>

		<div class="table-div has-border" style="margin: 0px;">
			<div class="table-cell-div" style="width: 25%;">
				EVALUATION PERIOD:
			</div>

			<div class="table-cell-div" style="width: 25%;">
				{{ date('d/m/y', strtotime($evaluation_period_from)) }} to {{ date('d/m/y', strtotime($evaluation_period_to)) }}
			</div>

			<div class="table-cell-div" style="width: 20%;">
				ATTENDANCE:
			</div>

			<div class="table-cell-div" style="width: 30%;">
				{{ $review_attendance }}
			</div>
		</div>

		<div class="table-div has-border" style="width: 30%; margin: 0px; position: relative; left: 55%; border-bottom: 0px;">
			<div class="table-cell-div" style="width: 80%;">
				Tardy(ies):
			</div>

			<div class="table-cell-div"  style="width: 20%;">
				{{ $review_tardies }}
			</div>
		</div>

		<div class="table-div has-border" style="width: 30%; margin: 0px; position: relative; left: 55%; border-bottom: 0px;">
			<div class="table-cell-div" style="width: 80%;">
				Absence(s):
			</div>

			<div class="table-cell-div"  style="width: 20%;">
				{{ $review_absences }}
			</div>
		</div>

		<div class="table-div has-border" style="width: 30%; margin: 0px; position: relative; left: 55%; border-bottom: 0px;">
			<div class="table-cell-div" style="width: 80%;">
				Absence Hours:
			</div>

			<div class="table-cell-div" style="width: 20%;">
				{{ $review_absence_hours }}
			</div>
		</div>

		<div class="table-div has-border" style="width: 40%; position: relative; left: 55%;">
			<div class="table-cell-div" style="width: 80%;">
				Maximum allowable absece hours:
			</div>

			<div class="table-cell-div" style="width: 20%;">
				{{ $review_maximum_allowable_absence_hours }}
			</div>
		</div>

		<div class="table-div has-border" style="width: 60%;">
			<div class="table-cell-div" style="width: 80%;">
				ACADEMIC ACHIEVEMENT/CLASS STANDING:
			</div>

			<div class="table-cell-div text-center" style="width: 10%;">
				{{ $review_academic_achievement }}
			</div>

			<div class="table-cell-div text-center" style="width: 10%;">
				of
			</div>

			<div class="table-cell-div text-center" style="width: 10%;">
				{{ $review_class_standing }}
			</div>
		</div>

		<div class="table-div has-border" style="width: 85%;">
			<div class="table-cell-div" style="width: 30%;">
				After completing
			</div>

			<div class="table-cell-div text-center" style="width: 10%;">
				{{ $review_class_standing }}
			</div>

			<div class="table-cell-div text-center" style="width: 50%;">
				tests, you have an overall academic achievement of
			</div>

			<div class="table-cell-div text-center" style="width: 10%;">
				{{ $review_academic_achievement_percent }}%
			</div>
		</div>

		<div class="table-div has-border" style="width: 65%;">
			<div class="table-cell-div" style="width: 40%;">
				EXCELLENCE REPORTS:
			</div>

			<div class="table-cell-div text-center" style="width: 10%;">
				{{ $review_excellence_reports }}
			</div>

			<div class="table-cell-div" style="width: 40%;">
				DISCREPANCY REPORTS:
			</div>

			<div class="table-cell-div text-center" style="width: 10%;">
				{{ $review_discrepancy_reports }}
			</div>
		</div>

		<div class="table-div has-border">
			<div class="table-cell-div" style="width: 35%;">
				DISCIPLINARY:
			</div>

			<div class="table-cell-div" style="width: 65%;">
				{{ $review_disciplinary_actions }}
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
					<span>OVERALL</span>
				</th>
			</tr>
			<tr>
				<td>{{ number_format($review_uniform, 1) }}</td>
				<td>{{ number_format($review_hygience, 1) }}</td>
				<td>{{ number_format($review_respectful, 1) }}</td>
				<td>{{ number_format($review_teamwork, 1) }}</td>
				<td>{{ number_format($review_adaptability, 1) }}</td>
				<td>{{ number_format($review_dependability, 1) }}</td>
				<td>{{ number_format($review_attention_to_safety, 1) }}</td>
				<td>{{ number_format($review_integrity, 1) }}</td>
				<td>{{ number_format($review_ability_to_tolerate_stress, 1) }}</td>
				<td>{{ number_format($review_decision_making, 1) }}</td>
				<td>{{ number_format($review_assertiveness, 1) }}</td>
				<td>{{ number_format($review_average_score, 1) }} </td>
			</tr>
		</table>
	
		<br/>
		<div class="table-div page-break">
			<div class="table-cell-div" style="width: 20%; vertical-align: top;">
				<div style="border: 1px solid; border-right: 0px; padding: 5px;">STAFF COMMENTS:</div>
			</div>
			<div class="table-cell-div" style="width: 80%; border: 1px solid; height: 100px; vertical-align: top;">
				<div style="padding: 5px;">{{ $review_staff_comments }}</div>
			</div>
		</div>
		<div>
			<div class="table-div has-border" style="margin: 0px; border-bottom: 0px; text-align: left;">
					<div class="table-cell-div" style="width: 100%; ">
						COMMENTS
					</div>
			
					
			</div>
			<div class="table-div has-border" style="margin: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					UNIFORM/APPEARANCE
				</div>	
				<div class="table-cell-div" style="width: 65%;">

				<?php
				$lineCount = 0;
				if(isset($uniform_comments)){
						foreach ($uniform_comments as $comment0) {
							if($comment0!=''){
								echo '- '.$comment0;
								echo "<br/>";
								$lineCount++;
								$lineCount += intval((strlen($comment0)+2)/75);
								if($lineCount >= 60){
									$lineCount = 0;
									echo '</div>
										</div>
										
										<div class="page-break">
										</div>
										<div class="table-div has-border" style="margin: 0px;">
											<div class="table-cell-div" style="width: 35%;">
												UNIFORM/APPEARANCE
											</div>	
											<div class="table-cell-div" style="width: 65%;">
									';
								}
				}}}
							  ?>
					
				</div>
			</div>
			<div class="table-div has-border" style="margin: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					HYGIENCE/GROOMING
				</div>	
				<div class="table-cell-div" style="width: 65%;">
					<?php
					if(isset($hygience_comments)){
						foreach ($hygience_comments as $comment1) {
							if($comment1!=''){
							  echo '- '.$comment1;
								echo "<br/>";
								$lineCount++;
								$lineCount += intval((strlen($comment1)+2)/75);
								if($lineCount >= 61){
									$lineCount = 0;
									echo '</div>
										</div>
										
										<div class="page-break">
										</div>
										<div class="table-div has-border" style="margin: 0px;">
										<div class="table-cell-div" style="width: 35%;">
											HYGIENCE/GROOMING
										</div>	
										<div class="table-cell-div" style="width: 65%;">
									';
								}
				}}}
							  ?>
				</div>
			</div>
			<div class="table-div has-border" style="margin: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					RESPECTFUL/TACTFUL COM.
				</div>	
				<div class="table-cell-div" style="width: 65%;">
				   <?php
				   if(isset($respectful_comments)){
						foreach ($respectful_comments as $comment2) {
							if($comment2!=''){
							  echo '- '.$comment2;
								echo "<br/>";
								$lineCount++;
								$lineCount += intval((strlen($comment2)+2)/75);
								if($lineCount >= 60){
									$lineCount = 0;
									echo '</div>
										</div>
										
										<div class="page-break">
										</div>
										<div class="table-div has-border" style="margin: 0px;">
											<div class="table-cell-div" style="width: 35%;">
												RESPECTFUL/TACTFUL COM.
											</div>	
											<div class="table-cell-div" style="width: 65%;">
									';
								}
				}}}?>
				</div>
			</div>
			<div class="table-div has-border" style="margin: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					TEAMWORK
				</div>	
				<div class="table-cell-div" style="width: 65%;">
					<?php
					if(isset($teamwork_comments)){
						foreach ($teamwork_comments as $comment3) {
							if($comment3!=''){
							   echo '- '.$comment3;
								echo "<br/>";
								$lineCount++;
								$lineCount += intval((strlen($comment3)+2)/75);
								if($lineCount >= 60){
									$lineCount = 0;
									echo '</div>
										</div>
										
										<div class="page-break">
										</div>
										<div class="table-div has-border" style="margin: 0px;">
											<div class="table-cell-div" style="width: 35%;">
												TEAMWORK
											</div>	
											<div class="table-cell-div" style="width: 65%;">
									';
								}
				}}}?>
				</div>
			</div>
			<div class="table-div has-border" style="margin: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					ADAPTABILITY
				</div>	
				<div class="table-cell-div" style="width: 65%;">  
					<?php
					if(isset($adaptability_comments)){
						foreach ($adaptability_comments as $comment4) {
							if($comment4!=''){
							   echo '- '.$comment4;
								echo "<br/>";
								$lineCount++;
								$lineCount += intval((strlen($comment4)+2)/75);
								if($lineCount >= 60){
									$lineCount = 0;
									echo '</div>
										</div>
										
										<div class="page-break">
										</div>
										<div class="table-div has-border" style="margin: 0px;">
											<div class="table-cell-div" style="width: 35%;">
												ADAPTABILITY
											</div>	
											<div class="table-cell-div" style="width: 65%;">  
									';
								}
				}}}?>
				</div>
			</div>
			<div class="table-div has-border" style="margin: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					DEPENDABILITY
				</div>	
				<div class="table-cell-div" style="width: 65%;">       
					<?php
					if(isset($dependability_comments)){
						foreach ($dependability_comments as $comment5) {
							if($comment5!=''){
							  echo '- '.$comment5;
								echo "<br/>";
								$lineCount++;
								$lineCount += intval((strlen($comment5)+2)/75);
								if($lineCount >= 60){
									$lineCount = 0;
									echo '</div>
										</div>
										
										<div class="page-break">
										</div>
										<div class="table-div has-border" style="margin: 0px;">
											<div class="table-cell-div" style="width: 35%;">
												DEPENDABILITY
											</div>	
											<div class="table-cell-div" style="width: 65%;">       
									';
								}
				}}}
							  ?>						
				</div>
			</div>
			
			<div class="table-div has-border" style="margin: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					ATTENTION TO SAFETY
				</div>	
				<div class="table-cell-div" style="width: 65%;">
				<?php
				if(isset($attention_to_safety_comments)){
						foreach ($attention_to_safety_comments as $comment6) {
							if($comment6!=''){
							 echo '- '.$comment6;
								echo "<br/>";
								$lineCount++;
								$lineCount += intval((strlen($comment6)+2)/75);
								if($lineCount >= 60){
									$lineCount = 0;
									echo '</div>
										</div>
										
										<div class="page-break">
										</div>
										<div class="table-div has-border" style="margin: 0px;">
											<div class="table-cell-div" style="width: 35%;">
												ATTENTION TO SAFETY
											</div>	
											<div class="table-cell-div" style="width: 65%;">
									';
								}
				}}}
							  ?>
				</div>
			</div>
			
			<div class="table-div has-border" style="margin: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					INTEGRITY/ETHICS
				</div>	
				<div class="table-cell-div" style="width: 65%;">
				<?php
				if(isset($integrity_comments)){
						foreach ($integrity_comments as $comment7) {
							if($comment7!=''){
							  echo '- '.$comment7;
								echo "<br/>";
								$lineCount++;
								$lineCount += intval((strlen($comment7)+2)/75);
								if($lineCount >= 60){
									$lineCount = 0;
									echo '</div>
										</div>
										
										<div class="page-break">
										</div>
										<div class="table-div has-border" style="margin: 0px;">
											<div class="table-cell-div" style="width: 35%;">
												INTEGRITY/ETHICS
											</div>	
											<div class="table-cell-div" style="width: 65%;">
									';
								}
				}}}
							  ?>
				</div>
			</div>
			<div class="table-div has-border" style="margin: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					ABILITY TO TOLERATE STRESS
				</div>	
				<div class="table-cell-div" style="width: 65%;">
				<?php
				if(isset($ability_to_tolerate_stress_comments)){
						foreach ($ability_to_tolerate_stress_comments as $comment8) {
							if($comment8!=''){
							  echo '- '.$comment8;
								echo "<br/>";
								$lineCount++;
								$lineCount += intval((strlen($comment8)+2)/75);
								if($lineCount >= 60){
									$lineCount = 0;
									echo '</div>
										</div>
										
										<div class="page-break">
										</div>
										<div class="table-div has-border" style="margin: 0px;">
											<div class="table-cell-div" style="width: 35%;">
												ABILITY TO TOLERATE STRESS
											</div>	
											<div class="table-cell-div" style="width: 65%;">
									';
								}
				}}}
							  ?>
				</div>
			</div>
			<div class="table-div has-border" style="margin: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					DECISION-MAKING
				</div>	
				<div class="table-cell-div" style="width: 65%;">
				<?php
				if(isset($decision_making_comments)){
						foreach ($decision_making_comments as $comment9) {
							if($comment9!=''){
							 echo '- '.$comment9;
								echo "<br/>";
								$lineCount++;
								$lineCount += intval((strlen($comment9)+2)/75);
								if($lineCount >= 60){
									$lineCount = 0;
									echo '</div>
										</div>
										
										<div class="page-break">
										</div>
										<div class="table-div has-border" style="margin: 0px;">
											<div class="table-cell-div" style="width: 35%;">
												DECISION-MAKING
											</div>	
											<div class="table-cell-div" style="width: 65%;">
									';
								}
				}}}
							  ?>
				</div>
			</div>
			<div class="table-div has-border" style="margin: 0px;">
				<div class="table-cell-div" style="width: 35%;">
					ASSERTIVENESS
				</div>	
				<div class="table-cell-div" style="width: 65%;">
				<?php
				if(isset($assertiveness_comments)){
						foreach ($assertiveness_comments as $comment10) {
							if($comment10!=''){
							echo '- '.$comment10;
								echo "<br/>";
								$lineCount++;
								$lineCount += intval((strlen($comment10)+2)/75);
								if($lineCount >= 60){
									$lineCount = 0;
									echo '</div>
										</div>
										
										<div class="page-break">
										</div>
										<div class="table-div has-border" style="margin: 0px;">
											<div class="table-cell-div" style="width: 35%;">
												ASSERTIVENESS
											</div>	
											<div class="table-cell-div" style="width: 65%;">
									';
								}
				}}}
							  ?>
				</div>
			</div>
			<div class="table-div has-border" style="margin: 0px 0px 20px 0px;">
				<div class="table-cell-div" style="width: 35%;">
					GENERAL COMMENTS
				</div>	
				<div class="table-cell-div" style="width: 65%;">
				<?php
				if(isset($general_comments)){
						foreach ($general_comments as $comment11) {
							if($comment11!=''){
							echo '- '.$comment11;
								echo "<br/>";
								$lineCount++;
								$lineCount += intval((strlen($comment11)+2)/75);
								if($lineCount >= 60){
									$lineCount = 0;
									echo '</div>
										</div>
										
										<div class="page-break">
										</div>
										<div class="table-div has-border" style="margin: 0px;">
											<div class="table-cell-div" style="width: 35%;">
												GENERAL COMMENTS
											</div>	
											<div class="table-cell-div" style="width: 65%;">
									';
								}
				}}}
				?>			
				</div>
			</div>
		</div>
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
</div>