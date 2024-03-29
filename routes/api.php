<?php

use App\Http\Controllers\APILikedProjects;
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

// Route::apiResource('/liked-projects', APILikedProjects::class);
    // ->middleware(['auth', 'verified']);
// Route::get('/likes', [APILikedProjects::class, 'likes'])->middleware('api');
    Route::apiResource('/liked-projects', APILikedProjects::class);
    // Route::post('/liked-projects', [APILikedProjects::class, 'store']);
