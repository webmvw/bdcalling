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
|  Routes for owner
|--------------------------------------------------------------------------
|
| this routes access for only owner
|
*/
Route::group(['middleware' => ['owner', 'auth']], function(){
	Route::get('owner/dashboard', [App\Http\Controllers\Owner\OwnerController::class, 'index'])->name('owner.dashboard');

	// setups management
	Route::group(['prefix' => 'setups'], function(){
		// department
		Route::get('owner/department/view', [App\Http\Controllers\Owner\DepartmentController::class, 'view'])->name('owner.department.view');
		Route::get('owner/department/add', [App\Http\Controllers\Owner\DepartmentController::class, 'add'])->name('owner.department.add');
		Route::post('owner/department/store', [App\Http\Controllers\Owner\DepartmentController::class, 'store'])->name('owner.department.store');
		Route::get('owner/department/edit/{id}', [App\Http\Controllers\Owner\DepartmentController::class, 'edit'])->name('owner.department.edit');
		Route::post('owner/department/update/{id}', [App\Http\Controllers\Owner\DepartmentController::class, 'update'])->name('owner.department.update');
		Route::get('owner/department/delete/{id}', [App\Http\Controllers\Owner\DepartmentController::class, 'delete'])->name('owner.department.delete');


		// department
		Route::get('owner/team/view', [App\Http\Controllers\Owner\TeamController::class, 'view'])->name('owner.team.view');
		Route::get('owner/team/add', [App\Http\Controllers\Owner\TeamController::class, 'add'])->name('owner.team.add');
		Route::post('owner/team/store', [App\Http\Controllers\Owner\TeamController::class, 'store'])->name('owner.team.store');
		Route::get('owner/team/edit/{id}', [App\Http\Controllers\Owner\TeamController::class, 'edit'])->name('owner.team.edit');
		Route::post('owner/team/update/{id}', [App\Http\Controllers\Owner\TeamController::class, 'update'])->name('owner.team.update');
		Route::get('owner/team/delete/{id}', [App\Http\Controllers\Owner\TeamController::class, 'delete'])->name('owner.team.delete');


		// for designation
		Route::get('owner/designation/view', [App\Http\Controllers\Owner\DesignationController::class, 'view'])->name('owner.designation.view');
		Route::get('owner/designation/add', [App\Http\Controllers\Owner\DesignationController::class, 'add'])->name('owner.designation.add');
		Route::post('owner/designation/store', [App\Http\Controllers\Owner\DesignationController::class, 'store'])->name('owner.designation.store');
		Route::get('owner/designation/edit/{id}', [App\Http\Controllers\Owner\DesignationController::class, 'edit'])->name('owner.designation.edit');
		Route::post('owner/designation/update/{id}', [App\Http\Controllers\Owner\DesignationController::class, 'update'])->name('owner.designation.update');
		Route::get('owner/designation/delete/{id}', [App\Http\Controllers\Owner\DesignationController::class, 'delete'])->name('owner.designation.delete');


		// for grade
		Route::get('owner/grade/view', [App\Http\Controllers\Owner\GradeController::class, 'view'])->name('owner.grade.view');
		Route::get('owner/grade/add', [App\Http\Controllers\Owner\GradeController::class, 'add'])->name('owner.grade.add');
		Route::post('owner/grade/store', [App\Http\Controllers\Owner\GradeController::class, 'store'])->name('owner.grade.store');
		Route::get('owner/grade/edit/{id}', [App\Http\Controllers\Owner\GradeController::class, 'edit'])->name('owner.grade.edit');
		Route::post('owner/grade/update/{id}', [App\Http\Controllers\Owner\GradeController::class, 'update'])->name('owner.grade.update');
		Route::get('owner/grade/delete/{id}', [App\Http\Controllers\Owner\GradeController::class, 'delete'])->name('owner.grade.delete');


		// for account
		Route::get('owner/account/view', [App\Http\Controllers\Owner\AccountController::class, 'view'])->name('owner.account.view');
		Route::get('owner/account/add', [App\Http\Controllers\Owner\AccountController::class, 'add'])->name('owner.account.add');
		Route::post('owner/account/store', [App\Http\Controllers\Owner\AccountController::class, 'store'])->name('owner.account.store');
		Route::get('owner/account/edit/{id}', [App\Http\Controllers\Owner\AccountController::class, 'edit'])->name('owner.account.edit');
		Route::post('owner/account/update/{id}', [App\Http\Controllers\Owner\AccountController::class, 'update'])->name('owner.account.update');
		Route::get('owner/account/delete/{id}', [App\Http\Controllers\Owner\AccountController::class, 'delete'])->name('owner.account.delete');

		// for franchise
		Route::get('owner/franchise/view', [App\Http\Controllers\Owner\FranchiseController::class, 'view'])->name('owner.franchise.view');
		Route::get('owner/franchise/add', [App\Http\Controllers\Owner\FranchiseController::class, 'add'])->name('owner.franchise.add');
		Route::post('owner/franchise/store', [App\Http\Controllers\Owner\FranchiseController::class, 'store'])->name('owner.franchise.store');
		Route::get('owner/franchise/edit/{id}', [App\Http\Controllers\Owner\FranchiseController::class, 'edit'])->name('owner.franchise.edit');
		Route::post('owner/franchise/update/{id}', [App\Http\Controllers\Owner\FranchiseController::class, 'update'])->name('owner.franchise.update');
		Route::get('owner/franchise/delete/{id}', [App\Http\Controllers\Owner\FranchiseController::class, 'delete'])->name('owner.franchise.delete');

	});




	// employee management
	Route::group(['prefix' => 'employee_manage'], function(){
		// for employee
		Route::get('owner/employee/view', [App\Http\Controllers\Owner\EmployeeController::class, 'view'])->name('owner.employee.view');
		Route::get('owner/employee/add', [App\Http\Controllers\Owner\EmployeeController::class, 'add'])->name('owner.employee.add');
		Route::post('owner/employee/store', [App\Http\Controllers\Owner\EmployeeController::class, 'store'])->name('owner.employee.store');
		Route::get('owner/employee/edit/{id}', [App\Http\Controllers\Owner\EmployeeController::class, 'edit'])->name('owner.employee.edit');
		Route::post('owner/employee/update/{id}', [App\Http\Controllers\Owner\EmployeeController::class, 'update'])->name('owner.employee.update');
		Route::get('owner/employee/details/{id}', [App\Http\Controllers\Owner\EmployeeController::class, 'show'])->name('owner.employee.show');
		Route::post('owner/salaryincrement/store', [App\Http\Controllers\Owner\EmployeeController::class, 'employeSalaryIncrement'])->name('owner.employee.salaryIncrement');
		Route::get('owner/franchiseOwner/view', [App\Http\Controllers\Owner\EmployeeController::class, 'franchiseOwnerView'])->name('owner.franchiseOwner.view');

	});


    // order&delivery management
    Route::group(['prefix' => 'allorder_manage'], function(){
        // for all order List
        Route::post('owner/allorder/view', [App\Http\Controllers\Owner\AllorderController::class, 'view'])->name('owner.report.view');
        Route::post('owner/month/report', [App\Http\Controllers\Owner\AllorderController::class, 'Month_Report'])->name('owner.month.report');
        Route::get('owner/allorder/view', [App\Http\Controllers\Owner\AllorderController::class, 'allOrderView'])->name('owner.allorder.view');
        Route::get('owner/delivery/view', [App\Http\Controllers\Owner\AllorderController::class, 'DeliveryView'])->name('owner.delivery.view');
        Route::post('owner/delivery/report', [App\Http\Controllers\Owner\AllorderController::class, 'deliveryReport'])->name('owner.delivery.report');


        //
    });

});






















