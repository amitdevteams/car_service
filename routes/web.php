<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
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

Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    
    Route::get('/admin/home', [AdminController::class, 'adminHome'])->name('admin.home');
    Route::get('/add/slider/content', [AdminController::class, 'title'])->name('admin.title');
    Route::post('/add/slider/content', [AdminController::class, 'add_content'])->name('add_content');
});
Route::get('/content',[PageController::class,'marq_page'])->name('marq_page');  