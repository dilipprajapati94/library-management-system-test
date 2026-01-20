<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class,'showLogin']);
Route::get('/register',[AuthController::class,'showRegister']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout']);

Route::middleware('auth')->group(function(){
 Route::resource('books',BookController::class);
 Route::post('/borrow',[BorrowController::class,'borrow']);
 Route::post('/return',[BorrowController::class,'return']);
 Route::get('/my-borrows',[BorrowController::class,'history']);
});


