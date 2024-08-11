<?php

use Illuminate\Support\Facades\Route;
use Modules\Page\Http\Controllers\PageController;

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

Route::get('admin/pages', [PageController::class, 'index'])->name('admin.page.index');
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');
Route::get('admin/page/create', [PageController::class, 'create'])->name('admin.page.create');
Route::post('admin/ajax/page/store', [PageController::class, 'ajaxPageStore'])->name('admin.ajax.page.store');
Route::post('admin/page/store', [PageController::class, 'store'])->name('admin.page.store');

Route::get('/page/content/create/{id}', [PageController::class, 'content'])->name('admin.page.content');

Route::post('/render-widget', [PageController::class, 'render'])->name('render-widget');
Route::post('/render-controls', [PageController::class, 'renderControls'])->name('render-controls');
Route::post('/save-page', [PageController::class, 'savePage'])->name('save-page');


// Route::get('/page/{slug}', [PageController::class, 'show']);/