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
		Route::post('owner/department/search', [App\Http\Controllers\Owner\DepartmentController::class, 'search'])->name('owner.department.search');
		Route::get('owner/department/add', [App\Http\Controllers\Owner\DepartmentController::class, 'add'])->name('owner.department.add');
		Route::post('owner/department/store', [App\Http\Controllers\Owner\DepartmentController::class, 'store'])->name('owner.department.store');
		Route::get('owner/department/edit/{id}', [App\Http\Controllers\Owner\DepartmentController::class, 'edit'])->name('owner.department.edit');
		Route::post('owner/department/update/{id}', [App\Http\Controllers\Owner\DepartmentController::class, 'update'])->name('owner.department.update');
		Route::get('owner/department/delete/{id}', [App\Http\Controllers\Owner\DepartmentController::class, 'delete'])->name('owner.department.delete');

		// team
		Route::get('owner/team/view', [App\Http\Controllers\Owner\TeamController::class, 'view'])->name('owner.team.view');
		Route::post('owner/team/search', [App\Http\Controllers\Owner\TeamController::class, 'search'])->name('owner.team.search');
		Route::get('owner/team/add', [App\Http\Controllers\Owner\TeamController::class, 'add'])->name('owner.team.add');
		Route::post('owner/team/store', [App\Http\Controllers\Owner\TeamController::class, 'store'])->name('owner.team.store');
		Route::get('owner/team/edit/{id}', [App\Http\Controllers\Owner\TeamController::class, 'edit'])->name('owner.team.edit');
		Route::post('owner/team/update/{id}', [App\Http\Controllers\Owner\TeamController::class, 'update'])->name('owner.team.update');
		Route::get('owner/team/delete/{id}', [App\Http\Controllers\Owner\TeamController::class, 'delete'])->name('owner.team.delete');

		// for designation
		Route::get('owner/designation/view', [App\Http\Controllers\Owner\DesignationController::class, 'view'])->name('owner.designation.view');
		Route::post('owner/designation/search', [App\Http\Controllers\Owner\DesignationController::class, 'search'])->name('owner.designation.search');
		Route::get('owner/designation/add', [App\Http\Controllers\Owner\DesignationController::class, 'add'])->name('owner.designation.add');
		Route::post('owner/designation/store', [App\Http\Controllers\Owner\DesignationController::class, 'store'])->name('owner.designation.store');
		Route::get('owner/designation/edit/{id}', [App\Http\Controllers\Owner\DesignationController::class, 'edit'])->name('owner.designation.edit');
		Route::post('owner/designation/update/{id}', [App\Http\Controllers\Owner\DesignationController::class, 'update'])->name('owner.designation.update');
		Route::get('owner/designation/delete/{id}', [App\Http\Controllers\Owner\DesignationController::class, 'delete'])->name('owner.designation.delete');

		// for grade
		Route::get('owner/grade/view', [App\Http\Controllers\Owner\GradeController::class, 'view'])->name('owner.grade.view');
		Route::post('owner/grade/search', [App\Http\Controllers\Owner\GradeController::class, 'search'])->name('owner.grade.search');
		Route::get('owner/grade/add', [App\Http\Controllers\Owner\GradeController::class, 'add'])->name('owner.grade.add');
		Route::post('owner/grade/store', [App\Http\Controllers\Owner\GradeController::class, 'store'])->name('owner.grade.store');
		Route::get('owner/grade/edit/{id}', [App\Http\Controllers\Owner\GradeController::class, 'edit'])->name('owner.grade.edit');
		Route::post('owner/grade/update/{id}', [App\Http\Controllers\Owner\GradeController::class, 'update'])->name('owner.grade.update');
		Route::get('owner/grade/delete/{id}', [App\Http\Controllers\Owner\GradeController::class, 'delete'])->name('owner.grade.delete');

		// for account
		Route::get('owner/account/view', [App\Http\Controllers\Owner\AccountController::class, 'view'])->name('owner.account.view');
		Route::post('owner/account/search', [App\Http\Controllers\Owner\AccountController::class, 'search'])->name('owner.account.search');
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
		Route::post('owner/employee/search', [App\Http\Controllers\Owner\EmployeeController::class, 'search'])->name('owner.employee.search');
		Route::get('owner/employee/add', [App\Http\Controllers\Owner\EmployeeController::class, 'add'])->name('owner.employee.add');
		Route::post('owner/employee/store', [App\Http\Controllers\Owner\EmployeeController::class, 'store'])->name('owner.employee.store');
		Route::get('owner/employee/edit/{id}', [App\Http\Controllers\Owner\EmployeeController::class, 'edit'])->name('owner.employee.edit');
		Route::post('owner/employee/update/{id}', [App\Http\Controllers\Owner\EmployeeController::class, 'update'])->name('owner.employee.update');
		Route::get('owner/employee/details/{id}', [App\Http\Controllers\Owner\EmployeeController::class, 'show'])->name('owner.employee.show');
		Route::post('owner/salaryincrement/store', [App\Http\Controllers\Owner\EmployeeController::class, 'employeSalaryIncrement'])->name('owner.employee.salaryIncrement');
		Route::get('owner/franchiseOwner/view', [App\Http\Controllers\Owner\EmployeeController::class, 'franchiseOwnerView'])->name('owner.franchiseOwner.view');

		Route::get('owner/get/department', [App\Http\Controllers\Owner\EmployeeController::class, 'get_department'])->name('owner.get_department');
		Route::get('owner/get/designation', [App\Http\Controllers\Owner\EmployeeController::class, 'get_designation'])->name('owner.get_designation');
		Route::get('owner/get/grade', [App\Http\Controllers\Owner\EmployeeController::class, 'get_grade'])->name('owner.get_grade');

	});


    // order&delivery management
    Route::group(['prefix' => 'allorder_manage'], function(){
        // for all order List
        Route::post('owner/allorder/view', [App\Http\Controllers\Owner\AllOrderController::class, 'view'])->name('owner.report.view');
        Route::post('owner/month/report', [App\Http\Controllers\Owner\AllOrderController::class, 'Month_Report'])->name('owner.month.report');
        Route::get('owner/allorder/view', [App\Http\Controllers\Owner\AllOrderController::class, 'allOrderView'])->name('owner.allorder.view');
        Route::get('owner/delivery/view', [App\Http\Controllers\Owner\AllOrderController::class, 'DeliveryView'])->name('owner.delivery.view');
        Route::post('owner/delivery/report', [App\Http\Controllers\Owner\AllOrderController::class, 'deliveryReport'])->name('owner.delivery.report');
    });


    Route::group(['prefix' => 'order_report'], function(){
    	// all order report
    	Route::get('owner/order_report', [App\Http\Controllers\Owner\Report\OrderReportController::class, 'allOrderReport'])->name('owner.allOrderReport');
    	Route::post('owner/order_report', [App\Http\Controllers\Owner\Report\OrderReportController::class, 'allOrderReportRequest'])->name('owner.allOrderReportRequest');

    	// franchise wise order report
    	Route::get('owner/franchise/order_report', [App\Http\Controllers\Owner\Report\OrderReportController::class, 'franchiseWiseOrderReport'])->name('owner.franchiseWiseOrderReport');
    	Route::post('owner/franchise/order_report', [App\Http\Controllers\Owner\Report\OrderReportController::class, 'franchiseWiseOrderReportRequest'])->name('owner.franchiseWiseOrderReportRequest');

    	// department wise order report
    	Route::get('owner/departmentwise/order_report', [App\Http\Controllers\Owner\Report\OrderReportController::class, 'departmentwiseOrderReport'])->name('owner.departmentwiseOrderReport');
    	Route::post('owner/departmentwise/order_report', [App\Http\Controllers\Owner\Report\OrderReportController::class, 'departmentwiseOrderReportRequest'])->name('owner.departmentwiseOrderReportRequest');

    	// account wise order report
    	Route::get('owner/accountwise/order_report', [App\Http\Controllers\Owner\Report\OrderReportController::class, 'accountwiseOrderReport'])->name('owner.accountwiseOrderReport');
    	Route::post('owner/accountwise/order_report', [App\Http\Controllers\Owner\Report\OrderReportController::class, 'accountwiseOrderReportRequest'])->name('owner.accountwiseOrderReportRequest');

    	// kam sales order report
    	Route::get('owner/kamsales/order_report', [App\Http\Controllers\Owner\Report\OrderReportController::class, 'kamsalesOrderReport'])->name('owner.kamsalesOrderReport');
    	Route::post('owner/kamsales/order_report', [App\Http\Controllers\Owner\Report\OrderReportController::class, 'kamsalesOrderReportRequest'])->name('owner.kamsalesOrderReportRequest');
    });


    Route::group(['prefix' => 'delivery_report'], function(){
    	// all delivery report
    	Route::get('owner/delivery_report', [App\Http\Controllers\Owner\Report\DeliveryReportController::class, 'allDeliveryReport'])->name('owner.allDeliveryReport');
    	Route::post('owner/delivery_report', [App\Http\Controllers\Owner\Report\DeliveryReportController::class, 'allDeliveryReportRequest'])->name('owner.allDeliveryReportRequest');

    	// franchise wise delivery report
    	Route::get('owner/franchise/delivery_report', [App\Http\Controllers\Owner\Report\DeliveryReportController::class, 'franchiseWiseDeliveryReport'])->name('owner.franchiseWiseDeliveryReport');
    	Route::post('owner/franchise/delivery_report', [App\Http\Controllers\Owner\Report\DeliveryReportController::class, 'franchiseWiseDeliveryReportRequest'])->name('owner.franchiseWiseDeliveryReportRequest');

    	// department wise delivery report
    	Route::get('owner/departmentwise/delivery_report', [App\Http\Controllers\Owner\Report\DeliveryReportController::class, 'departmentwiseDeliveryReport'])->name('owner.departmentwiseDeliveryReport');
    	Route::post('owner/departmentwise/delivery_report', [App\Http\Controllers\Owner\Report\DeliveryReportController::class, 'departmentwiseDeliveryReportRequest'])->name('owner.departmentwiseDeliveryReportRequest');
    	Route::get('owner/departmentwise/delivery-report/get/department', [App\Http\Controllers\Owner\Report\DeliveryReportController::class, 'get_department'])->name('owner.departmentwiseDeliveryReportGet_department');

    	// account wise delivery report
    	Route::get('owner/accountwise/delivery_report', [App\Http\Controllers\Owner\Report\DeliveryReportController::class, 'accountwiseDeliveryReport'])->name('owner.accountwiseDeliveryReport');
    	Route::post('owner/accountwise/delivery_report', [App\Http\Controllers\Owner\Report\DeliveryReportController::class, 'accountwiseDeliveryReportRequest'])->name('owner.accountwiseDeliveryReportRequest');
    	Route::get('owner/accountwise/delivery-report/get/account', [App\Http\Controllers\Owner\Report\DeliveryReportController::class, 'get_account'])->name('owner.accountwiseDeliveryReportGet_account');

    	// kam oparation delivery report
    	Route::get('owner/kamoparation/delivery_report', [App\Http\Controllers\Owner\Report\DeliveryReportController::class, 'kamOperationDeliveryReport'])->name('owner.kamoperationDeliveryReport');
    	Route::post('owner/kamoparation/delivery_report', [App\Http\Controllers\Owner\Report\DeliveryReportController::class, 'kamOperationDeliveryReportRequest'])->name('owner.kamoperationDeliveryReportRequest');

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
		Route::post('/department/search', [App\Http\Controllers\SuperAdmin\DepartmentController::class, 'search'])->name('department.search');
		Route::get('/department/add', [App\Http\Controllers\SuperAdmin\DepartmentController::class, 'add'])->name('department.add');
		Route::post('/department/store', [App\Http\Controllers\SuperAdmin\DepartmentController::class, 'store'])->name('department.store');
		Route::get('/department/edit/{id}', [App\Http\Controllers\SuperAdmin\DepartmentController::class, 'edit'])->name('department.edit');
		Route::post('/department/update/{id}', [App\Http\Controllers\SuperAdmin\DepartmentController::class, 'update'])->name('department.update');
		Route::get('/department/delete/{id}', [App\Http\Controllers\SuperAdmin\DepartmentController::class, 'delete'])->name('department.delete');


		// department
		Route::get('/team/view', [App\Http\Controllers\SuperAdmin\TeamController::class, 'view'])->name('team.view');
		Route::post('/team/search', [App\Http\Controllers\SuperAdmin\TeamController::class, 'search'])->name('team.search');
		Route::get('/team/add', [App\Http\Controllers\SuperAdmin\TeamController::class, 'add'])->name('team.add');
		Route::post('/team/store', [App\Http\Controllers\SuperAdmin\TeamController::class, 'store'])->name('team.store');
		Route::get('/team/edit/{id}', [App\Http\Controllers\SuperAdmin\TeamController::class, 'edit'])->name('team.edit');
		Route::post('/team/update/{id}', [App\Http\Controllers\SuperAdmin\TeamController::class, 'update'])->name('team.update');
		Route::get('/team/delete/{id}', [App\Http\Controllers\SuperAdmin\TeamController::class, 'delete'])->name('team.delete');


		// for designation
		Route::get('/designation/view', [App\Http\Controllers\SuperAdmin\DesignationController::class, 'view'])->name('designation.view');
		Route::post('/designation/search', [App\Http\Controllers\SuperAdmin\DesignationController::class, 'search'])->name('designation.search');
		Route::get('/designation/add', [App\Http\Controllers\SuperAdmin\DesignationController::class, 'add'])->name('designation.add');
		Route::post('/designation/store', [App\Http\Controllers\SuperAdmin\DesignationController::class, 'store'])->name('designation.store');
		Route::get('/designation/edit/{id}', [App\Http\Controllers\SuperAdmin\DesignationController::class, 'edit'])->name('designation.edit');
		Route::post('/designation/update/{id}', [App\Http\Controllers\SuperAdmin\DesignationController::class, 'update'])->name('designation.update');
		Route::get('/designation/delete/{id}', [App\Http\Controllers\SuperAdmin\DesignationController::class, 'delete'])->name('designation.delete');


		// for grade
		Route::get('/grade/view', [App\Http\Controllers\SuperAdmin\GradeController::class, 'view'])->name('grade.view');
		Route::post('/grade/search', [App\Http\Controllers\SuperAdmin\GradeController::class, 'search'])->name('grade.search');
		Route::get('/grade/add', [App\Http\Controllers\SuperAdmin\GradeController::class, 'add'])->name('grade.add');
		Route::post('/grade/store', [App\Http\Controllers\SuperAdmin\GradeController::class, 'store'])->name('grade.store');
		Route::get('/grade/edit/{id}', [App\Http\Controllers\SuperAdmin\GradeController::class, 'edit'])->name('grade.edit');
		Route::post('/grade/update/{id}', [App\Http\Controllers\SuperAdmin\GradeController::class, 'update'])->name('grade.update');
		Route::get('/grade/delete/{id}', [App\Http\Controllers\SuperAdmin\GradeController::class, 'delete'])->name('grade.delete');


		// for account
		Route::get('/account/view', [App\Http\Controllers\SuperAdmin\AccountController::class, 'view'])->name('account.view');
		Route::post('/account/search', [App\Http\Controllers\SuperAdmin\AccountController::class, 'search'])->name('account.search');
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
		Route::post('/employee/search', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'search'])->name('employee.search');
		Route::get('/employee/add', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'add'])->name('employee.add');
		Route::post('/employee/store', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'store'])->name('employee.store');
		Route::get('/employee/edit/{id}', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'edit'])->name('employee.edit');
		Route::post('/employee/update/{id}', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'update'])->name('employee.update');
		Route::get('/employee/details/{id}', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'show'])->name('employee.show');
		Route::post('/salaryincrement/store', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'employeSalaryIncrement'])->name('employee.salaryIncrement');

		Route::get('/franchise/owner/view', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'franchiseOwnerView'])->name('franchiseOwner.view');

		Route::get('get/department', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'get_department'])->name('get_department');
		Route::get('get/designation', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'get_designation'])->name('get_designation');
		Route::get('get/grade', [App\Http\Controllers\SuperAdmin\EmployeeController::class, 'get_grade'])->name('get_grade');
	
	});


    // order&delivery management
    Route::group(['prefix' => 'allorder_manage'], function(){
        // for all order List
        Route::post('/allorder/view', [App\Http\Controllers\SuperAdmin\AllOrderController::class, 'view'])->name('report.view');
        Route::post('/month/report', [App\Http\Controllers\SuperAdmin\AllOrderController::class, 'Month_Report'])->name('month.report');
        Route::get('/allorder/view', [App\Http\Controllers\SuperAdmin\AllOrderController::class, 'allOrderView'])->name('allorder.view');
        Route::get('/delivery/view', [App\Http\Controllers\SuperAdmin\AllOrderController::class, 'DeliveryView'])->name('delivery.view');
        Route::post('/delivery/report', [App\Http\Controllers\SuperAdmin\AllOrderController::class, 'deliveryReport'])->name('delivery.report');


        //
    });


});












