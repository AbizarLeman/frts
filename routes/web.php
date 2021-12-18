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

    Route::get('/company/edit/{id}', "CompanyController@edit");
    Route::post('/company/update/{id}',"CompanyController@update");
    Route::get('/company/destroy/{id}',"CompanyController@destroy");

    // Output section
    Route::get('/output',"AgriculturalOutputController@getOutputType");
    Route::get('/output/create/{selection}',"AgriculturalOutputController@create");
    Route::post('/output/store/',"AgriculturalOutputController@store");
});

Route::group(['middleware' => ['auth', 'admin']], function() {
    // Report section
    Route::get('/report/index',"OutputReportController@index");
    Route::get('/report/report-index',"OutputReportController@reportIndex");
    Route::get('/report/filter',"OutputReportController@getFilteredList");
    Route::get('/report/report-view/{id}',"OutputReportController@reportView");
    Route::post('/report/view',"OutputReportController@buildTable");
    Route::post('/report/store/',"OutputReportController@store");
});
