<?php

use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
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

Route::resource('users', UserController::class);

Route::post('login', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::put('users/{user}/change-password', [UserController::class, 'change_password'])->name('change_password');

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::resource('countries', CountryController::class);
Route::resource('states', StateController::class);
Route::resource('cities', CityController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('employees', EmployeeController::class);

Route::get('register', function() {
    return view('users.register');
})->name('register')->middleware('guest');

Route::get('login', function() {
    return view('users.login');
})->name('login')->middleware('guest');




