<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\PostController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('posts.index');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/password', function () {
    //     return view('password.index');
    // })->name('password');
    Route::resource('posts',PostController::class);
});
Route::get('auth/github', [GitHubController::class, 'gitRedirect']);
Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);
