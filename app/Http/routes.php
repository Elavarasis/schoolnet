<?php
include('ela.php');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Admin area
Route::get('admin', function () {
  return redirect('/admin/home');
});

//Route::resource('cities','Admin\cities');
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']), function()
{
    Route::resource('home', 'Home');
	Route::post('countries/country_status/', 'Countries@country_status');
	Route::get('countries/states/{id}', 'Countries@states');
	Route::post('countries/state_status/', 'Countries@state_status');
	Route::resource('countries', 'Countries');
	Route::post('getstates', 'Cities@getstates');
	Route::get('cities/import', 'Cities@import');
	Route::post('cities/import_now', 'Cities@import_now');
	Route::resource('cities', 'Cities');
	Route::resource('payments', 'Payments');
	Route::resource('adverts', 'Adverts');
	Route::resource('widgets', 'Widgets');
	
	Route::post('getparents', 'Students@getparents');
	Route::post('getcities', 'School_admins@getcities');
	Route::get('newsletters', 'Newsletters@index');
	Route::post('newsletters/send/', 'Newsletters@send');
	Route::resource('categories', 'Categories');
	Route::get('courses/sub/{id}', 'Courses@sub');
	Route::resource('courses', 'Courses');
	Route::resource('events', 'Events');
});

Route::group(array('namespace' => 'Tenant', 'prefix' => 'tenant', 'middleware' => ['auth', 'tenant']), function()
{
    Route::post('getstates', 'Home@getstates');
	Route::post('getcities', 'Home@getcities');
	Route::post('home/save_school/', 'Home@save_school');
	Route::post('home/save_profile/', 'Home@save_profile');
	Route::post('home/reset_password/', 'Home@reset_password');
	Route::resource('home', 'Home');
	Route::get('events/downloadExcel/{type}', 'Events@downloadExcel');
	Route::resource('events', 'Events');
	Route::resource('calendars', 'Calendars');
	Route::post('leaves/update_status/', 'Leaves@update_status');
	Route::resource('leaves', 'Leaves');
	
	Route::get('attendances/import', 'Attendances@import');
	Route::post('attendances/import_now', 'Attendances@import_now');
	Route::get('attendances/search', 'Attendances@search');
	Route::get('attendances/export', 'Attendances@export');
	Route::resource('attendances', 'Attendances');
	
	Route::get('marks/import', 'Marks@import');
	Route::post('marks/import_now', 'Marks@import_now');
	Route::get('marks/search', 'Marks@search');
	Route::get('marks/export', 'Marks@export');
	Route::resource('marks', 'Marks');
	
	Route::get('courses/sub/{id}', 'Courses@sub');
	Route::resource('courses', 'Courses');
	
	Route::resource('normal_users', 'Normal_users');
	Route::resource('parents', 'SN_Parents');
	Route::resource('students', 'Students');
	Route::resource('teachers', 'Teachers');
	
	Route::get('fee/assign_fee', 'Fees@assign_fee');
	Route::post('fee/add_batch/', 'Fees@add_batch');
	Route::post('fee/remove_batch/', 'Fees@remove_batch');
	Route::post('fee/add_single/', 'Fees@add_single');
	Route::post('fee/remove_single/', 'Fees@remove_single');
	Route::get('fee/pay_fee/', 'Fees@pay_fee');
	Route::post('fee/pay_batch/', 'Fees@pay_batch');
	Route::post('fee/unpay_batch/', 'Fees@unpay_batch');
	Route::post('fee/pay_single/', 'Fees@pay_single');
	Route::post('fee/unpay_single/', 'Fees@unpay_single');
	Route::resource('fee', 'Fees');
});


Route::group(array('namespace' => 'Student', 'prefix' => 'stud', 'middleware' => ['auth', 'student']), function()
{
    Route::post('getstates', 'Home@getstates');
	Route::post('getcities', 'Home@getcities');
	Route::post('home/save_profile/', 'Home@save_profile');
	Route::post('home/reset_password/', 'Home@reset_password');
	Route::resource('home', 'Home');
	Route::resource('leaves', 'Leaves');
	
	Route::get('marks/import', 'Marks@import');
	Route::post('marks/import_now', 'Marks@import_now');
	Route::get('marks/search', 'Marks@search');
	Route::get('marks/export', 'Marks@export');
	Route::resource('marks', 'Marks');
	
});

/*
Sample routings#

// route–model binding
Route::model('item', 'Item');

// public routes
Route::resource('item', 'ItemController', array('only' => array('index', 'show')));

// admin routes
Route::group(array('prefix' => 'admin'), function()
{
    Route::resource('item', 'ItemController');
});


http://example.com/item
http://example.com/item/{item}
http://example.com/admin/item
http://example.com/admin/item/create
http://example.com/admin/item/{item}/edit

*/
Route::auth();

Route::get('/home', 'HomeController@index');