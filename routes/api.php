<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AttendanceController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//csrf cookieはwebにアクセスしてそのあとの通信はspa のシングルアプリケーションの為api通信を行うことからapiに書く。
Route::post('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy']);
Route::post('/submission/{year}/{month}', [AttendanceController::class, 'store']);
Route::post('/get/{year}/{month}', [AttendanceController::class, 'indexBySubmitterAndDate']);
Route::get('/admin/pending-users', [AttendanceController::class, 'indexPendingUsers']);
