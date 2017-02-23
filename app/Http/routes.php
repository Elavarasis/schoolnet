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
	Route::resource('cities', 'Cities');
	Route::resource('students', 'Students');
	Route::resource('payments', 'Payments');
	Route::resource('adverts', 'Adverts');
	Route::resource('widgets', 'Widgets');
	Route::post('getstates', 'Cities@getstates');
	Route::post('getcities', 'School_admins@getcities');
	Route::get('newsletters', 'Newsletters@index');
	Route::post('newsletters/send/', 'Newsletters@send');
	
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