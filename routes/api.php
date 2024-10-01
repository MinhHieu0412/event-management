<?php

use App\Http\Controllers\Api\AttendeeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
use App\Models\Attendee;
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

//sử dụng phần mềm trung gian trên route cũng đc nhưng nó sẽ bắt xác thực toàn bộ controller, vì vậy nếu muốn xác thực 1 số chưcs năng nhất đinhj nên tạo middleware trong controller để chỉ đinhj chức năng nào cânf phải đc xác thực

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('events', EventController::class);

// "." truyền vào 2 tham số là sự kiện vào ng tham du 
Route::apiResource('events.attendees', AttendeeController::class)->scoped()->except(['update']);