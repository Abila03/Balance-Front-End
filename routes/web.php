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
    return view('login');
});
Route::get('/article', function () {
    return view('article');
});
Route::get('/create', function () {
    return view('create');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/acc', function () {
    return view('acc');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/detail', function () {
    return view('detail-article');
});