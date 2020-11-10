<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
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

//trace comment XD (that may need)
// Route::get('/', function () {
//     return view('welcome');
// });

//route for login control
Route::get('/', [AuthController::class, 'index']);
Route::post('proses_login', [AuthController::class, 'proses_login']);
Route::get('logout', [AuthController::class, 'logout']);

//route group for admin
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => 'cek_login:admin'], function () {
        Route::get('admin', [AdminController::class, 'index']);
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => 'cek_login:siswa'], function () {
        Route::get('siswa', [SiswaController::class, 'index']);
    });
});
