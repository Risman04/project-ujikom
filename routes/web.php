<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;

use App\Http\Controllers\DataUserController;
use App\Http\Controllers\JenisBarangController;


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
    Route::group(['middleware' => [CekUserLogin::class]], function()
    {
        Route::resource('about', LayoutController::class);
        //item
        Route::resource('user', DataUserController::class);
        Route::resource('jenis', JenisBarangController::class);
    });

    //Bagian Admin
    Route::group(['middleware' => [CekUserLogin::class]], function()
    {
        
    });

    //Bagian Karyawan
    Route::group(['middleware' => [CekUserLogin::class]], function()
    {

    });
});