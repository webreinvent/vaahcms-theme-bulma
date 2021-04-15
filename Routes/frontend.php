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

Route::group(
    [
        'prefix'     => '/',
        'middleware' => ['web'],
        'namespace' => 'Frontend',
    ],
    function () {
        //------------------------------------------------
        Route::get( '/', 'FrontendController@index' )
        ->name( 'vh.frontend.bulmablogtheme' );
        //------------------------------------------------
    });


Route::group(
    [
        'prefix' => '/',
        'middleware' => ['web'],
        'namespace' => 'Frontend',
    ],
    function () {
        //------------------------------------------------
        Route::get('/search-result', 'FrontendController@searchResult')
            ->name('vh.frontend.search-result');
        //------------------------------------------------
    });

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

Route::group(
    [
        'prefix' => '/',
        'middleware' => ['web'],
        'namespace' => 'Frontend',
    ],
    function () {
        //------------------------------------------------
        Route::get('/', 'FrontendController@index')
            ->name('vh.frontend.bulmablogtheme');
        //------------------------------------------------
    });

Route::group(
    [
        'prefix' => '/ajax/',
        'middleware' => ['web'],
        'namespace' => 'Frontend',
    ],
    function () {
        //------------------------------------------------
        Route::post('/getBlogList', 'AjaxController@getBLogList')
            ->name('vh.frontend.ajax.getBlogList');
        //------------------------------------------------
    });
