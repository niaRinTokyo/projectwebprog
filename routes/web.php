<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContohController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CarRentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PublicController::class, 'index']);

Route::middleware('only_guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);

    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerprocess']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');

    Route::middleware('only_admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index']);

        Route::get('cars', [CarController::class, 'index']);
        Route::get('car-add', [CarController::class, 'add']);
        Route::post('car-add', [CarController::class, 'store']);
        Route::get('car-edit/{slug}', [CarController::class, 'edit']);
        Route::post('car-edit/{slug}', [CarController::class, 'update']);
        Route::get('car-delete/{slug}', [CarController::class, 'delete']);
        Route::get('car-deleted/{slug}', [CarController::class, 'deleted']);
        Route::get('car-view-delete', [CarController::class, 'viewDelete']);
        Route::get('car-restore/{slug}', [CarController::class, 'restore']);

        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('category-add', [CategoryController::class, 'add']);
        Route::post('category-add', [CategoryController::class, 'store']);
        Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('category-edit/{slug}', [CategoryController::class, 'update']);
        Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
        Route::get('category-deleted/{slug}', [CategoryController::class, 'deleted']);
        Route::get('category-view-delete', [CategoryController::class, 'viewDelete']);
        Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);

        Route::get('users', [UserController::class, 'index']);
        Route::get('registered-user', [UserController::class, 'registeredUser']);
        Route::get('user-detail/{slug}', [UserController::class, 'show']);
        Route::get('user-approve/{slug}', [UserController::class, 'approve']);
        Route::get('user-ban/{slug}', [UserController::class, 'delete']);
        Route::get('user-deleted/{slug}', [UserController::class, 'deleted']);
        Route::get('user-view-ban', [UserController::class, 'viewBan']);
        Route::get('user-restore/{slug}', [UserController::class, 'restore']);

        Route::get('car-return', [CarRentController::class, 'returnCar']);
        Route::post('car-return', [CarRentController::class, 'saveReturnCar']);
    });

    Route::get('car-rent', [CarRentController::class, 'index']);
    Route::post('car-rent', [CarRentController::class, 'store']);

    Route::get('rent-logs', [RentLogController::class, 'index']);
});
