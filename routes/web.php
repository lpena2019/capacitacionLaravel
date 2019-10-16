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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get-file/{file}',function(){
    //las rutas es es unico lugar donde no va el / va directo
   if(Storage::disk('public')->exists('photos-articles/'.$file)){
        return Response::make(Storage::disk('public')->get('photos-article/'.$file), '200');
   }
})->name('get-image');

