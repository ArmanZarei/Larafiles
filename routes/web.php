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


Route::group(['namespace' => 'Frontend', 'as' => 'front.', 'middleware' => 'last_activity'], function (){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/file/{file_id}', 'FilesController@details')->name('file.details');
    Route::get('/package/{package_id}', 'PackagesController@details')->name('package.details');
    Route::get('/plans', 'PlansController@list')->name('plans.list');
    Route::get('/plans/{plan_id}', 'PlansController@single')->name('plans.single');
    Route::post('/plans/subscribe/{plan_id}', 'PlansController@subscribe')->name('plans.subscribe');
    Route::get('/file/{file_id}/download', 'FilesController@download')->name('file.download');
    Route::post('/file/{file_id}/report', 'FilesController@report')->name('file.report');
    Route::get('/categories/{category_id}', 'CategoriesController@single')->name('categories.single');

    Route::get('/login', 'UsersController@login')->name('login')->middleware('guest');
    Route::post('/login', 'UsersController@doLogin')->name('login.action');
    Route::get('/register', 'UsersController@register')->name('register')->middleware('guest');
    Route::post('/register', 'UsersController@doRegister')->name('register.action');
    Route::get('/logout', 'UsersController@logout')->name('logout.action');
});

Route::group(['namespace' => 'Admin' , 'prefix' => 'admin' , 'as' => 'admin.' , 'middleware' => 'admin'], function (){
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'users' , 'as' => 'users.'], function (){
        Route::get('/','UsersController@list')->name('list');
        Route::get('/create','UsersController@create')->name('create');
        Route::post('/create','UsersController@store')->name('store');
        Route::get('/delete/{user_id}','UsersController@delete')->name('delete');
        Route::get('/edit/{user_id}','UsersController@edit')->name('edit');
        Route::post('/edit/{user_id}','UsersController@update')->name('update');
        Route::get('/packages/{user_id}','UsersController@packages')->name('packages');
    });

    Route::group(['prefix' => 'files' , 'as' => 'files.'], function (){
        Route::get('/','FilesController@list')->name('list');
        Route::get('/create','FilesController@create')->name('create');
        Route::post('/create','FilesController@store')->name('store');
        Route::get('/reports','FilesController@reports')->name('reports');
        Route::post('/reports/change-report-status/{report_id}', 'FilesController@changeReportStatus')->name('report.change.status');
    });

    Route::group(['prefix' => 'plans' , 'as' => 'plans.'], function (){
        Route::get('/','PlansController@list')->name('list');
        Route::get('/create','PlansController@create')->name('create');
        Route::post('/create','PlansController@store')->name('store');
        Route::get('/edit/{plan_id}','PlansController@edit')->name('edit');
        Route::post('/edit/{plan_id}','PlansController@update')->name('update');
        Route::get('/delete/{plan_id}','PlansController@delete')->name('delete');
    });

    Route::group(['prefix' => 'packages' , 'as' => 'packages.'], function (){
        Route::get('/','PackagesController@list')->name('list');
        Route::get('/create','PackagesController@create')->name('create');
        Route::post('/create','PackagesController@store')->name('store');
        Route::get('/edit/{package_id}','PackagesController@edit')->name('edit');
        Route::post('/edit/{package_id}','PackagesController@update')->name('update');
        Route::get('/delete/{package_id}','PackagesController@delete')->name('delete');
    });

    Route::group(['prefix' => 'payments' , 'as' => 'payments.'], function (){
        Route::get('/','PaymentsController@list')->name('list');
        Route::get('/delete/{payment_id}','PaymentsController@delete')->name('delete');
    });

    Route::group(['prefix' => 'categories' , 'as' => 'categories.'], function (){
        Route::get('/','CategoriesController@list')->name('list');
        Route::get('/create','CategoriesController@create')->name('create');
        Route::post('/create','CategoriesController@store')->name('store');
        Route::get('/edit/{category_id}','CategoriesController@edit')->name('edit');
        Route::post('/edit/{category_id}','CategoriesController@update')->name('update');
        Route::get('/delete/{category_id}','CategoriesController@delete')->name('delete');
    });
});