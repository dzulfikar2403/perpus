<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\auth\bukuController as AuthBukuController;
use App\Http\Controllers\BukuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'show']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/books', [AuthBukuController::class, 'getBooksData'])->name('books');
Route::get('/books/{judul?}', [AuthBukuController::class, 'getBooksName'])->name('kategori_by_name');
Route::post('/books', [AuthBukuController::class, 'storeBooksData'])->name('create_books');
