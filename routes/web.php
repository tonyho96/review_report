<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Review;
use App\User;

Route::get('/', function () {
	return redirect('/dashboard');
});

Auth::routes();

Route::group( [ 'middleware' => 'auth' ], function () {
    Route::get('/dashboard', 'HomeController@index')->name('home');

    Route::resource('users', 'UsersController');
    Route::post('users/{id}', [
        'uses' => 'UsersController@disableUser'
    ]);
    Route::post('usersE/{id}', [
        'uses' => 'UsersController@enableUser'
    ]);
    Route::get('restore/{id}', [
        'uses' => 'UsersController@restore'
    ]);
    Route::get('/export-user', 'UsersController@exportCSV');

	Route::post('export/pdf','PDFController@exportPDF');
	Route::post('export/pdf-multiple','PDFController@exportPDFMultiple');
	Route::resource('exports', 'ExportsController');
	Route::post('exports/multiple-review','ExportsController@multipleReview');

    Route::get('/review-recruits', 'ReviewsController@indexUser');
    Route::resource('reviews', 'ReviewsController');

    Route::resource('settings', 'SettingsController');

    Route::get('/change-password', 'ChangePasswordController@index')->name('change-password');
	Route::post('/change-password', 'ChangePasswordController@ChangeUserPassword')->name('change-password');

	Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile', 'ProfileController@ChangeUserProfile')->name('profile');
});

// Route::get('/pdf/{id}', function($id) {
//     $review = Review::findOrFail($id);
//     $recruit = User::findOrFail($review->reviewee);
//     $reviewer = User::findOrFail($review->reviewer);
//     $pdf = PDF::loadView('pdf.pdf-template',['review'=>$review, 'recruit'=>$recruit, 'reviewer'=>$reviewer]);
//     return $pdf->setPaper('a4')->download('test_pdf.pdf');
// });