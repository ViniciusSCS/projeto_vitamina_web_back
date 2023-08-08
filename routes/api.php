<?php

use App\Http\Controllers\{
    AuthenticatorController,
    ProductController,
    SalesOpportunityController,
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
    Route::post('/logout', [AuthenticatorController::class, 'logout']);

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'user']);
        Route::get('/clientes', [UserController::class, 'client']);
    });

    Route::prefix('product')->group(function () {
        Route::post('/cadastrar', [ProductController::class, 'create']);
        Route::get('/listar', [ProductController::class, 'list']);
        Route::get('/editar/{id}', [ProductController::class, 'edit']);
        Route::put('/atualizar/{id}', [ProductController::class, 'update']);
    });

    Route::prefix('sales-opportunity')->group(function () {
        Route::post('/cadastrar', [SalesOpportunityController::class, 'create']);
        Route::get('/listar', [SalesOpportunityController::class, 'list']);
        Route::get('/visualizar/{id}', [SalesOpportunityController::class, 'show']);
        Route::put('/aprovar/{id}', [SalesOpportunityController::class, 'approve']);
        Route::put('/recusar/{id}', [SalesOpportunityController::class, 'refuse']);
    });
});
