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
Route::get('/', [UserController::class, "showCorrectHomepage"]);

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/signout', [UserController::class, 'signout']);

//Blog Post Route
Route::get('/create-post',[PostController::class, 'showCreateForm']);
Route::post('/create-post',[PostController::class, 'newPost']);
Route::get('/post/{post}',[PostController::class, 'viewSinglePost']);