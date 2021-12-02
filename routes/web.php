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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('myapp', 'InformationController@myapp');


/*
|--------------------------------------------------------------------------
| Information Controller
|--------------------------------------------------------------------------
 */

Route::get('information/category/create', 'InformationController@category');
Route::get('information/location/create', 'InformationController@location');
Route::get('information/suppliers/create', 'InformationController@suppliers');
Route::get('information/size/create', 'InformationController@shirt_size');

Route::post('information/category/store', 'InformationController@category_store');
Route::post('information/location/store', 'InformationController@location_store');
Route::post('information/suppliers/store', 'InformationController@suppliers_store');
Route::post('information/size/store', 'InformationController@shirt_size_store');

Route::get('information/category/list', 'InformationController@category_list');
Route::get('information/location/list', 'InformationController@location_list');
Route::get('information/suppliers/list', 'InformationController@suppliers_list');
Route::get('information/size/list', 'InformationController@size_list');

Route::post('information/destroy/{id}', 'InformationController@destroy');

Route::get('information/category/search', 'InformationController@category_search');
Route::get('information/location/search', 'InformationController@location_search');
Route::get('information/suppliers/search', 'InformationController@suppliers_search');
Route::get('information/size/search', 'InformationController@size_search');



/*
|--------------------------------------------------------------------------
| Transaction Controller
|--------------------------------------------------------------------------
 */

Route::get('transaction/stockin/create', 'TransactionsController@stock_in');
Route::get('transaction/stockout/create', 'TransactionsController@stock_out');
Route::get('transaction/stockreturn/create', 'TransactionsController@stock_return');

Route::post('transaction/stockin/store', 'TransactionsController@stock_in_store');
Route::post('transaction/stockout/store/{id}', 'TransactionsController@stock_out_create');
Route::post('transaction/stockreturn/store', 'TransactionsController@stock_return_store');

Route::post('transaction/stockin/update/{id}', 'TransactionsController@stock_in_update');

Route::get('transaction/stockin/list', 'TransactionsController@stock_in_list');
Route::get('transaction/stockout/list', 'TransactionsController@stock_out_list');
Route::get('transaction/stockreturn/list', 'TransactionsController@stock_return_list');

Route::post('transaction/destroy/{id}', 'TransactionsController@destroy');

Route::get('transaction/stockout/search', 'TransactionsController@stock_out_search');
Route::get('transaction/stockout/list/search', 'TransactionsController@stock_out_list_search');
Route::get('transaction/stockin/search', 'TransactionsController@stock_in_search');
Route::get('transaction/stockreturn/search', 'TransactionsController@stock_return_search');


/*
|--------------------------------------------------------------------------
| Report Controller
|--------------------------------------------------------------------------
 */

 Route::get('report', 'ReportController@index');
 Route::get('report/shirt', 'ReportController@shirt');



