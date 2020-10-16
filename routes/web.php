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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', 'Login@index');
Route::post('/Login/sign_in', 'Login@sign_in');
Route::get('/Product/index', 'Product@index');
Route::post('/Product/process_products', 'Product@process_products');

Route::get('/index', function () {
    return view('sections/dashboard');
});

Route::get('index', 'Admin_controller@index');
