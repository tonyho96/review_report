<?php
/**
 * Created by PhpStorm.
 * User: hoduo
 * Date: 5/8/2018
 * Time: 23:46
 */

namespace App\Services;


use App\User;
use PDF;

class ExportService {
	public static function getSumaryReview($revieweeId) {
		$reviewee = User::find($revieweeId);
		$reviews  = $reviewee->reviews;

		$scores = [
			'uniform'                    => 0,
			'hygience'                   => 0,
			'respectful'                 => 0,
			'teamwork'                   => 0,
			'adaptability'               => 0,
			'dependability'              => 0,
			'attention_to_safety'        => 0,
			'integrity'                  => 0,
			'ability_to_tolerate_stress' => 0,
			'decision_making'            => 0,
			'assertiveness'              => 0,
		];
		$comments = [
			'uniform_comment' => [],
			'hygience_comment' => [],
			'respectful_comment' => [],
			'teamwork_comment' => [],
			'adaptability_comment' => [],
			'dependability_comment' => [],
			'attention_to_safety_comment' => [],
			'integrity_comment' => [],
			'ability_to_tolerate_stress_comment' => [],
			'decision_making_comment' => [],
			'assertiveness_comment' => [],
		];

		foreach ( $reviews as $review ) {
			foreach ( $scores as $key => $value ) {
				$scores[ $key ] += $review->{$key};
			}
			foreach ($comments as $key => $value) {
				$comments[$key][] = $review->{$key};
			}
		}

		foreach ( $scores as $key => $value ) {
			if ( !$reviews->count() ) {
				$scores[ $key ] = 0;
			} else {
				$scores[ $key ] /= count( $reviews );
				$scores[ $key ] = number_format($scores[ $key ], 1);
			}
		}

		$recruit_firstname = $reviewee->firstname;
		$recruit_lastname = $reviewee->lastname;
		$result =  compact('recruit_firstname', 'recruit_lastname');

		$totalScore = 0;
		foreach ($scores as $key => $score) {
			$result["review_$key"] = $score;
			$totalScore += $score;
		}

		foreach ($comments as $key => $comment) {
			$result["{$key}s"] = $comment;
		}

		$result['review_average_score'] = number_format($totalScore / 11, 1);

		return $result;
	}

	public static function exportReviewee($revieweeId, $additionalData = []) {
		$reviewee = User::find($revieweeId);

		$data = self::getSumaryReview($revieweeId);
		$data = array_merge($data, $additionalData);
		$pdf = PDF::loadView('pdf.pdf-template', $data);

		$fileName = str_replace(" ", "_" , $reviewee->fullname()) . "_" . time() . ".pdf";
		$filePath = public_path("pdf/$fileName");
		$pdf->setPaper('a4')->save($filePath);

		return compact('fileName', 'filePath');
	}
}