<?php

use App\Http\Controllers\API\v1\AuthController;
use App\Http\Controllers\API\v1\UserController;
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
//Route::get('test', [TestController::class, 'index'])->middleware(['auth:sanctum', 'can:/permissions']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/sign-in', [AuthController::class, 'signIn']);
Route::post('/auth/sign-out', [AuthController::class, 'signOut']);


Route::get('/users', [UserController::class, 'index'])->middleware(['extranet.auth']);


