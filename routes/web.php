<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::put('/update', 'HomeController@update')->name('home.update');
Route::get('/scopus', 'HomeController@scopus')->name('home.scopus.index');

Route::group(['prefix' => 'scopus', 'middleware' => 'auth'], function(){
    Route::post('/article', 'Api\ScopusController@article');
    // Route::post('/proceeding', 'Api\ScopusController@proceeding');
});

Route::group(['prefix' => 'scheduled'], function(){
    Route::get('/', 'ScheduledUpdateController@index')->name('scheduled.index');
    Route::post('/clear', 'ScheduledUpdateController@clear')->name('scheduled.clear');
    Route::put('/', 'ScheduledUpdateController@update')->name('scheduled.update');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function ()
{
    Route::prefix('dashboard')->name('dashboard.')->group(function ()
    {
        Route::get('/', 'Admin\DashboardController@index')->name('index');
        Route::get('/{dashboard}', 'Admin\DashboardController@show')->name('show');
        Route::post('/', 'Admin\DashboardController@store')->name('store');
        Route::put('/{dashboard}', 'Admin\DashboardController@update')->name('update');
        Route::put('/{dashboard}/activate', 'Admin\DashboardController@activate')->name('activate');
        Route::delete('/{dashboard}', 'Admin\DashboardController@destroy')->name('delete');
    });
});

Route::get('/', 'DashboardController@index')->name('dashboard.index');
Route::get('/{dashboard}', 'DashboardController@show')->name('dashboard.show');