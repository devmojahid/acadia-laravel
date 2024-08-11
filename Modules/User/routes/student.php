<?php

use Modules\User\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\ProfileController;


Route::prefix('settings')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::post('/profile/change-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::get('/profile/widthdraw', [ProfileController::class, 'withdraw'])->name('profile.withdraw');
    Route::get('/profile/social', [ProfileController::class, 'social'])->name('profile.social');


    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/social/update', [ProfileController::class, 'socailUpdate'])->name('profile.social.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
