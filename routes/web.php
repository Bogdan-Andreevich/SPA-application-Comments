<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\RepliesController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [CommentsController::class, 'create'])->name('comments');
Route::post('/', [CommentsController::class, 'store']);

Route::post('/reply', [RepliesController::class, 'reply'])->name('reply');
//Route::post('/upload', [CommentsController::class, 'upload'])->name('upload');





