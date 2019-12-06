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




//route login user
Route::get('loginuser', 'backend\LoginUser@getdangnhap')->name('loginuser');
Route::post('loginuser', 'backend\LoginUser@postdangnhap')->name('postloginuser');
Route::get('dangxuat', 'backend\LoginUser@dangxuat')->name('dangxuat');


//route login
Route::get('login', 'backend\AuthController@getlogin')->name('login');
Route::post('login', 'backend\AuthController@postlogin')->name('postlogin');
//route logou
Route::get('logout', 'backend\AuthController@logout')->name('logout');

//page gioi thieu
Route::get('page/gioi-thieu', 'page\PageController@gioithieu');
//page lien he
Route::get('page/lien-he', 'page\PageController@lienhe');
//

Route::get('/', 'frontend\HomeController@index')->name('user');
Route::get('san-pham', 'frontend\ProductController@index');
Route::get('san-pham/{slug}', 'frontend\ProductController@index');

Route::get('san-pham/{slug}', 'frontend\ProductController@category');
Route::get('{slug}', 'frontend\ProductController@detail');
//page tin tuc
Route::get('page/tin-tuc', 'page\PageController@tintuc')->name('tintuc');
Route::get('page/tin-tuc/{slug}', 'page\PageController@detail');
/* Route admin */


Route::group(['prefix' => 'admin', 'middleware' => 'LoginAdmin'], function () {
    //
    Route::get('/', 'backend\DashboardController@index')->name('Dashboard');


    Route::group(['prefix' => 'product'], function () {
        //
        Route::get('/', 'backend\ProductController@index')->name('product_index');

        Route::get('trash', 'backend\ProductController@trash')->name('product_trash');

        Route::post('insert', 'backend\ProductController@postinsert')->name('product_postinsert');
        Route::get('insert', 'backend\ProductController@getinsert')->name('product_getinsert');



        //update product
        Route::get('update/{id}', 'backend\ProductController@getupdate')->name('product_getupdate');

        Route::post('update/{id}', 'backend\ProductController@postupdate')->name('product_postupdate');

        Route::get('status/{id}', 'backend\ProductController@status')->name('product_status');

        Route::get('updatestatus/{id}', 'backend\ProductController@updatestatus')->name('product_updatestatus');

        Route::get('deltrash/{id}', 'backend\ProductController@deltrash')->name('product_deltrash');

        Route::get('retrash/{id}', 'backend\ProductController@retrash')->name('product_retrash');

        Route::get('delete/{id}', 'backend\ProductController@delete')->name('product_delete');
    });
    //route quản lý cate
    Route::group(['prefix' => 'admin', 'middleware' => 'LoginAdmin'], function () {
        Route::get('/', 'backend\DashboardController@index')->name('Dashboard');
        Route::group(['prefix' => 'category'], function () {

            Route::get('/', 'backend\CategoryController@index')->name('index_category');

            Route::get('insert', 'backend\CategoryController@getinsert')->name('category_getinsert');
            Route::post('insert', 'backend\CategoryController@postinsert')->name('category_postinsert');

            //update status
            Route::get('status/{id}', 'backend\CategoryController@status')->name('category_status');

            Route::get('updatestatus/{id}', 'backend\CategoryController@updatestatus')->name('category_updatestatus');

            //update category
            Route::get('update/{id}', 'backend\CategoryController@getupdate')->name('category_getupdate');

            Route::post('update/{id}', 'backend\CategoryController@postupdate')->name('category_postupdate');

            //delete category
            Route::get('delete/{id}', 'backend\CategoryController@delete')->name('category_delete');

            Route::get('deltrash/{id}', 'backend\CategoryController@deltrash')->name('category_deltrash');

            Route::get('retrash/{id}', 'backend\CategoryController@retrash')->name('category_retrash');

            Route::get('trash', 'backend\CategoryController@trash')->name('category_trash');
        });
    });
});
//quản lý tin tức
Route::group(['prefix' => 'admin', 'middleware' => 'LoginAdmin'], function () {
    Route::get('/', 'backend\DashboardController@index')->name('Dashboard');
    Route::group(['prefix' => 'news'], function () {

        Route::get('/', 'backend\NewsController@index')->name('index_news');

        Route::get('insert', 'backend\NewsController@getinsert')->name('getinsert_news');
        Route::post('insert', 'backend\NewsController@postinsert')->name('postinsert_news');

        //update status
        Route::get('status/{id}', 'backend\CategoryController@status')->name('category_status');

        Route::get('updatestatus/{id}', 'backend\CategoryController@updatestatus')->name('category_updatestatus');

        //update category
        Route::get('update/{id}', 'backend\CategoryController@getupdate')->name('category_getupdate');

        Route::post('update/{id}', 'backend\CategoryController@postupdate')->name('category_postupdate');

        //delete category
        Route::get('delete/{id}', 'backend\CategoryController@delete')->name('category_delete');

        Route::get('deltrash/{id}', 'backend\CategoryController@deltrash')->name('category_deltrash');

        Route::get('retrash/{id}', 'backend\CategoryController@retrash')->name('category_retrash');

        Route::get('trash', 'backend\CategoryController@trash')->name('category_trash');
    });
});

