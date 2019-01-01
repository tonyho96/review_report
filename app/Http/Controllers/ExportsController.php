<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Services\SettingService;
use App\Settings;
use Illuminate\Http\Request;
use App\User;
use App\Review;

class ExportsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index( Request $request ) {
		$year    = $request->get( 'year' );
		$module  = $request->get( 'module' );
		$perPage = 25;

		if ( ! empty( $year ) && ! empty( $module ) ) {
			$users = User::where( 'year', 'LIKE', "%$year%" )->where( 'module', 'LIKE', "%$module%" )
			             ->paginate( $perPage );
		} else {
			$users = null;
		}

		return view( 'exports.index', compact( 'users', 'year', 'module' ) );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\View\View
	 */
	public function show( $id ) {
		$reviewee = User::where( 'id', $id )->first();
		$reviews  = $reviewee->reviews;
		$settings = SettingService::getAllSettings();

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
            'attendance'                 => 0,
		];
		$comment = [
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
			'general_comments' => []
		];
		
		
		foreach ( $reviews as $review ) {
			foreach ( $scores as $key => $value ) {
				$scores[ $key ] += $review->{$key};
			}
			foreach ($comment as $key => $value) {
				array_push($comment[$key],$review->{$key});
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
		
		return view( 'exports.show', compact( 'scores', 'settings', 'reviewee', 'comment' ) );
	}

	public function multipleReview(Request $request) {
		$settings = SettingService::getAllSettings();
		$revieweeIds = $request->get('reviewerIds');
		return view( 'exports.show_multiple', compact( 'settings', 'revieweeIds' ) );
	}
}
