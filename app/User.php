<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id', 'firstname','lastname', 'email', 'role', 'year', 'module', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin() {
    	return $this->role == config('user.role.admin');
    }

	public function isRecruit() {
		return $this->role == config('user.role.recruit');
	}

	/*
	 *  reviews which I have been reviewed
	 */
	public function reviews() {
    	return $this->hasMany('App\Review', 'reviewee', 'id');
	}

	public function fullname() {
		return $this->firstname . " " . $this->lastname;
	}
}
