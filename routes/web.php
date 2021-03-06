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
Route::get('loginuser','backend\LoginUser@getdangnhap')->name('loginuser');
Route::post('loginuser','backend\LoginUser@postdangnhap')->name('postloginuser');
Route::get('dangxuat','backend\LoginUser@dangxuat')->name('dangxuat');
//route dang ky
Route::get('registration','backend\LoginUser@getregis')->name('get_regis');
Route::post('registration','backend\LoginUser@postregis')->name('post_regis');
//route login
Route::get('login','backend\AuthController@getlogin')->name('login');
Route::post('login','backend\AuthController@postlogin')->name('postlogin');
//route logou
Route::get('logout','backend\AuthController@logout')->name('logout');
/* Route admin */




//page gioi thieu
Route::get('page/gioi-thieu','page\PageController@gioithieu');
//page lien he
Route::get('page/lien-he','page\PageController@lienhe');
//

Route::get('/','frontend\HomeController@index')->name('user');
Route::get('san-pham','frontend\ProductController@index');
Route::get('san-pham/{slug}','frontend\ProductController@index');

Route::get('san-pham/{slug}','frontend\ProductController@category');
Route::get('sap-xep-giam/{slug}','frontend\ProductController@sapxepgiam');
Route::get('sap-xep-tang/{slug}','frontend\ProductController@sapxeptang');

//page tin tuc
Route::get('page/tin-tuc','page\PageController@tintuc')->name('tintuc');
Route::get('page/tin-tuc/{slug}','page\PageController@detail');
Route::get('page/seach','page\PageController@seach')->name('seach');

//Admin
Route::group(['prefix' => 'admin','middleware'=>'LoginAdmin'], function() {
    //
    Route::get('','backend\DashboardController@index')->name('Dashboard');


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
    });


    // Route quản lý cate
Route::group(['prefix' => 'category'], function () {

        Route::get('/','backend\CategoryController@index')->name('index_category');

        Route::get('insert','backend\CategoryController@getinsert')->name('category_getinsert');
        Route::post('insert','backend\CategoryController@postinsert')->name('category_postinsert');

        //update status
        Route::get('status/{id}','backend\CategoryController@status')->name('category_status');

        Route::get('updatestatus/{id}','backend\CategoryController@updatestatus')->name('category_updatestatus');

        //update category
        Route::get('update/{id}','backend\CategoryController@getupdate')->name('category_getupdate');

        Route::post('update/{id}','backend\CategoryController@postupdate')->name('category_postupdate');

        //delete category
        Route::get('delete/{id}','backend\CategoryController@delete')->name('category_delete');

        Route::get('deltrash/{id}','backend\CategoryController@deltrash')->name('category_deltrash');

        Route::get('retrash/{id}','backend\CategoryController@retrash')->name('category_retrash');

        Route::get('trash','backend\CategoryController@trash')->name('category_trash');
 });
Route::group(['prefix' => 'news'], function () {
    Route::get('/','backend\NewsController@index')->name('index_news');
    //Thêm tin tức
    Route::get('insert','backend\NewsController@getinsert')->name('news_getinsert');
    Route::post('insert','backend\NewsController@postinsert')->name('news_postinsert');
    //Xoá tin tức
    Route::get('trash','backend\NewsController@trash')->name('news_trash');
    Route::get('deltrash/{id}','backend\NewsController@deltrash')->name('news_deltrash');
    Route::get('delete/{id}','backend\NewsController@delete')->name('news_delete');



        Route::get('retrash/{id}','backend\NewsController@retrash')->name('news_retrash');
        //update tin tuc
        Route::get('update/{id}','backend\NewsController@getupdate')->name('news_getupdate');

        Route::post('update/{id}','backend\NewsController@postupdate')->name('news_postupdate');

        Route::get('status/{id}','backend\NewsController@status')->name('news_status');

        Route::get('updatestatus/{id}','backend\NewsController@updatestatus')->name('news_updatestatus');

});
    //route order
    Route::group(['prefix' => 'order'], function () {
        Route::get('/','backend\OrderController@index')->name('index-order');
        Route::get('approved','backend\OrderController@approved')->name('approved');
        Route::get('error','backend\OrderController@error')->name('error');
        Route::get('orderdetail/{code}','backend\OrderDetailController@orderdetail')->name('orderdetail');
        Route::get('status/{code}','backend\OrderDetailController@status')->name('status');
        Route::get('error/{code}','backend\OrderDetailController@error')->name('orderdetail-error');

    });

});
Route::get('chitiet/{slug}','frontend\ProductController@detail')->name('slug');
//cart
Route::group(['prefix' => 'cart'], function () {
    Route::get('add/{id}','backend\CartController@add')->name('cart-add');
    Route::get('remove/{id}','backend\CartController@remove')->name('cart-remove');
    Route::get('update/{id}','backend\CartController@update')->name('cart-update');
    Route::get('clear','backend\CartController@clear')->name('cart-clear');
    //view giỏ hàng
    Route::get('view','backend\CartController@view')->name('cart-view');
    Route::post('store','backend\CartController@store')->name('done-cart');
    Route::get('orderapproved','backend\CartController@orderapproved')->name('orderapproved');
    Route::get('order-detail/{id}','backend\CartController@orderdetail')->name('orderdetailcart');

});
Route::get('404','frontend\HomeController@notfound')->name('404');


