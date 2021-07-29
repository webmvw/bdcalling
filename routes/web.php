<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();



/*
|--------------------------------------------------------------------------
|  Routes for admin
|--------------------------------------------------------------------------
|
| this routes access for only admin
|
*/
Route::group(['middleware' => ['superadmin', 'auth']], function(){
	Route::get('superadmin/dashboard', [App\Http\Controllers\SuperAdmin\AdminController::class, 'index'])->name('superadmin.dashboard');

	// setups management
	Route::group(['prefix' => 'setups'], function(){
		// department
		Route::get('/department/view', [App\Http\Controllers\SuperAdmin\DepartmentController::class, 'view'])->name('department.view');
		Route::get('/department/add', [App\Http\Controllers\SuperAdmin\DepartmentController::class, 'add'])->name('department.add');
		Route::post('/department/store', [App\Http\Controllers\SuperAdmin\DepartmentController::class, 'store'])->name('department.store');
		Route::get('/department/edit/{id}', [App\Http\Controllers\SuperAdmin\DepartmentController::class, 'edit'])->name('department.edit');
		Route::post('/department/update/{id}', [App\Http\Controllers\SuperAdmin\DepartmentController::class, 'update'])->name('department.update');
		Route::get('/department/delete/{id}', [App\Http\Controllers\SuperAdmin\DepartmentController::class, 'delete'])->name('department.delete');


		// for designation
		Route::get('/designation/view', [App\Http\Controllers\SuperAdmin\DesignationController::class, 'view'])->name('designation.view');
		Route::get('/designation/add', [App\Http\Controllers\SuperAdmin\DesignationController::class, 'add'])->name('designation.add');
		Route::post('/designation/store', [App\Http\Controllers\SuperAdmin\DesignationController::class, 'store'])->name('designation.store');
		Route::get('/designation/edit/{id}', [App\Http\Controllers\SuperAdmin\DesignationController::class, 'edit'])->name('designation.edit');
		Route::post('/designation/update/{id}', [App\Http\Controllers\SuperAdmin\DesignationController::class, 'update'])->name('designation.update');
		Route::get('/designation/delete/{id}', [App\Http\Controllers\SuperAdmin\DesignationController::class, 'delete'])->name('designation.delete');


		// for grade
		Route::get('/grade/view', [App\Http\Controllers\SuperAdmin\GradeController::class, 'view'])->name('grade.view');
		Route::get('/grade/add', [App\Http\Controllers\SuperAdmin\GradeController::class, 'add'])->name('grade.add');
		Route::post('/grade/store', [App\Http\Controllers\SuperAdmin\GradeController::class, 'store'])->name('grade.store');
		Route::get('/grade/edit/{id}', [App\Http\Controllers\SuperAdmin\GradeController::class, 'edit'])->name('grade.edit');
		Route::post('/grade/update/{id}', [App\Http\Controllers\SuperAdmin\GradeController::class, 'update'])->name('grade.update');
		Route::get('/grade/delete/{id}', [App\Http\Controllers\SuperAdmin\GradeController::class, 'delete'])->name('grade.delete');


		// for account
		Route::get('/account/view', [App\Http\Controllers\SuperAdmin\AccountController::class, 'view'])->name('account.view');
		Route::get('/account/add', [App\Http\Controllers\SuperAdmin\AccountController::class, 'add'])->name('account.add');
		Route::post('/account/store', [App\Http\Controllers\SuperAdmin\AccountController::class, 'store'])->name('account.store');
		Route::get('/account/edit/{id}', [App\Http\Controllers\SuperAdmin\AccountController::class, 'edit'])->name('account.edit');
		Route::post('/account/update/{id}', [App\Http\Controllers\SuperAdmin\AccountController::class, 'update'])->name('account.update');
		Route::get('/account/delete/{id}', [App\Http\Controllers\SuperAdmin\AccountController::class, 'delete'])->name('account.delete');

	});	

	// employee management
	Route::group(['prefix' => 'employee_manage'], function(){
		// for employee
		Route::get('/employee/view', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'view'])->name('employee.view');
		Route::get('/employee/add', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'add'])->name('employee.add');
		Route::post('/employee/store', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'store'])->name('employee.store');
		Route::get('/employee/edit/{id}', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'edit'])->name('employee.edit');
		Route::post('/employee/update/{id}', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'update'])->name('employee.update');
		Route::get('/employee/details/{id}', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'show'])->name('employee.show');
	});

});



/*
|--------------------------------------------------------------------------
|  Routes for user
|--------------------------------------------------------------------------
|
| this routes access for only user
|
*/
Route::group(['middleware' => ['user', 'auth']], function(){
	Route::get('user/dashboard', [App\Http\Controllers\User\UserController::class, 'index'])->name('user.dashboard');
		
});
