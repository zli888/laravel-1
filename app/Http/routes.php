<?php

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
/*
// 认证路由...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('admin','Admin\AdminController@index');
Route::get('admin/login','Admin\LoginController@getLogin');
Route::post('admin/login','Admin\LoginController@postLogin');
Route::get('admin/logout','Admin\LoginController@logout');

Route::resource('admin/type','Admin\conTypeController');
Route::resource('admin/arc','Admin\conArcController');
Route::resource('admin/menu','Admin\AdminMenuController');
*/
$admin = [
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'admin',

];

Route::group($admin, function () {
	//登录
    Route::controller('auth', 'AuthController');
    //首页
    Route::resource('home' , 'HomeController');
    //菜单    
	Route::resource('menu', 'MenuController');
	Route::controller('menu', 'MenuController');
	
});