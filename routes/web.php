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
    return view('index');
});

Route::get('/canvas', function () {
    return view('canvas');
});

Route::get('/fading', function () {
    return view('fading');
});

Route::get('/animate', function () {
    return view('animate');
});

Route::get('/rotate-animate', function () {
    return view('rotate_animate');
});
