<?php
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']), function()
{
	Route::get('school_admins/school/{id}', 'School_admins@school'); //custom function in resource must be before you register the resource else it won't work
	Route::post('school_admins/save_school/', 'School_admins@save_school');
	Route::resource('school_admins', 'School_admins');
	Route::resource('normal_users', 'Normal_users');
});
