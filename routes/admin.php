<?php

use App\Http\Controllers\Admin\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')
    ->prefix('admin')
    ->namespace('Admin')
    ->group(function () {
    Route::get('/login', [\App\Http\Controllers\Admin\Auth\AdminAuthController::class, 'showLogin'])->name('adminLogin');
    Route::post('/login', [\App\Http\Controllers\Admin\Auth\AdminAuthController::class, 'storeLogin'])->name('adminLoginPost');
});

Route::middleware(['web', 'adminAuth'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/', function () {
            /*return \Inertia\Inertia::render('Admin/Dashboard',[
                'user'=> \Illuminate\Support\Facades\Auth::guard('admin')->user(),
            ]);*/
            return view('admin.dashboard');
        })->name('adminDashboard');
        Route::get('/logout', [AdminAuthController::class, 'destroy'])->name('adminLogout');

        Route::resource('company', \App\Http\Controllers\Admin\CompanyController::class);
        Route::resource('employee', \App\Http\Controllers\Admin\EmployeeController::class);
    });

