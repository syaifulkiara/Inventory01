<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\OutputController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DepartmentController;
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

Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::get('/detail/{id:slug}', [App\Http\Controllers\MainController::class, 'detail'])->name('main.detail');
Route::get('/search', [App\Http\Controllers\MainController::class, 'cari'])->name('main.cari');

Auth::routes();
Route::middleware(['auth'])->group(function(){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('brands', BrandController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('inputs', InputController::class);
Route::resource('outputs', OutputController::class);
Route::resource('units', UnitController::class);
Route::resource('reports', ReportController::class);
Route::resource('users', UserController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('departments', DepartmentController::class);
});
