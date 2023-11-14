<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\BookingController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\director\StaffController as DirectorStaffController;


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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('admin/rooms', [RoomsController::class, 'getRooms'])->name('admin.rooms');
Route::post('admin/free-rooms-period', [RoomsController::class, 'getFreeRoomsPeriod'])->name('admin.free-rooms-period');
Route::get('admin/room/{id}/get-room', [RoomController::class, 'getRoom'])->name('admin.room.get-room');

Route::put('admin/room/cancel-book-room', [RoomController::class, 'cancelBookRoom'])->name('admin.room.cancel-book-room');
Route::post('admin/room/check-in-room', [RoomController::class, 'checkInRoom'])->name('admin.room.check-in-room');
Route::put('admin/room/eviction-from-room', [RoomController::class, 'evictionFromRoom'])->name('admin.eviction-from-room');

Route::get('admin/staff', [StaffController::class, 'getStaff'])->name('admin.staff');
Route::get('admin/employee/{id}', [StaffController::class, 'getEmployee'])->name('admin.employee');
Route::match(['put'], 'admin/employee/edit/{id}', [StaffController::class, 'editEmployee'])->name('admin.edit.employee');

Route::get('admin/booking', [BookingController::class, 'getBooking'])->name('admin.booking');
Route::post('admin/room/book-room', [RoomController::class, 'bookRoom'])->name('admin.room.book-room');

Route::get('director/staff', [DirectorStaffController::class, 'getStaff']);
Route::get('director/employee/{id}', [DirectorStaffController::class, 'getEmployee']);
Route::get('director/get-all-positions', [DirectorStaffController::class, 'getAllPositions']);
Route::get('director/get-all-roles', [DirectorStaffController::class, 'getAllRoles']);
Route::post('director/create-employee', [DirectorStaffController::class, 'createEmployee']);
Route::post('director/edit-employee', [DirectorStaffController::class, 'editEmployee']);
//Route::post('director/destroy-employee/{id}', [DirectorStaffController::class, 'dellUser']);
Route::delete('director/dismissEmployee', [DirectorStaffController::class, 'dismissUser']);

Route::get('isauth', [AuthController::class, 'isAuth']);
