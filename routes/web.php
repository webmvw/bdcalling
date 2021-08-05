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

		// view admin list
		Route::get('/adminList/view', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'adminview'])->name('adminList.view');

		// view kamsales list
		Route::get('/kamsalesList/view', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'kamsalesview'])->name('kamsalesList.view');

		// view kamoperation list
		Route::get('/kamoperationList/view', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'kamoperationview'])->name('kamoperationList.view');
	});


    // employee management
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
<<<<<<< HEAD
	});
=======


		Route::get('/order/status/{id}', [App\Http\Controllers\KAMOperation\OrderController::class, 'status'])->name('kamoperation.order.status');
		Route::post('/order/status/update/{id}', [App\Http\Controllers\KAMOperation\OrderController::class, 'statusUpdate'])->name('kamoperation.order.status.update');
		Route::get('/order/delivery/{id}', [App\Http\Controllers\KAMOperation\OrderController::class, 'delivery'])->name('kamoperation.order.delivery');
		Route::post('/order/delivery/success/{id}', [App\Http\Controllers\KAMOperation\OrderController::class, 'deliverySuccess'])->name('kamoperation.order.delivery.success');

		Route::get('/delivery/view', [App\Http\Controllers\KAMOperation\OrderController::class, 'deliveryList'])->name('kamoperation.delivery.view');

	});	
>>>>>>> 6e2b2246c1084fe563c7876b0af04d3583d644e4

});
