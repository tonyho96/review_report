<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
     
        return view('profile/index', compact('user'));
    }

    public function ChangeUserProfile(Request $request)
    {
        $user = Auth::user();

        $user->update($request->all());
        return redirect('profile');
    }
}