/*
|--------------------------------------------------------------------------
|  Routes for Super Admin
|--------------------------------------------------------------------------
|
| this routes access for only superadmin
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


		// department
		Route::get('/team/view', [App\Http\Controllers\SuperAdmin\TeamController::class, 'view'])->name('team.view');
		Route::get('/team/add', [App\Http\Controllers\SuperAdmin\TeamController::class, 'add'])->name('team.add');
		Route::post('/team/store', [App\Http\Controllers\SuperAdmin\TeamController::class, 'store'])->name('team.store');
		Route::get('/team/edit/{id}', [App\Http\Controllers\SuperAdmin\TeamController::class, 'edit'])->name('team.edit');
		Route::post('/team/update/{id}', [App\Http\Controllers\SuperAdmin\TeamController::class, 'update'])->name('team.update');
		Route::get('/team/delete/{id}', [App\Http\Controllers\SuperAdmin\TeamController::class, 'delete'])->name('team.delete');


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

		// for franchise
		Route::get('/franchise/view', [App\Http\Controllers\SuperAdmin\FranchiseController::class, 'view'])->name('franchise.view');
		Route::get('/franchise/add', [App\Http\Controllers\SuperAdmin\FranchiseController::class, 'add'])->name('franchise.add');
		Route::post('/franchise/store', [App\Http\Controllers\SuperAdmin\FranchiseController::class, 'store'])->name('franchise.store');
		Route::get('/franchise/edit/{id}', [App\Http\Controllers\SuperAdmin\FranchiseController::class, 'edit'])->name('franchise.edit');
		Route::post('/franchise/update/{id}', [App\Http\Controllers\SuperAdmin\FranchiseController::class, 'update'])->name('franchise.update');
		Route::get('/franchise/delete/{id}', [App\Http\Controllers\SuperAdmin\FranchiseController::class, 'delete'])->name('franchise.delete');

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
		Route::post('/salaryincrement/store', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'employeSalaryIncrement'])->name('employee.salaryIncrement');

		Route::get('/franchise/owner/view', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'franchiseOwnerView'])->name('franchiseOwner.view');

	
	});


    // order&delivery management
    Route::group(['prefix' => 'allorder_manage'], function(){
        // for all order List
        Route::post('/allorder/view', [App\Http\Controllers\SuperAdmin\AllorderController::class, 'view'])->name('report.view');
        Route::post('/month/report', [App\Http\Controllers\SuperAdmin\AllorderController::class, 'Month_Report'])->name('month.report');
        Route::get('/allorder/view', [App\Http\Controllers\SuperAdmin\AllorderController::class, 'allOrderView'])->name('allorder.view');
        Route::get('/delivery/view', [App\Http\Controllers\SuperAdmin\AllorderController::class, 'DeliveryView'])->name('delivery.view');
        Route::post('/delivery/report', [App\Http\Controllers\SuperAdmin\AllorderController::class, 'deliveryReport'])->name('delivery.report');


        //
    });


});












/*
|--------------------------------------------------------------------------
|  Routes for admin
|--------------------------------------------------------------------------
|
| this routes access for only admin
|
*/
Route::group(['middleware' => ['franchiseOwner', 'auth']], function(){
	Route::get('franchiseOwner/dashboard', [App\Http\Controllers\FranchiseOwner\FranchiseOwnerController::class, 'index'])->name('franchiseowner.dashboard');

});























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



















