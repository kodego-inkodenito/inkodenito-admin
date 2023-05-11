<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanctumAuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RecipeController;

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

Route::post('register', [SanctumAuthController::class, 'register']);
Route::post('login', [SanctumAuthController::class, 'login']);

// User Routes
Route::get('/users', [UserController::class, 'index']);
Route::get('/user/{user_id}/recipes', [UserController::class, 'getUserRecipes']);
Route::post('/createUser', [UserController::class, 'store']);
Route::get('search-user', [UserController::class, 'searchUserByName']);
Route::patch('/user/{user_id}', [UserController::class, 'update']);
Route::delete('/user/{user_id}', [UserController::class, 'delete']);

// Recipe Routes
Route::get('/recipe/{recipe_id}/user', [RecipeController::class, 'getRecipeAuthor']);