<?php

use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayOrderController;
use App\Http\Controllers\SocialLoginController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('pay', [PayOrderController::class, 'store']);
Route::get('social_login', [SocialLoginController::class, 'index']);
Route::get('gmail/redirect', [GoogleController::class, 'redirectToGoogle']);
Route::get('gmail/callback', [GoogleController::class, 'handleGoogleCallback']);