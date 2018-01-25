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

Route::get('/job/{job}', 'JobController@show');

Route::get('/company/{company}', 'CompanyController@show');

Route::get('/skill/{skill}', 'SkillController@show');

Route::get('/location/{country}', 'CountryController@show');
Route::get('/location/{country}/{city}', 'CityController@show');

Route::get('/{category}', 'CategoryController@show');
