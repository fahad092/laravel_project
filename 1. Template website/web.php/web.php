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
Route::get('/about', function () {
    return "about";
});
Route::get('/contact', function () {
    return view("contact");
});
Route::get('/alluser', function () {
    return view("alluser");
});
Route::get('alluser/{id}/{name}', function ($id,$name) {
    return 'User '.$id.$name;
})->where(['id' => '[0-9]+', 'name' => '[a-zA-Z]+']);
Auth::routes();
Route::get('home', 'basicController@index');
Route::get('about', 'basicController@about');

//template website route

Route::get('/contact', function () {
    return view('template.contact');
});
Route::get('/index', function () {
    return view('template.index');
});
Route::get('/team', function () {
    return view('template.team');
});

Route::post('/registration','templateController@register');
Route::post('/login','templateController@login');
Route::post('/contact','templateController@contact');

