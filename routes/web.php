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




//route login
Route::get('login','backend\AuthController@getlogin')->name('login');
Route::post('login','backend\AuthController@postlogin')->name('postlogin');
//route logou
Route::get('logout','backend\AuthController@logout')->name('logout');
/* Route admin */


Route::group(['prefix' => 'admin','middleware'=>'LoginAdmin'], function() {
    //
    Route::get('/','backend\DashboardController@index')->name('Dashboard');


    Route::group(['prefix' => 'product'], function() {
        //
    Route::get('/','backend\ProductController@index')->name('product_index');

    Route::get('trash','backend\ProductController@trash')->name('product_trash');

    Route::post('insert','backend\ProductController@postinsert')->name('product_postinsert');
    Route::get('insert','backend\ProductController@getinsert')->name('product_getinsert');



        //update product
    Route::get('update/{id}','backend\ProductController@getupdate')->name('product_getupdate');

    Route::post('update/{id}','backend\ProductController@postupdate')->name('product_postupdate');

    Route::get('status/{id}','backend\ProductController@status')->name('product_status');

    Route::get('updatestatus/{id}','backend\ProductController@updatestatus')->name('product_updatestatus');

    Route::get('deltrash/{id}','backend\ProductController@deltrash')->name('product_deltrash');

    Route::get('retrash/{id}','backend\ProductController@retrash')->name('product_retrash');

    Route::get('delete/{id}','backend\ProductController@delete')->name('product_delete');

    //route quản lý cate

    Route::group(['prefix' => 'category'], function() {
        Route::get('/','backend\CategoryContronller@index')->nanme('category_index');
        //
    });


 });





});

//page gioi thieu
Route::get('page/gioi-thieu','page\PageController@gioithieu');
//page tin tuc
Route::get('page/lien-he','page\PageController@lienhe');
//

Route::get('/','frontend\HomeController@index')->name('user');
Route::get('san-pham','frontend\ProductController@index');
Route::get('san-pham/{slug}','frontend\ProductController@index');

Route::get('san-pham/{slug}','frontend\ProductController@category');
Route::get('{slug}','frontend\ProductController@detail');

