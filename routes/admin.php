<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminController;
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



Route::get('admin-login',[AdminController::class,'index'])->name('admin.login');
Route::post('admin-login',[AdminController::class,'login'])->name('admin.login.post');

Route::get('db',[AdminController::class,'db'])->name('admin.db');
Route::get('trial',[AdminController::class,'trial'])->name('trial');

// Prefix
Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function(){

                      
                      
});
Route::get('admin-home',[AdminController::class,'home'])->name('admin.home');
Route::get('admin-dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');