<?php

use Modules\User\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AdminController;
use Modules\User\Http\Controllers\PluginController;
use Modules\User\Http\Controllers\RoleController;

Route::get('users', [AdminController::class, 'index'])->name('admin.users.index');
Route::get('/user/create', [AdminController::class, 'create'])->name('admin.users.create');
Route::post('/user/store', [AdminController::class, 'store'])->name('admin.user.store');
Route::get('admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
Route::put('admin/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
Route::delete('admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');

Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
Route::patch('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

Route::put('admin/users/{user}/role', [UserController::class, 'updateRole'])->name('admin.users.updateRole');
Route::put('admin/users/{user}/toggle-email-verification', [
    UserController::class,
    'toggleEmailVerification'
])->name('admin.users.toggleEmailVerification');


// User Roles

Route::get('roles', [RoleController::class, 'index'])->name('admin.roles.index');
Route::get('roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
Route::post('roles/store', [RoleController::class, 'store'])->name('admin.roles.store');
Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit');
Route::put('roles/{role}', [RoleController::class, 'update'])->name('admin.roles.update');
Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');

// Plugins
Route::get('plugins', [PluginController::class, 'index'])->name('admin.plugins.index');
Route::post('plugins/{module}/deactivate', [PluginController::class, 'deactivate'])->name('admin.plugins.deactivate');
Route::post('plugins/{module}/activate', [PluginController::class, 'activate'])->name('admin.plugins.activate');
Route::post('plugins/{module}/delete', [PluginController::class, 'delete'])->name('admin.plugins.delete');
