<?php
use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\UserController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AdminController::class, 'index'])->middleware('can:admin.index')->name('admin.index');
Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy'])->names('admin.users');
Route::resource('categories', CategoryController::class)->except(['show'])->names('admin.categories');
Route::resource('tags', TagController::class)->except(['show'])->names('admin.tags');
Route::resource('posts', PostController::class)->names('admin.posts');
Route::resource('roles', RoleController::class)->except(['show'])->names('admin.roles');

