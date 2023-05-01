<?php

use App\Http\Controllers\SecondCtrl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

//User-Related
Route::get('/', [UserController::class, "showCorrectHomepage"])->name('login');

Route::post('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/signout', [UserController::class, 'signout'])->middleware('mustBeLoggedIn');

//Blog Post Route
Route::get('/create-post',[PostController::class, 'showCreateForm'])->middleware('mustBeLoggedIn');
Route::post('/create-post',[PostController::class, 'newPost'])->middleware('mustBeLoggedIn');
Route::get('/post/{post}',[PostController::class, 'viewSinglePost']);

//Profile Related Routes
Route::get('/profile/{akun:username}',[UserController::class,'profile']);