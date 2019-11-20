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

//front
Route::get('/', 'QuestionaryController@explanation');
Route::get('/quesitonary', 'QuestionaryController@next1');
Route::get('/thanks', 'QuestionaryController@next2');
Route::get('/coupon', 'QuestionaryController@next3');

//admin
Route::get('/admin','QuestionaryController@index');
Route::get('/admin/extraction', 'QuestionaryController@extraction');



//【参考】mynews web.php----------------------------------------------------------------

// Route::get('/aaa', function () {
// // テスト
//     echo DNS1D::getBarcodeHTML("1300013501754","EAN13");
//     echo "_";
//     echo DNS2D::getBarcodeHTML("123456789012","QRCODE");
//     return view('welcome');
    
// });

// // Route::get('/a', function () {
// //     echo DNS1D::getBarcodeHTML("9999999999999","EAN13");
// // });

// Route::get('/home', 'HomeController@index')->name('home');
// Auth::routes();

// //news
// Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
//     Route::get('news/create', 'Admin\NewsController@add');
//     Route::post('news/create', 'Admin\NewsController@create'); //13章追記
//     Route::get('news', 'Admin\NewsController@index'); //15章追記
//     Route::get('news/edit', 'Admin\NewsController@edit'); //16章追記
//     Route::post('news/edit', 'Admin\NewsController@update'); //16章追記
//     Route::get('news/delete', 'Admin\NewsController@delete');
// });

// //profile
// Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
//     Route::get('profile/create', 'Admin\ProfileController@add');
//     Route::post('profile/cleate', 'Admin\ProfileController@create'); //13章課題追記
//     Route::get('profile', 'Admin\ProfileController@index');
//     Route::get('profile/edit', 'Admin\ProfileController@edit'); //13章課題追加
//     Route::post('profile/edit', 'Admin\ProfileController@update');
//     Route::get('profile/delete', 'Admin\ProfileController@delete');
// });

// //news_front
// Route::get('/', 'NewsController@index');

// //prifiles_front
// Route::get('profile', 'ProfileController@index');