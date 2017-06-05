<?php

use Illuminate\Http\Request;
use App\Customer;
use App\Project;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('lists', function() {
	$projects = Project::all();
	$customers = Customer::all();

	return [
		'projects' => $projects,
		'customers' => $customers
	];
});

// API Group Routes
Route::group(array('prefix' => 'api/v1', 'middleware' => []), function () {

	Route::post('claims_many', 'ClaimHeaderController@bulkUpdate');
	Route::post('claims/headers', 'ClaimController@postHeader');
	Route::post('claims/headers/{trx_id}', 'ClaimHeader@postDetails');
	Route::post('absence', 'AbsenceController@bulkUpdate');
});



/**
 * GET /lists.json
 *
 * {
 * 	projects: [
 * 		{project_number: 1, project_name: "BCA Finance Akses", total_jarak: 35},
 * 		{project_number: 2, project_name: "FIF Group Bravo", total_jarak: 35},
 * 		...
 * 		{project_number: 150, project_name: "Tiki Charlie", total_jarak: 35}
 * 	],
 * 	customers: [
 * 		{customer_code: 1, customer_name: "BCA", total_jarak: 45},
 *   	{customer_code: 2, customer_name: "FIF Group", total_jarak: 45},
 *   	...
 *   	{customer_code: 100, customer_name: "Tiki", total_jarak: 45},
 * 	]
 * 
 * }
 */

/**
 * POST /claims_many.json
 *
 * {	
 * 		[
 * 		toll_total_distance: 40,
 * 		client_code: '333eee',
 * 		activity_code: "sales",	
 * 		mileage: "",
 * 		parking: "",
 * 		meal: "",
 * 		created_by: "Norman",
 * 		details: [
 * 			{taxi_total_distance: 20, taxi_voucher: "123abc", taxi_time: "20 min"},
 * 			{taxi_total_distance: 30, taxi_voucher: "456def", taxi_time: "30 min"}
 * 		 ],
 * 		[
 * 		toll_total_distance: 30,
 * 		client_code: '444aaa',
 * 		activity_code: "project",	
 * 		mileage: "",
 * 		parking: "",
 * 		meal: "",
 * 		created_by: "Norman",
 * 		details: [
 * 			{taxi_total_distance: 40, taxi_voucher: "666aaa", taxi_time: "40 min"},
 * 		 	]
 * 		]
 * 
 * }
 */

/**
 * POST /claims/headers.json
 *
 * {	
 * 		trx_id: 321,
 * 		employee_number: 2,
 * 		toll_total_distance: 40,
 * 		activity_code: "BCA FINANCE",	
 *   	taxi_total_distance: 40
 * }
 */

/**
 * POST /claims/headers/{trx_id}.json
 *
 * {	
 * 		details: [
 * 			{taxi_total_distance: 40, taxi_voucher: "123abc"},
 * 			{taxi_total_distance: 40, taxi_voucher: "456def"}
 * 		 ]
 * 
 * }
 */

/**
 * POST /absence_many.json
 *
 * 	{
 * 		absences: [
 *	 		{
 *	 			project_number: 2,
 *	 			status: 1,
 *		 		date_from: 27-01-2017,
 *	 			date_to: 01-02-2017,
 *	  		},
 *	  		{
 *	  	 		project_number: 3,
 *	  		  	status: 2,
 *	  	 	 	date_from: 27-02-2017,
 *	  	 	 	date_to: 01-03-2017
 *	    	}
 * 	    ]
 * 	}
 *
 *
 * 
 */