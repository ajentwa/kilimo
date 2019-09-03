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

Route::get('/','HomeController@index')->name('login');
Route::post('register','Auth\RegisterController@create');
Route::post('login','Auth\LoginController@userLogin');
Route::get('logout','Auth\LoginController@userLogout');
Route::get('dashboard','Auth\LoginController@dashboard');

Route::get('cr','TempController@createRegion');
Route::get('cd','TempController@createDistrict');
Route::get('cw','TempController@createWards');

//Users
Route::get('users', 'Setups\UsersController@index');
Route::post('users/store', 'Setups\UsersController@store');
Route::get('users/edit/{id}', 'Setups\UsersController@edit');
Route::post('users/update', 'Setups\UsersController@update');
Route::get('users/delete/{id}', 'Setups\UsersController@destroy');

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

//Units
Route::get('unit', 'Setups\UnitsController@index');
Route::post('unit/store', 'Setups\UnitsController@store');
Route::get('unit/edit/{id}', 'Setups\UnitsController@edit');
Route::post('unit/update', 'Setups\UnitsController@update');
Route::get('unit/delete/{id}', 'Setups\UnitsController@destroy');

//Crops
Route::get('crop', 'Crops\CropsController@index');
Route::post('crop/store', 'Crops\CropsController@store');
Route::get('crop/edit/{id}', 'Crops\CropsController@edit');
Route::post('crop/update', 'Crops\CropsController@update');
Route::get('crop/delete/{id}', 'Crops\CropsController@destroy');

// Crops Details
Route::get('crops_details', 'Crops\CropsdetailsController@index');

//Ajax Routes
Route::get('ajax/district/', 'Setups\DistrictsController@getDistricts');
Route::get('ajax/ward/', 'Setups\WardsController@getWards');