/*
|--------------------------------------------------------------------------
|  Routes for franchise owner
|--------------------------------------------------------------------------
|
| this routes access for only franchise owner
|
*/
Route::group(['middleware' => ['franchiseOwner', 'auth']], function(){
	Route::get('franchiseOwner/dashboard', [App\Http\Controllers\FranchiseOwner\FranchiseOwnerController::class, 'index'])->name('franchiseowner.dashboard');

	// setups management
	Route::group(['prefix' => 'setups'], function(){
		// department
		Route::get('franchiseOwner/department/view', [App\Http\Controllers\FranchiseOwner\DepartmentController::class, 'view'])->name('franchiseowner.department.view');
		Route::get('franchiseOwner/department/add', [App\Http\Controllers\FranchiseOwner\DepartmentController::class, 'add'])->name('franchiseowner.department.add');
		Route::post('franchiseOwner/department/store', [App\Http\Controllers\FranchiseOwner\DepartmentController::class, 'store'])->name('franchiseowner.department.store');
		Route::get('franchiseOwner/department/edit/{id}', [App\Http\Controllers\FranchiseOwner\DepartmentController::class, 'edit'])->name('franchiseowner.department.edit');
		Route::post('franchiseOwner/department/update/{id}', [App\Http\Controllers\FranchiseOwner\DepartmentController::class, 'update'])->name('franchiseowner.department.update');
		Route::get('franchiseOwner/department/delete/{id}', [App\Http\Controllers\FranchiseOwner\DepartmentController::class, 'delete'])->name('franchiseowner.department.delete');

		// for designation
		Route::get('franchiseOwner/designation/view', [App\Http\Controllers\FranchiseOwner\DesignationController::class, 'view'])->name('franchiseowner.designation.view');
		Route::get('franchiseOwner/designation/add', [App\Http\Controllers\FranchiseOwner\DesignationController::class, 'add'])->name('franchiseowner.designation.add');
		Route::post('franchiseOwner/designation/store', [App\Http\Controllers\FranchiseOwner\DesignationController::class, 'store'])->name('franchiseowner.designation.store');
		Route::get('franchiseOwner/designation/edit/{id}', [App\Http\Controllers\FranchiseOwner\DesignationController::class, 'edit'])->name('franchiseowner.designation.edit');
		Route::post('franchiseOwner/designation/update/{id}', [App\Http\Controllers\FranchiseOwner\DesignationController::class, 'update'])->name('franchiseowner.designation.update');
		Route::get('franchiseOwner/designation/delete/{id}', [App\Http\Controllers\FranchiseOwner\DesignationController::class, 'delete'])->name('franchiseowner.designation.delete');

		// for grade
		Route::get('franchiseOwner/grade/view', [App\Http\Controllers\FranchiseOwner\GradeController::class, 'view'])->name('franchiseowner.grade.view');
		Route::get('franchiseOwner/grade/add', [App\Http\Controllers\FranchiseOwner\GradeController::class, 'add'])->name('franchiseowner.grade.add');
		Route::post('franchiseOwner/grade/store', [App\Http\Controllers\FranchiseOwner\GradeController::class, 'store'])->name('franchiseowner.grade.store');
		Route::get('franchiseOwner/grade/edit/{id}', [App\Http\Controllers\FranchiseOwner\GradeController::class, 'edit'])->name('franchiseowner.grade.edit');
		Route::post('franchiseOwner/grade/update/{id}', [App\Http\Controllers\FranchiseOwner\GradeController::class, 'update'])->name('franchiseowner.grade.update');
		Route::get('franchiseOwner/grade/delete/{id}', [App\Http\Controllers\FranchiseOwner\GradeController::class, 'delete'])->name('franchiseowner.grade.delete');

		// for team
		Route::get('franchiseOwner/team/view', [App\Http\Controllers\FranchiseOwner\TeamController::class, 'view'])->name('franchiseowner.team.view');
		Route::get('franchiseOwner/team/add', [App\Http\Controllers\FranchiseOwner\TeamController::class, 'add'])->name('franchiseowner.team.add');
		Route::post('franchiseOwner/team/store', [App\Http\Controllers\FranchiseOwner\TeamController::class, 'store'])->name('franchiseowner.team.store');
		Route::get('franchiseOwner/team/edit/{id}', [App\Http\Controllers\FranchiseOwner\TeamController::class, 'edit'])->name('franchiseowner.team.edit');
		Route::post('franchiseOwner/team/update/{id}', [App\Http\Controllers\FranchiseOwner\TeamController::class, 'update'])->name('franchiseowner.team.update');
		Route::get('franchiseOwner/team/delete/{id}', [App\Http\Controllers\FranchiseOwner\TeamController::class, 'delete'])->name('franchiseowner.team.delete');

		// for account
		Route::get('franchiseOwner/account/view', [App\Http\Controllers\FranchiseOwner\AccountController::class, 'view'])->name('franchiseowner.account.view');
		Route::get('franchiseOwner/account/add', [App\Http\Controllers\FranchiseOwner\AccountController::class, 'add'])->name('franchiseowner.account.add');
		Route::post('franchiseOwner/account/store', [App\Http\Controllers\FranchiseOwner\AccountController::class, 'store'])->name('franchiseowner.account.store');
		Route::get('franchiseOwner/account/edit/{id}', [App\Http\Controllers\FranchiseOwner\AccountController::class, 'edit'])->name('franchiseowner.account.edit');
		Route::post('franchiseOwner/account/update/{id}', [App\Http\Controllers\FranchiseOwner\AccountController::class, 'update'])->name('franchiseowner.account.update');
		Route::get('franchiseOwner/account/delete/{id}', [App\Http\Controllers\FranchiseOwner\AccountController::class, 'delete'])->name('franchiseowner.account.delete');

	});	

	// employee management
	Route::group(['prefix' => 'employee_manage'], function(){
		// for employee
		Route::get('franchiseOwner/employee/view', [App\Http\Controllers\FranchiseOwner\EmployeeController::class, 'view'])->name('franchiseowner.employee.view');
		Route::get('franchiseOwner/employee/add', [App\Http\Controllers\FranchiseOwner\EmployeeController::class, 'add'])->name('franchiseowner.employee.add');
		Route::post('franchiseOwner/employee/store', [App\Http\Controllers\FranchiseOwner\EmployeeController::class, 'store'])->name('franchiseowner.employee.store');
		Route::get('franchiseOwner/employee/edit/{id}', [App\Http\Controllers\FranchiseOwner\EmployeeController::class, 'edit'])->name('franchiseowner.employee.edit');
		Route::post('franchiseOwner/employee/update/{id}', [App\Http\Controllers\FranchiseOwner\EmployeeController::class, 'update'])->name('franchiseowner.employee.update');
		Route::get('franchiseOwner/employee/details/{id}', [App\Http\Controllers\FranchiseOwner\EmployeeController::class, 'show'])->name('franchiseowner.employee.show');
		Route::post('franchiseOwner/salaryincrement/store', [App\Http\Controllers\FranchiseOwner\EmployeeController::class, 'employeSalaryIncrement'])->name('franchiseowner.employee.salaryIncrement');
	});

});























