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
Route::get('/logout', 'Auth\LoginController@logout')-> name('logout');
Route::get('/home', 'HomeController@index')->name('hom');


Route::get('/pages/home', 'ControllerMain@home')->name('home');
Route::get('/pilot/{id}', 'ControllerMain@pilot')->name('pilot');
Route::get('/add', 'HomeController@add')->name('add');
Route::post('/add_function', 'HomeController@add_function')->name('add_function');
Route::get('/delete/{id}', 'HomeController@delete')->name('delete');
Route::get('/edit/{id}', 'HomeController@edit')->name('edit');

