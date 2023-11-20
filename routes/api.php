<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\staff\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\BookingController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\admin\TasksController;
use App\Http\Controllers\guest\GuestController;
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

Route::get('admin/rooms', [RoomsController::class, 'getRooms'])->name('admin.rooms')->middleware('can:get-rooms');
Route::get('admin/check_in_rooms', [RoomsController::class, 'getCheckInRooms'])->name('admin.checkInRooms')->middleware('can:get-check-in-rooms');
Route::get('admin/roomsForCleaning', [RoomsController::class, 'getRoomsForCleaning'])->name('admin.roomsForCleaning')->middleware('can:get-rooms-for-cleaning');
Route::post('admin/free-rooms-period', [RoomsController::class, 'getFreeRoomsPeriod'])->name('admin.free-rooms-period');
Route::get('admin/room/{id}/get-room', [RoomController::class, 'getRoom'])->name('admin.room.get-room');

Route::put('admin/room/cancel-book-room', [RoomController::class, 'cancelBookRoom'])->name('admin.room.cancel-book-room');
Route::post('admin/room/check-in-room', [RoomController::class, 'checkInRoom'])->name('admin.room.check-in-room');
Route::put('admin/room/eviction-from-room', [RoomController::class, 'evictionFromRoom'])->name('admin.eviction-from-room');

Route::get('admin/staff', [StaffController::class, 'getStaff'])->name('admin.staff')->middleware('can:get-staff');
Route::get('admin/employee/{id}', [StaffController::class, 'getEmployee'])->name('admin.employee')->middleware('can:get-employee');
Route::match(['put'], 'admin/employee/edit/{id}', [StaffController::class, 'editEmployee'])->name('admin.edit.employee')->middleware('can:edit-employee');;

Route::get('admin/booking', [BookingController::class, 'getBooking'])->name('admin.booking')->middleware('can:get-booking');
Route::post('admin/room/book-room', [RoomController::class, 'bookRoom'])->name('admin.room.book-room');


Route::get('admin/tasks', [TasksController::class, 'getTasks'])->name('admin.tasks')->middleware('can:get-tasks');
Route::post('admin/addTask', [TasksController::class, 'addTask'])->name('admin.addTask');


Route::get('guest/requests', [GuestController::class, 'getRequests'])->name('guest.requests');

//роуты для сотрудников

Route::post('employee/{id}/tasks', [TasksController::class, 'getTasksForEmployee'])->name('employee.tasks')->middleware('can:get-tasks');
Route::put('employee/changeTaskStatus', [TasksController::class, 'changeTaskStatus'])->name('employee.changeTaskStatus');



Route::get('director/staff', [DirectorStaffController::class, 'getStaff'])->middleware('can:director-get-staff');
Route::get('director/employee/{id}', [DirectorStaffController::class, 'getEmployee'])->middleware('can:director-get-employee');
Route::get('director/get-all-positions', [DirectorStaffController::class, 'getAllPositions'])->middleware('can:director-get-all-positions');
Route::get('director/get-all-roles', [DirectorStaffController::class, 'getAllRoles'])->middleware('can:director-get-all-roles');
Route::post('director/create-employee', [DirectorStaffController::class, 'createEmployee'])->middleware('can:director-create-employee');
Route::post('director/edit-employee', [DirectorStaffController::class, 'editEmployee'])->middleware('can:director-edit-employee');
Route::put('director/dismiss-employee', [DirectorStaffController::class, 'dismissUser'])->middleware('can:director-dismiss-user');

Route::get('isauth', [AuthController::class, 'isAuth']);
Route::get('userRole', [AuthController::class, 'getRole']);
Route::get('user', [AuthController::class, 'getIdCurrentUser']);
