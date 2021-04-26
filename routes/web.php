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
    return redirect('/login');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, //
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/partin', [App\Http\Controllers\HomeController::class, 'partin']);
Route::get('/partout', [App\Http\Controllers\HomeController::class, 'partout']);
Route::get('/partcheck', [App\Http\Controllers\HomeController::class, 'partcheck']);
Route::get('/partrequest', [App\Http\Controllers\HomeController::class, 'partrequest']);

