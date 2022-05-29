<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('redirects','App\Http\Controllers\HomeController@index');
Route::get('dodajsamochod','App\Http\Controllers\HomeController@menudodajsamochod');




Route::post('/wyslijauto','App\Http\Controllers\FrontendController@insertcar');




