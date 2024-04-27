<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthUserMiddleware;

Route::get('/', function(){
    return view('signin');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/loginpage', function(){
    return view('signin');
})->name('loginpage');

Route::middleware([AuthUserMiddleware::class])->group(function () {
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
    Route::get('/add_company', [CompanyController::class, 'create']);
    Route::post('/store_company', [CompanyController::class, 'store'])->name('store_company');
    Route::get('/edit_company/{id}', [CompanyController::class, 'edit'])->name('edit_company');
    Route::delete('/delete_company/{id}', [CompanyController::class, 'destroy'])->name('delete_company');
    Route::put('/update_company/{id}', [CompanyController::class, 'update'])->name('update_company');

    
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
    Route::get('/add_employee', [EmployeeController::class, 'create']);
    Route::post('/store_employee', [EmployeeController::class, 'store'])->name('store_employee');
    Route::get('/edit_employee/{id}', [EmployeeController::class, 'edit'])->name('edit_employee');
    Route::delete('/delete_employee/{id}', [EmployeeController::class, 'destroy'])->name('delete_employee');
    Route::put('/update_employee/{id}', [EmployeeController::class, 'update'])->name('update_employee');

    Route::get('/logout', [AuthController::class,'logout']);

});
