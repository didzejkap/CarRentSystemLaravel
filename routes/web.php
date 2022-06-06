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

Route::get('usunsamochod', [FrontendController::class, 'usunAutoWidok']);
Route::get('usunauto/{id}', [FrontendController::class, 'usunAuto']);
Route::get('wyswietlsamochod', [FrontendController::class, 'wyswietlAuto']);

Route::get('usunuser', [FrontendController::class, 'usunUserWidok']);
Route::get('usunuserDelete/{id}', [FrontendController::class, 'usunUserFunction']);
Route::get('wyswietluser', [FrontendController::class, 'wyswietlUser']);

Route::get('dodajrole', [FrontendController::class, 'dodajRoleWidok']);
Route::get('dodajroleadmin/{id}', [FrontendController::class, 'dodajRoleAdmin']);
Route::get('dodajroleuser/{id}', [FrontendController::class, 'dodajRoleUser']);

Route::get('zamowwidok', [FrontendController::class, 'zamowWidok']);
//Route::post('zamowauto/{id}', [FrontendController::class, 'zamowAuto']);
Route::post('sprawdzrezerwacje/{id}', [FrontendController::class, 'sprawdzRezerwacje']);


Route::get('wyswietlzamowieniawidok', [FrontendController::class, 'wyswietlZamowieniaWidok']);
Route::get('usunzamowienie/{id}', [FrontendController::class, 'usunZamowienie']);

Route::get('wyswietlzamowieniawidokuser', [FrontendController::class, 'wyswietlZamowieniaWidokUser']);
Route::get('usunzamowienieuser/{id}', [FrontendController::class, 'usunZamowienieUser']);



