<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthRSController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\StokDarahController;
use App\Http\Controllers\UpdateController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'showFormLogin'])->name('loginUser');
Route::get('loginUser', [AuthController::class, 'showFormLogin'])->name('loginUser');
Route::post('loginUser', [AuthController::class, 'loginUser']);
Route::get('registerUser', [AuthController::class, 'showFormRegister'])->name('registerUser');
Route::post('registerUser', [AuthController::class, 'registerUser']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('/request', [RequestController::class, 'permohonan']);
    Route::get('/stokdarah', [stokDarahController::class, 'index']);
    Route::get('/stok_darah/cari', [stokDarahController::class, 'cari']);
    Route::get('/request/cari', [RequestController::class, 'cariR']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('request/batal/{id}', [RequestController::class, 'Batal']);
    Route::get('/stokdarah/minta/{id}', [stokDarahController::class, 'Minta']);
    Route::post('/stokdarah/store', [stokDarahController::class, 'store']);
    Route::get('akun/{id}', [HomeController::class, 'edit']);
    Route::post('update', [HomeController::class, 'update']);
});

Route::get('loginRS', [AuthRSController::class, 'showFormLoginRS'])->name('loginRS');
Route::post('loginRS', [AuthRSController::class, 'loginRS']);
Route::get('registerRS', [AuthRSController::class, 'showFormRegisterRS'])->name('registerRS');
Route::post('registerRS', [AuthRSController::class, 'registerRS']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('homeRs', [HomeController::class, 'indexRs'])->name('homeRs');
    Route::get('stokdarahRs', [UpdateController::class, 'index']);
    Route::get('/requestRs', [RequestController::class, 'permohonanRs']);
    Route::get('logout', [AuthRSController::class, 'logout'])->name('logout');
    Route::get('requestRs/TerimaRs', [RequestController::class, 'TerimaRs']);
    Route::get('requestRs/TolakRs', [RequestController::class, 'TolakRs']);
    Route::get('stokdarahRs/delete/{id}', [UpdateController::class, 'Delete']);
    Route::post('stokdarahRs/store/{id}', [UpdateController::class, 'store']);
    Route::get('akunRs/{id}', [HomeController::class, 'editRs']);
    Route::post('updateRs', [HomeController::class, 'updateRs']);
    Route::get('/request/cariRs', [RequestController::class, 'cariRs']);
});


Route::get('aboutUs', [HomeController::class, 'aboutUs']);
