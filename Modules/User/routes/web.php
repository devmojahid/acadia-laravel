<?php

use App\Constants\Dashboard;
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\DashboardController;
use Modules\User\Http\Controllers\ProfileController;
use Modules\User\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('student/dashboard', [DashboardController::class, 'student'])->name(Dashboard::STUDENT)->middleware('role:student|instructor|admin');
    Route::get('instructor/dashboard', [DashboardController::class, 'instructor'])->name(Dashboard::INSTRUCTOR)->middleware('role:instructor|admin');
    Route::get('admin/dashboard', [DashboardController::class, 'admin'])->name(Dashboard::ADMIN)->middleware('role:admin');

    Route::middleware(['role:admin'])->prefix(Dashboard::getAdminPrefix())->group(function () {
        require __DIR__ . '/admin.php';
    });

    Route::middleware(['role:instructor|admin'])->prefix(Dashboard::getInstructorPrefix())->group(function () {
        Route::redirect('/', Dashboard::getInstructorPrefix() . '/dashboard');
        require __DIR__ . '/instructor.php';
        Route::get('instructor/courses', [UserController::class, 'courses'])->name('instructor.courses');
    });

    Route::middleware(['role:student|instructor|admin'])->prefix(Dashboard::getStudentPrefix())
        ->name(Dashboard::STUDENT_NAME . '.')
        ->group(function () {
            Route::redirect('/', Dashboard::getStudentPrefix() . '/dashboard');
            require __DIR__ . '/student.php';
        });
});
require __DIR__ . '/auth.php';