/*
|--------------------------------------------------------------------------
|  Routes for franchise admin
|--------------------------------------------------------------------------
|
| this routes access for only franchise admin
|
*/
Route::group(['middleware' => ['admin', 'auth']], function(){
	Route::get('admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');

	// setups management
	Route::group(['prefix' => 'setups'], function(){
		// department
		Route::get('admin/department/view', [App\Http\Controllers\Admin\DepartmentController::class, 'view'])->name('admin.department.view');
		Route::get('admin/department/add', [App\Http\Controllers\Admin\DepartmentController::class, 'add'])->name('admin.department.add');
		Route::post('admin/department/store', [App\Http\Controllers\Admin\DepartmentController::class, 'store'])->name('admin.department.store');
		Route::get('admin/department/edit/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'edit'])->name('admin.department.edit');
		Route::post('admin/department/update/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'update'])->name('admin.department.update');
		Route::get('admin/department/delete/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'delete'])->name('admin.department.delete');

		// for designation
		Route::get('admin/designation/view', [App\Http\Controllers\Admin\DesignationController::class, 'view'])->name('admin.designation.view');
		Route::get('admin/designation/add', [App\Http\Controllers\Admin\DesignationController::class, 'add'])->name('admin.designation.add');
		Route::post('admin/designation/store', [App\Http\Controllers\Admin\DesignationController::class, 'store'])->name('admin.designation.store');
		Route::get('admin/designation/edit/{id}', [App\Http\Controllers\Admin\DesignationController::class, 'edit'])->name('admin.designation.edit');
		Route::post('admin/designation/update/{id}', [App\Http\Controllers\Admin\DesignationController::class, 'update'])->name('admin.designation.update');
		Route::get('admin/designation/delete/{id}', [App\Http\Controllers\Admin\DesignationController::class, 'delete'])->name('admin.designation.delete');

		// for grade
		Route::get('admin/grade/view', [App\Http\Controllers\Admin\GradeController::class, 'view'])->name('admin.grade.view');
		Route::get('admin/grade/add', [App\Http\Controllers\Admin\GradeController::class, 'add'])->name('admin.grade.add');
		Route::post('admin/grade/store', [App\Http\Controllers\Admin\GradeController::class, 'store'])->name('admin.grade.store');
		Route::get('admin/grade/edit/{id}', [App\Http\Controllers\Admin\GradeController::class, 'edit'])->name('admin.grade.edit');
		Route::post('admin/grade/update/{id}', [App\Http\Controllers\Admin\GradeController::class, 'update'])->name('admin.grade.update');
		Route::get('admin/grade/delete/{id}', [App\Http\Controllers\Admin\GradeController::class, 'delete'])->name('admin.grade.delete');

		// for team
		Route::get('admin/team/view', [App\Http\Controllers\Admin\TeamController::class, 'view'])->name('admin.team.view');
		Route::get('admin/team/add', [App\Http\Controllers\Admin\TeamController::class, 'add'])->name('admin.team.add');
		Route::post('admin/team/store', [App\Http\Controllers\Admin\TeamController::class, 'store'])->name('admin.team.store');
		Route::get('admin/team/edit/{id}', [App\Http\Controllers\Admin\TeamController::class, 'edit'])->name('admin.team.edit');
		Route::post('admin/team/update/{id}', [App\Http\Controllers\Admin\TeamController::class, 'update'])->name('admin.team.update');
		Route::get('admin/team/delete/{id}', [App\Http\Controllers\Admin\TeamController::class, 'delete'])->name('admin.team.delete');

		// for account
		Route::get('admin/account/view', [App\Http\Controllers\Admin\AccountController::class, 'view'])->name('admin.account.view');
		Route::get('admin/account/add', [App\Http\Controllers\Admin\AccountController::class, 'add'])->name('admin.account.add');
		Route::post('admin/account/store', [App\Http\Controllers\Admin\AccountController::class, 'store'])->name('admin.account.store');
		Route::get('admin/account/edit/{id}', [App\Http\Controllers\Admin\AccountController::class, 'edit'])->name('admin.account.edit');
		Route::post('admin/account/update/{id}', [App\Http\Controllers\Admin\AccountController::class, 'update'])->name('admin.account.update');
		Route::get('admin/account/delete/{id}', [App\Http\Controllers\Admin\AccountController::class, 'delete'])->name('admin.account.delete');
	});	
	
	
	// employee management
	Route::group(['prefix' => 'employee_manage'], function(){
		// for employee
		Route::get('admin/employee/view', [App\Http\Controllers\Admin\EmployeeController::class, 'view'])->name('admin.employee.view');
		Route::get('admin/employee/add', [App\Http\Controllers\Admin\EmployeeController::class, 'add'])->name('admin.employee.add');
		Route::post('admin/employee/store', [App\Http\Controllers\Admin\EmployeeController::class, 'store'])->name('admin.employee.store');
		Route::get('admin/employee/edit/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'edit'])->name('admin.employee.edit');
		Route::post('admin/employee/update/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'update'])->name('admin.employee.update');
		Route::get('admin/employee/details/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'show'])->name('admin.employee.show');
		Route::post('admin/salaryincrement/store', [App\Http\Controllers\Admin\EmployeeController::class, 'employeSalaryIncrement'])->name('admin.employee.salaryIncrement');
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



















/*
|--------------------------------------------------------------------------
|  Routes for KAM Sales
|--------------------------------------------------------------------------
|
| this routes access for kam sales
|
*/
Route::group(['middleware' => ['kamsales', 'auth']], function(){

	Route::get('kamsales/dashboard', [App\Http\Controllers\KAMSales\KAMSalesController::class, 'index'])->name('kamsales.dashboard');

	// order manage
	Route::group(['prefix' => 'order_manage'], function(){
		// for order
		Route::get('/order/view', [App\Http\Controllers\KAMSales\OrderController::class, 'view'])->name('order.view');
		Route::get('/order/details/{id}', [App\Http\Controllers\KAMSales\OrderController::class, 'details'])->name('order.details');
		Route::get('/order/add', [App\Http\Controllers\KAMSales\OrderController::class, 'add'])->name('order.add');
		Route::get('/order/get_team', [App\Http\Controllers\KAMSales\OrderController::class, 'get_team'])->name('get_team');
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
		Route::get('/delivery/view', [App\Http\Controllers\KAMOperation\OrderController::class, 'deliveryList'])->name('kamoperation.delivery.view');
		Route::get('/order/status/{id}', [App\Http\Controllers\KAMOperation\OrderController::class, 'status'])->name('kamoperation.order.status');
		Route::post('order/status/update/{id}', [App\Http\Controllers\KAMOperation\OrderController::class, 'statusUpdate'])->name('kamoperation.order.status.update');
		Route::get('order/delivery/{id}', [App\Http\Controllers\KAMOperation\OrderController::class, 'delivery'])->name('kamoperation.order.delivery');
		Route::post('order/delivery/success/{id}', [App\Http\Controllers\KAMOperation\OrderController::class, 'deliverySuccess'])->name('kamoperation.order.delivery.success');
	}); 	

});