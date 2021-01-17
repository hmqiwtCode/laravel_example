<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\HomeController;
use App\Http\Controllers\Api\Auth\TaskController;
use App\Http\Controllers\Api\Auth\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    // 'namespace' => 'App\Http\Controllers\Api\Auth',
    'prefix' => 'auth'
], function ($router) {
   // Route::post('user',[LoginController::class, 'register'])->name('login');
    Route::get('chat',[LoginController::class, 'hihi']);
});
Route::get('user/{userId}',[UserController::class, 'getUserById']);

Route::post('user',[LoginController::class, 'register'])->name('register');
Route::post('login',[LoginController::class, 'login'])->name('login');
Route::get('/{api_key}/tasks',[TaskController::class, 'getTasks'])->middleware('valid_api');
Route::post('/{api_key}/tasks/{taskId}',[TaskController::class, 'update'])->middleware(['valid_param','valid_api']);


// Home middleware





