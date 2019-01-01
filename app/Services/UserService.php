<?php
namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserService {
	public static function getOtherRecruit() {
		$users = User::where('role', config('user.role.recruit'))->where('id', '<>', Auth::user()->id)->get();
		return $users;
	}
}