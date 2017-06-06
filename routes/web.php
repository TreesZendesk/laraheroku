<?php
use App\Customer;
use App\Project;
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


// API Group Routes
Route::group(array('prefix' => 'api/v1', 'middleware' => []), function () {
	Route::get('lists.json', function() {
		$projects = Project::all();
		$customers = Customer::all();

		$lists = [
			'projects' => $projects,
			'customers' => $customers
		];

		return $lists;
	});
	Route::post('claims/create_many.json', 'ClaimController@bulkCreate');
	Route::post('claims/headers.json', 'ClaimController@postHeader');
	Route::post('claims/headers/{trx_id}.json', 'ClaimController@postDetails');
	Route::post('absence.json', 'AbsenceController@bulkCreate');
});


Route::get('*', function () {
    return "unauthorized";
});






