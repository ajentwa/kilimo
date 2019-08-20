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

use Illuminate\Support\Facades\Route;

Route::get('/','HomeController@index');
Route::post('register','Auth\RegisterController@create');
Route::get('dashboard','Auth\LoginController@dashboard');

Route::get('cr','TempController@createRegion');
Route::get('cd','TempController@createDistrict');
Route::get('cw','TempController@createWards');

//Regions
Route::get('region', 'Setups\RegionsController@index');
Route::post('region/store', 'Setups\RegionsController@store');
Route::get('region/edit/{id}', 'Setups\RegionsController@edit');
Route::post('region/update', 'Setups\RegionsController@update');
Route::get('region/delete/{id}', 'Setups\RegionsController@destroy');

//District
Route::get('district/index/{id}', 'Setups\DistrictsController@index');
Route::post('district/store', 'Setups\DistrictsController@store');
Route::get('district/edit/{id}', 'Setups\DistrictsController@edit');
Route::post('district/update', 'Setups\DistrictsController@update');
Route::get('district/fetch', 'Setups\DistrictsController@fetch');
Route::get('district/delete/{id}', 'Setups\DistrictsController@destroy');

//Wards
Route::get('ward/index/{id}', 'Setups\WardsController@index');
Route::post('ward/store', 'Setups\WardsController@store');
Route::get('ward/edit/{id}', 'Setups\WardsController@edit');
Route::post('ward/update', 'Setups\WardsController@update');
Route::get('ward/delete/{id}', 'Setups\WardsController@destroy');

//Ajax Routes
Route::get('ajax/district/', 'Setups\DistrictsController@getDistricts');
Route::get('ajax/ward/', 'Setups\WardsController@getWards');
