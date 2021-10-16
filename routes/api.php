<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CommentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Puplic Route
Route::get("/user", [UserController::class, 'index']);
Route::post("/user", [UserController::class, 'store']);
// post Route
Route::get('/post',[PostController::class, 'index']);
Route::post('/post',[PostController::class, 'store']);
Route::get('/post/{id}',[PostController::class,'show']);
Route::delete('/post/{id}',[PostController::class,'destroy']);
Route::put('/post/{id}',[PostController::class,'update']);
// profile
Route::get('/profile',[ProfileController::class, 'index']);
Route::post('/profile',[ProfileController::class, 'store']);
Route::get('/profile/{id}',[ProfileController::class,'show']);
Route::delete('/profile/{id}',[ProfileController::class,'destroy']);
Route::put('/profile/{id}',[ProfileController::class,'update']);
//Roles
Route::get('/roles',[RolesController::class, 'index']);
Route::post('/roles',[RolesController::class, 'store']);
Route::get('/roles/{id}',[RolesController::class,'show']);
Route::delete('/roles/{id}',[RolesController::class,'destroy']);
Route::put('/roles/{id}',[RolesController::class,'update']);
//Comment
Route::get('/comment',[CommentController::class, 'index']);
Route::post('/comment',[CommentController::class, 'store']);
Route::get('/comment/{id}',[CommentController::class,'show']);
Route::delete('/comment/{id}',[CommentController::class,'destroy']);
Route::put('/comment/{id}',[CommentController::class,'update']);
