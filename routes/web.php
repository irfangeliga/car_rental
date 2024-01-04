<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\checkUser;
use Illuminate\Support\Facades\Route;

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
// Route::redirect('/car/register', '/car/register');
// Route::post('/car',  [RegisterController::class, 'store']);
Route::get('/car/{name}', function ($name) {
    return view('car/'.$name);
});
Route::get('/manage/{name}', function ($name) {
    return view('manage/'.$name);
});
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [LoginController::class, 'login'])->name('login');
// Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

// Route::resource('/cars', RegisterController::class)->middleware(checkUser::class);
// Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::resource('/cars', RegisterController::class);
Route::resource('/manage', LoginController::class);
Route::post('/action', [LoginController::class, 'actionlogin'])->name('actionlogin');

// Route::post('/cars',  [RegisterController::class, 'check'])->name('check');