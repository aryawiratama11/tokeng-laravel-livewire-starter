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
Route::get('/partin', [App\Http\Controllers\HomeController::class, 'partin'])->name('part_in');
Route::get('/partout', [App\Http\Controllers\HomeController::class, 'partout'])->name('part_out');
Route::get('/partcheck', [App\Http\Controllers\HomeController::class, 'partcheck'])->name('part_check');
Route::get('/partrequest', [App\Http\Controllers\HomeController::class, 'partrequest'])->name('part_request');

Route::get('/changepassword', [App\Http\Controllers\HomeController::class, 'changepassword'])->name('change_password');

Route::get('/usercontrol', [App\Http\Controllers\HomeController::class, 'usercontrol'])->name('user_control');

Route::get('/new/partin', [App\Http\Controllers\HomeController::class, 'newpartin'])->name('new_partin');
Route::get('/new/partout', [App\Http\Controllers\HomeController::class, 'newpartout'])->name('new_partout');
Route::get('/new/partrequest', [App\Http\Controllers\HomeController::class, 'newpartrequest'])->name('new_partrequest');
Route::get('/new/register', [App\Http\Controllers\HomeController::class, 'newregister'])->name('new_register');

Route::get('/edit/partrequest/{id}', [App\Http\Controllers\HomeController::class, 'editpartrequest'])->name('edit_partrequest');

Route::get('/delete/partrequest/{id}', [App\Http\Controllers\HomeController::class, 'deletepartrequest'])->name('delete_partrequest');

Route::get('/detail/partrequest/{id}', [App\Http\Controllers\HomeController::class, 'detailpartrequest'])->name('detail_partrequest');

Route::get('/stock/delete/{id}', [App\Http\Controllers\HomeController::class, 'deletestock'])->name('stock_delete');
Route::get('/stock/data/{id}', [App\Http\Controllers\HomeController::class, 'datastock'])->name('stock_data');
Route::post('/stock/update', [App\Http\Controllers\HomeController::class, 'updatestock'])->name('stock_update');

Route::get('/configure/notify', [App\Http\Controllers\HomeController::class, 'notifyconfig'])->name('notify_config');

Route::get('/excel/{id}', [App\Http\Controllers\HomeController::class, 'excel'])->name('excel');

Route::get('/autocomplete/users_email', [App\Http\Controllers\HomeController::class, 'autocomplete_user'])->name('autocomplete_user');
