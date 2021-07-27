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
Route::group(['middleware' => ['admin', 'auth']], function(){
	Route::get('admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');

	// setups management
	Route::group(['prefix' => 'setups'], function(){
		// department
		Route::get('/department/view', [App\Http\Controllers\Admin\DepartmentController::class, 'view'])->name('department.view');
		Route::get('/department/add', [App\Http\Controllers\Admin\DepartmentController::class, 'add'])->name('department.add');
		Route::post('/department/store', [App\Http\Controllers\Admin\DepartmentController::class, 'store'])->name('department.store');
		Route::get('/department/edit/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'edit'])->name('department.edit');
		Route::post('/department/update/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'update'])->name('department.update');
		Route::get('/department/delete/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'delete'])->name('department.delete');


		// for designation
		Route::get('/designation/view', [App\Http\Controllers\Admin\DesignationController::class, 'view'])->name('designation.view');
		Route::get('/designation/add', [App\Http\Controllers\Admin\DesignationController::class, 'add'])->name('designation.add');
		Route::post('/designation/store', [App\Http\Controllers\Admin\DesignationController::class, 'store'])->name('designation.store');
		Route::get('/designation/edit/{id}', [App\Http\Controllers\Admin\DesignationController::class, 'edit'])->name('designation.edit');
		Route::post('/designation/update/{id}', [App\Http\Controllers\Admin\DesignationController::class, 'update'])->name('designation.update');
		Route::get('/designation/delete/{id}', [App\Http\Controllers\Admin\DesignationController::class, 'delete'])->name('designation.delete');

		// for account
		Route::get('/account/view', [App\Http\Controllers\Admin\AccountController::class, 'view'])->name('account.view');
		Route::get('/account/add', [App\Http\Controllers\Admin\AccountController::class, 'add'])->name('account.add');
		Route::post('/account/store', [App\Http\Controllers\Admin\AccountController::class, 'store'])->name('account.store');
		Route::get('/account/edit/{id}', [App\Http\Controllers\Admin\AccountController::class, 'edit'])->name('account.edit');
		Route::post('/account/update/{id}', [App\Http\Controllers\Admin\AccountController::class, 'update'])->name('account.update');
		Route::get('/account/delete/{id}', [App\Http\Controllers\Admin\AccountController::class, 'delete'])->name('account.delete');

	});	

	// kam management
	Route::group(['prefix' => 'kam_manage'], function(){
		// for student
		Route::get('/kam/view', [App\Http\Controllers\Admin\KamController::class, 'view'])->name('kam.view');
		Route::get('/kam/add', [App\Http\Controllers\Admin\KamController::class, 'add'])->name('kam.add');
		Route::post('/kam/store', [App\Http\Controllers\Admin\KamController::class, 'store'])->name('kam.store');
		Route::get('/kam/edit/{id}', [App\Http\Controllers\Admin\KamController::class, 'edit'])->name('kam.edit');
		Route::post('/kam/update/{id}', [App\Http\Controllers\Admin\KamController::class, 'update'])->name('kam.update');
		Route::get('/kam/delete/{id}', [App\Http\Controllers\Admin\KamController::class, 'delete'])->name('kam.delete');
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
