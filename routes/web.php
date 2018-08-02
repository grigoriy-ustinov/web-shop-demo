<?php
use Illuminate\Support\Facades\Auth;

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
//landing page redirects to /shop
Route::get('/', function () {
    return redirect('/shop');
});

Route::get('/shop', 'ItemsController@index');


//admin panel only accessable to logged in users
Route::get('/adminView', 'ItemsController@adminView')->middleware('auth');

Route::get('/delete/{id}', 'ItemsController@delete')->middleware('auth');

Route::get('/admin', 'ItemsController@adminView')->middleware('auth');



Route::get('/addToCart/{id}', 'ItemsController@addToCart');

Route::get('/removeFromCart/{id}', 'ItemsController@removeFromCart');

Route::get('/checkout', 'ItemsController@showCart');


Route::resource('items', 'ItemsController');
Auth::routes();

