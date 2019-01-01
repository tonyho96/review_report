<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Review;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
	    abort_if (Gate::denies('is_admin'), 403, 'Unauthorized action.');

	    $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $reviews = Review::where('uniform', 'LIKE', "%$keyword%")
                ->orWhere('uniform_comment', 'LIKE', "%$keyword%")
                ->orWhere('hygience', 'LIKE', "%$keyword%")
                ->orWhere('hygience_comment', 'LIKE', "%$keyword%")
                ->orWhere('respectful', 'LIKE', "%$keyword%")
                ->orWhere('respectful_comment', 'LIKE', "%$keyword%")
                ->orWhere('teamwork', 'LIKE', "%$keyword%")
                ->orWhere('teamwork_comment', 'LIKE', "%$keyword%")
                ->orWhere('adaptability', 'LIKE', "%$keyword%")
                ->orWhere('adaptability_comment', 'LIKE', "%$keyword%")
                ->orWhere('dependability', 'LIKE', "%$keyword%")
                ->orWhere('dependability_comment', 'LIKE', "%$keyword%")
                ->orWhere('attention_to_safety', 'LIKE', "%$keyword%")
                ->orWhere('attention_to_safety_comment', 'LIKE', "%$keyword%")
                ->orWhere('integrity', 'LIKE', "%$keyword%")
                ->orWhere('integrity_comment', 'LIKE', "%$keyword%")
                ->orWhere('ability_to_tolerate_stress', 'LIKE', "%$keyword%")
                ->orWhere('ability_to_tolerate_stress_comment', 'LIKE', "%$keyword%")
                ->orWhere('decision_making', 'LIKE', "%$keyword%")
                ->orWhere('decision_making_comment', 'LIKE', "%$keyword%")
                ->orWhere('assertiveness', 'LIKE', "%$keyword%")
                ->orWhere('assertiveness_comment', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $reviews = Review::paginate($perPage);
        }
        return view('reviews.index', compact('reviews'));
    }

    public function indexUser()
    {
	    abort_if (Gate::denies('is_recruit'), 403, 'Unauthorized action.');
	    return view('reviews.indexUser');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
    	$revieweeId = $request->get('reviewee');
    	if ($revieweeId == Auth::user()->id)
    		return redirect("/dashboard")->with(['error' => "Invalid action"]);

    	$existingReview = Review::where('reviewer', Auth::user()->id)->where('reviewee', $revieweeId)->first();
    	if ($existingReview) {
    		return redirect()->action('ReviewsController@edit', $existingReview->id);
	    }

    	$reviewee    = User::find($revieweeId);

        return view('reviews.create', compact('reviewee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {   
        $inputs = $request->all();

        if (!Auth::user()->isAdmin()) {
	        $inputs['reviewer'] = Auth::user()->id;
        }

        $validator = $this->validatorRequired( $inputs );
        if ($validator->fails()) {
            return redirect('reviews/create')->withErrors($validator)->withInput( $inputs );
        }

        Review::create($inputs);

        if (Auth::user()->isAdmin()) {
	        return redirect( 'reviews' )->with( 'message', 'Review added!' );
        }

        return redirect( 'review-recruits' )->with( 'message', 'Review completed!' );

    }

    private function validatorRequired($data) {
        return Validator::make($data, [ 
            'reviewer' => 'required',
            'reviewee' => 'required',
            'uniform' => 'required',
            'hygience' => 'required',
            'respectful' => 'required',
            'teamwork' => 'required',
            'adaptability' => 'required',
            'dependability' => 'required',
            'attention_to_safety' => 'required',
            'integrity' => 'required',
            'ability_to_tolerate_stress' => 'required',
            'decision_making' => 'required',
            'assertiveness' => 'required'
        ]); 
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $review = Review::findOrFail($id);

        return view('reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $review = Review::findOrFail($id);

        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
	    $review = Review::findOrFail($id);

	    $requestData = $request->all();

		if (Auth::user()->isRecruit()) {
			$requestData['reviewer'] = $review->reviewer;
		}

	    $validator = $this->validatorRequired( $requestData );
	    if ($validator->fails()) {
		    return redirect()->back()->withErrors($validator)->withInput( $requestData );
	    }

        $review->update($requestData);

	    if (Auth::user()->isAdmin())
            return redirect('reviews')->with('message', 'Review updated!');
	    return redirect('review-recruits')->with('message', 'Review updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        abort_if (Gate::denies('is_admin'), 403, 'Unauthorized action.');
        Review::destroy($id);

        return redirect('reviews')->with('flash_message', 'Review deleted!');
    }
}
