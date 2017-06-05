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
	Route::get('lists', function() {
		$projects = Project::all();
		$customers = Customer::all();

		return [
			'projects' => $projects,
			'customers' => $customers
		];
	});
	Route::post('claims_many', 'ClaimHeaderController@bulk');
	Route::post('claims/headers', 'ClaimController@postHeader');
	Route::post('claims/headers/{trx_id}', 'ClaimController@postDetails');
	Route::post('absence', 'AbsenceController@bulkUpdate');
});


Route::get('/', function () {
    return "";
});






