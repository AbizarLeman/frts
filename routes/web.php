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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    // Company section
    Route::get('/company/create',"CompanyController@create");
    Route::post('/company/store/',"CompanyController@store");
    Route::get('/company',"CompanyController@show");

    // Output section
    Route::get('/output',"AgriculturalOutputController@getOutputType");
    Route::get('/output/create/{selection}',"AgriculturalOutputController@create");
    Route::post('/output/store',"AgriculturalOutputController@store");
});

Route::group(['middleware' => ['auth', 'admin']], function() {
    // Report section
    Route::get('/report/index',"ReportController@index");
});
