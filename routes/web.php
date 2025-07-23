<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;

Route::get('login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('register', [App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('employee', EmployeeController::class);
Route::resource('teacher', TeacherController::class);
Route::resource('student', StudentController::class);
Route::resource('department', DepartmentController::class);
Route::resource('course', CourseController::class);
