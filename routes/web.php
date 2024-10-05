<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/logout', [HomeController::class, 'Logout'])->name('user.logout');

Route::get('auth/google', [App\Http\Controllers\Auth\RegisterController::class, 'redirectToProvider']);
Route::get('auth/google/callback', [App\Http\Controllers\Auth\RegisterController::class, 'handleProviderCallback']);

Route::post('/profile',[ProfileController::class,'storeProfile'])->name('store.profile');  
Route::get('/',[ProfileController::class,'home']); 