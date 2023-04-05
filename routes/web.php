<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/docs', function () {
    return View::make(File::get(public_path() . '/docs/index.html'));
});

Route::get('/insomnia.json', function () {
    return File::get(public_path() . '/docs/docs/insomnia.json');
});