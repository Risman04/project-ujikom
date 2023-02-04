<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;

use App\Http\Controllers\DataUserController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\SatuanBarangController;
use App\Http\Controllers\DataSupplierController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\BarangMasukController;


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


//Login
Route::get('/', [LayoutController::class, 'index'])->middleware('auth');
Route::get('/home', [LayoutController::class, 'index'])->middleware('auth');
// Route::get('login',[LoginController::class, 'index'])->name('login');

Route::controller(LoginController::class)->group(function(){
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
});

// Middleware    
Route::group(['middleware' => ['auth']], function()
{
    Route::group(['middleware' => [CekUserLogin::class]], function()
    {
        Route::resource('/home', LayoutController::class);
        //item
        Route::resource('/user', DataUserController::class);
        Route::resource('/databarang', DataBarangController::class);
        Route::resource('/jenis', JenisBarangController::class);
        Route::resource('/satuan', SatuanBarangController::class);
        Route::resource('/supplier', DataSupplierController::class);
        Route::resource('/barangmasuk', BarangMasukController::class);
    });
});

// Route::prefix('/inventory')->middleware(['auth', CekUserLogin::class])->group(function() {
//     Route::resource('/home', LayoutController::class);
//         //item
//         Route::resource('/user', DataUserController::class);
//         Route::resource('/databarang', DataBarangController::class);
//         Route::resource('/jenis', JenisBarangController::class);
//         Route::resource('/satuan', SatuanBarangController::class);
//         Route::resource('/supplier', DataSupplierController::class);
//         Route::resource('/barangmasuk', BarangMasukController::class);
// });
