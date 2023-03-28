<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;

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

Route::get('/', [CommentsController::class, 'create'])->name('сomments');
Route::post('/', [CommentsController::class, 'store'])->name('secondReply');

Route::post('/reply', [CommentsController::class, 'reply'])->name('reply');





