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

Route::get('/', ['uses' => 'Controller@homepage']);


Route::get('cadastro', ['uses' => 'Controller@cadastro']);

Route::get('moviment', ['as' => 'moviment.application', 'uses' => 'MovimentsController@application']);
Route::post('moviment', ['as' => 'moviment.application.store', 'uses' => 'MovimentsController@storeApplication']);
Route::get('user/moviment', ['as' => 'moviment.index', 'uses' => 'MovimentsController@index']);
Route::get('moviment/all', ['as' => 'moviment.all', 'uses' => 'MovimentsController@all']);

Route::get('getback', ['as' => 'moviment.getback', 'uses' => 'MovimentsController@getback']);
Route::post('getback', ['as' => 'moviment.getback.store', 'uses' => 'MovimentsController@storeGetback']);

/*
| Routes to user auth
|--------------------------------------------------------------------------
*/
Route::get('login', ['uses' => 'Controller@fazerLogin']);

//designate route: as user.login
Route::post('login', ['as' => 'user.login', 'uses' => 'DashboardController@auth']);

//designate route: as user.dashboard
Route::get('dashboard', ['as' => 'user.dashboard', 'uses' => 'DashboardController@index']);

Route::resource('user', 'UsersController');

/*
| Routes to institution
|--------------------------------------------------------------------------
*/

Route::resource('institution', 'InstitutionsController');

/*
| Routes to group
|--------------------------------------------------------------------------
*/
                          
Route::resource('group', 'GroupsController');

Route::post('group/{group_id}/user', ['as' => 'group.user.store', 'uses' => 'GroupsController@userStore']);

Route::resource('institution.product', 'ProductsController');
