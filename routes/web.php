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

// Route to Serve the Main Welcome Page
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/citizen', function () {
    return view('citizen');
});
Route::get('/supplies', function () {
    return view('supplies');
});
Route::get('/history', function () {
    return view('history');
});
Route::get('/demo', function () {
    return view('demo');
});
Route::get('/services', function () {
    return view('services');
});