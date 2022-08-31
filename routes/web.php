<?php

use App\Http\Controllers\Dashboard\CurrencyController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DepartmentController;
use App\Http\Controllers\Dashboard\DesignationController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\OptionController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => '/', 'middleware' => ['guest']], function() {
    Route::get('/', [FrontendController::class, 'index'])->name('home');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'employee'], function() {
        Route::get('export', [EmployeeController::class, 'export'])->name('employee.export');
        Route::get('import', [EmployeeController::class, 'import'])->name('employee.import');
    });
    Route::resource('employee', EmployeeController::class);
    Route::resource('designation', DesignationController::class);
    Route::resource('department', DepartmentController::class);

    Route::group(['prefix' => 'manage'], function() {
        Route::resource('currency', CurrencyController::class);
        Route::resource('user', UserController::class);
        Route::resource('role', RoleController::class);
        Route::resource('permission', PermissionController::class);
        Route::resource('option', OptionController::class)->only(['index', 'store']);
    });
});

require __DIR__.'/auth.php';
