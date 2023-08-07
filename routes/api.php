<?php

use App\Http\Controllers\{
    AuthenticatorController,
    UserController
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthenticatorController::class, 'login']);
Route::post('/cadastrar', [UserController::class, 'create']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'user']);
    });
});
