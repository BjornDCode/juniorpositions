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

Route::get('/', 'JobController@index');

// Authentication Routes...
Route::get('/admin/login', [
  'as' => 'login',
  'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('/admin/login', [
  'as' => '',
  'uses' => 'Auth\LoginController@login'
]);
Route::post('/admin/logout', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@logout'
]);

Route::delete('/unlisted/{unlistedJob}', 'UnlistedJobController@destroy');

Route::get('/admin/clear-cache', 'AdminController@clearCache');
Route::get('/admin', 'AdminController@index');

Route::get('/jobs', 'JobController@index');
Route::get('/jobs/{job}', 'JobController@show');
Route::post('/jobs', 'JobController@store');

Route::get('/company/{company}', 'CompanyController@show');
Route::post('/company', 'CompanyController@store');

Route::get('/skill/{skill}', 'SkillController@show');
Route::post('/skill', 'SkillController@store');

Route::get('/location/{country}', 'CountryController@show');
Route::post('/location/country', 'CountryController@store');
Route::get('/location/{country}/{city}', 'CityController@show');
Route::post('/location/country/city', 'CityController@store');


Route::get('/{category}', 'CategoryController@show');
Route::post('/category', 'CategoryController@store');
Route::get('/{category}/{role}', 'RoleController@show');
Route::post('/category/role', 'RoleController@store');

