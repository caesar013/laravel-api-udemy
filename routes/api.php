<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\QuoteController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function () {
    return response()->json(['message' => 'Hello, World!'], 200);
});

// route middleware for authenticated users
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/quote', QuoteController::class);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});

// route without middleware
// Route::apiResource('/quote', QuoteController::class);

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);

// don't add this route to the production environment
// Route::post('/upload', [FileUploadController::class, 'uploadFile']);
