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

Route::get('download/{filename}', function ($filename) {
    $pathToFile = public_path('assets/files/' . $filename);
    return response()->download($pathToFile);
})->name('file.download');

Route::post('/reply', [RepliesController::class, 'reply'])->name('reply');






