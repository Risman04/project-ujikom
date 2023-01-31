<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;

use App\Http\Controllers\DataUserController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\SatuanBarangController;
use App\Http\Controllers\DataSupplierController;
use App\Http\Controllers\DataBarangController;


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

//Middleware    
Route::group(['middleware' => ['auth']], function()
{
    // Bagian Super Admin 
    Route::group(['middleware' => ['CekUserLogin:1']], function()
    {
        Route::resource('about', LayoutController::class);
        //item
        Route::resource('user', DataUserController::class);
        Route::resource('databarang', DataBarangController::class);
        Route::resource('jenis', JenisBarangController::class);
        Route::resource('satuan', SatuanBarangController::class);
        Route::resource('supplier', DataSupplierController::class);
    });

    //Bagian Admin
    Route::group(['middleware' => ['CekUserLogin:2']], function()
    {
        Route::resource('about', LayoutController::class);
        //item
        Route::resource('user', DataUserController::class);
        Route::resource('databarang', DataBarangController::class);
    });

    //Bagian Karyawan
    Route::group(['middleware' => ['CekUserLogin:3']], function()
    {

    });
});