/*
|--------------------------------------------------------------------------
|  Routes for KAM Sales
|--------------------------------------------------------------------------
|
| this routes access for only user
|
*/
Route::group(['middleware' => ['kamsales', 'auth']], function(){

	Route::get('kamsales/dashboard', [App\Http\Controllers\KAMSales\KAMSalesController::class, 'index'])->name('kamsales.dashboard');

	// order manage
	Route::group(['prefix' => 'order_manage'], function(){
		// for order
		Route::get('/order/view', [App\Http\Controllers\KAMSales\OrderController::class, 'view'])->name('order.view');
		Route::get('/order/add', [App\Http\Controllers\KAMSales\OrderController::class, 'add'])->name('order.add');
		Route::post('/order/store', [App\Http\Controllers\KAMSales\OrderController::class, 'store'])->name('order.store');
	});

});



















/*
|--------------------------------------------------------------------------
|  Routes for kam operation
|--------------------------------------------------------------------------
|
| this routes access for only kam operation
|
*/
Route::group(['middleware' => ['kamoperation', 'auth']], function(){
	Route::get('kamoperation/dashboard', [App\Http\Controllers\KAMOperation\KAMOperationController::class, 'index'])->name('kamoperation.dashboard');

	// order manage
	Route::group(['prefix' => 'kamoperation.order_manage'], function(){
		// for order
		Route::get('/order/view', [App\Http\Controllers\KAMOperation\OrderController::class, 'view'])->name('kamoperation.order.view');
	}); 	

});
