<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Grade;
use App\Models\EmployeeSalaryLog;
use App\Models\Role;
use App\Models\Franchise;
use File;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(){
        $data['franchises'] = Franchise::all(); 
        $data['allData'] = User::whereIn('role_id', [2,3,4,5,6,7])->orderBy('id', 'desc')->get();
    	return view('owner.pages.employee.view-employee', $data);
    }


    public function search(Request $request){
       $data['franchises'] = Franchise::all(); 
       $data['franchise_id'] = strip_tags($request->franchise_id);
       $data['allData'] = User::whereIn('role_id', [2,3,4,5,6,7])->where('franchise_id', $request->franchise_id)->get();
       return view('owner.pages.employee.view-employee', $data);
    }




    public function get_department(Request $request){
        $franchise_id = $request->franchise_id;
        $alldepartment = Department::where('franchise_id', $franchise_id)->get();
        return response()->json($alldepartment, 200);
    }

    public function get_designation(Request $request){
        $franchise_id = $request->franchise_id;
        $alldesignation = Designation::where('franchise_id', $franchise_id)->get();
        return response()->json($alldesignation, 200);
    }

    public function get_grade(Request $request){
        $franchise_id = $request->franchise_id;
        $allgrade = Grade::where('franchise_id', $franchise_id)->get();
        return response()->json($allgrade, 200);
    }




	 /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function add(){
        $data['roles'] = Role::all();
        $data['franchises'] = Franchise::all();
    	return view('owner.pages.employee.add-employee', $data);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'email' => 'required|unique:users',
            'image' => 'mimes:jpg,png',
            'nid_front_image' => 'mimes:jpg,png',
            'nid_back_image' => 'mimes:jpg,png',
            'cv' => 'mimes:pdf',
        ]);

        DB::transaction(function() use($request){
            // start generate employee id number
            $employee = User::where('role_id', '3')->orderBy('id','desc')->get()->count();
            if($employee == 0){
                $firstReg = 0;
                $employeeId = $firstReg+1;
                if($employeeId<10){
                    $id_no = '000'.$employeeId;
                }elseif($employeeId<100){
                    $id_no = '00'.$kamId;
                }elseif ($employeeId<1000) {
                    $id_no = '0'.$employeeId;
                }
            }else{
                $employee = User::where('role_id', '3')->orderBy('id','desc')->first()->id;
                $employeeId = $employee+1;
                if($employeeId<10){
                    $id_no = '000'.$employeeId;
                }elseif($employeeId<100){
                    $id_no = '00'.$employeeId;
                }elseif ($employeeId<1000) {
                    $id_no = '0'.$employeeId;
                }
            }
            $id_code = rand(0000, 9999);
            $getdepartment = Department::find($request->department);
            $department_code = $getdepartment->department_code;
            $final_id_no = $department_code.$id_code.$id_no;
            // end generate employee id number

            // start insert Employee data in user model
            $user = new User;
            $code = rand(00000000, 99999999);
            $user->name = strip_tags($request->name);
            $user->email = strip_tags($request->email);
            $user->password = bcrypt($code);
            $user->mobile = strip_tags($request->phone);
            $user->address = strip_tags($request->address);
            $user->gender = strip_tags($request->gender);
            $user->religion = strip_tags($request->religion);
            $user->id_no = $final_id_no;
            $user->dob = date('Y-m-d', strtotime(strip_tags($request->dob)));
            $user->code = $code;
            $user->join_date = date('Y-m-d', strtotime(strip_tags($request->join_date)));
            $user->department_id = strip_tags($request->department);
            $user->designation_id = strip_tags($request->designation);
            $user->grade_id = strip_tags($request->grade);
            $user->franchise_id = strip_tags($request->franchise);
            $user->salary = strip_tags($request->salary);
            $user->nid_number = strip_tags($request->nid_number);
            $user->bank_account_holder_name = strip_tags($request->account_holder_name);
            $user->bank_account_number = strip_tags($request->account_number);
            $user->bank_name = strip_tags($request->bank_name);
            $user->branch_name = strip_tags($request->branch_name);
            $user->routing_number = strip_tags($request->routing_number);
            $user->role_id = strip_tags($request->role);
            $user->status = '1';
            if($request->hasfile('image')){
                $file = $request->file('image');
                $filename = time().$file->getClientOriginalName();
                $file->move('public/img/employee/',$filename);
                $user->image = $filename;
            }
            if($request->hasfile('nid_front_image')){
                $file = $request->file('nid_front_image');
                $filename = time().$file->getClientOriginalName();
                $file->move('public/img/employee/nid',$filename);
                $user->nid_front_image = $filename;
            }
            if($request->hasfile('nid_back_image')){
                $file = $request->file('nid_back_image');
                $filename = time().$file->getClientOriginalName();
                $file->move('public/img/employee/nid',$filename);
                $user->nid_back_image = $filename;
            }
            if($request->hasfile('cv')){
                $file = $request->file('cv');
                $filename = time().$file->getClientOriginalName();
                $file->move('public/img/employee/cv',$filename);
                $user->cv = $filename;
            }
            $user->save();
            // end insert Employee data in user model


            // start insert employee data in EmployeeSalaryLog model
            $employeeSalaryLog = new EmployeeSalaryLog;
            $employeeSalaryLog->employee_id = $user->id;
            $employeeSalaryLog->previous_salary = strip_tags($request->salary);
            $employeeSalaryLog->present_salary = strip_tags($request->salary);
            $employeeSalaryLog->increment_salary = '0';
            $employeeSalaryLog->effected_date = date('Y-m-d', strtotime($request->join_date));
            $employeeSalaryLog->save();
            // end insert employee data in EmployeeSalaryLog model
        });
        return redirect()->route('owner.employee.view')->with('success', 'Employee Registration Successfully!!');
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    	$data['getEmployee'] = User::find($id);
        $data['roles'] = Role::all();
        $data['franchises'] = Franchise::all();
        return view('owner.pages.employee.edit-employee', $data);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
    	 $request->validate([
            'email' => [
                'required',
                 Rule::unique('users')->ignore($id),
            ],
            'image' => 'mimes:jpg,png',
            'nid_front_image' => 'mimes:jpg,png',
            'nid_back_image' => 'mimes:jpg,png',
            'cv' => 'mimes:pdf',
        ]);
        DB::transaction(function() use($request, $id){
            // start insert Employee data in user model
            $user = User::find($id);
            $user->name = strip_tags($request->name);
            $user->email = strip_tags($request->email);
            $user->mobile = strip_tags($request->phone);
            $user->address = strip_tags($request->address);
            $user->gender = strip_tags($request->gender);
            $user->religion = strip_tags($request->religion);
            $user->dob = date('Y-m-d', strtotime(strip_tags($request->dob)));
            $user->join_date = date('Y-m-d', strtotime(strip_tags($request->join_date)));
            $user->department_id = strip_tags($request->department);
            $user->designation_id = strip_tags($request->designation);
            $user->grade_id = strip_tags($request->grade);
            $user->franchise_id = strip_tags($request->franchise);
            $user->salary = strip_tags($request->salary);
            $user->nid_number = strip_tags($request->nid_number);
            $user->bank_account_holder_name = strip_tags($request->account_holder_name);
            $user->bank_account_number = strip_tags($request->account_number);
            $user->bank_name = strip_tags($request->bank_name);
            $user->branch_name = strip_tags($request->branch_name);
            $user->routing_number = strip_tags($request->routing_number);
            if($request->hasfile('image')){
                if(File::exists('public/img/employee/'.$user->image)){
                    File::delete('public/img/employee/'.$user->image);
                }
                $file = $request->file('image');
                $filename = time().$file->getClientOriginalName();
                $file->move('public/img/employee/',$filename);
                $user->image = $filename;
            }
            if($request->hasfile('nid_front_image')){
                if(File::exists('public/img/employee/nid'.$user->nid_front_image)){
                    File::delete('public/img/employee/nid'.$user->nid_front_image);
                }
                $file = $request->file('nid_front_image');
                $filename = time().$file->getClientOriginalName();
                $file->move('public/img/employee/nid',$filename);
                $user->nid_front_image = $filename;
            }
            if($request->hasfile('nid_back_image')){
                if(File::exists('public/img/employee/nid'.$user->nid_back_image)){
                    File::delete('public/img/employee/nid'.$user->nid_back_image);
                }
                $file = $request->file('nid_back_image');
                $filename = time().$file->getClientOriginalName();
                $file->move('public/img/employee/nid',$filename);
                $user->nid_back_image = $filename;
            }
            if($request->hasfile('cv')){
                if(File::exists('public/img/employee/cv'.$user->cv)){
                    File::delete('public/img/employee/cv'.$user->cv);
                }
                $file = $request->file('cv');
                $filename = time().$file->getClientOriginalName();
                $file->move('public/img/employee/cv',$filename);
                $user->cv = $filename;
            }
            $user->save();
            // end insert Employee data in user model


           // start update employee data in EmployeeSalaryLog model
            $employeeSalaryLog = EmployeeSalaryLog::where('employee_id', $id)->first();
            $employeeSalaryLog->previous_salary = strip_tags($request->salary);
            $employeeSalaryLog->present_salary = strip_tags($request->salary);
            $employeeSalaryLog->effected_date = date('Y-m-d', strtotime($request->join_date));
            $employeeSalaryLog->save();
            // end update employee data in EmployeeSalaryLog model
        });
        return redirect()->route('owner.employee.view')->with('success', 'Employee Update Successfully!!');
    }






    public function show($id){
        $data['getEmployee'] = User::find($id);
        $data['incrementHistory'] = EmployeeSalaryLog::where('employee_id', $id)->get();
        return view('owner.pages.employee.details-employee', $data);
    }





    public function employeSalaryIncrement(Request $request){
        DB::transaction(function() use($request){

            $employee_id = $request->employee_id;
            $increment_amount = strip_tags($request->increment_amount);
            $effective_date = strip_tags($request->effective_date);

            $employee = User::find($employee_id);
            $previous_salary = $employee->salary;
            $present_salary = $previous_salary+$increment_amount;

            $employee->salary = $present_salary;
            $employee->save();

            $employeeSelaryLog = new EmployeeSalaryLog;
            $employeeSelaryLog->employee_id = $employee_id;
            $employeeSelaryLog->previous_salary = $previous_salary;
            $employeeSelaryLog->present_salary = $present_salary;
            $employeeSelaryLog->increment_salary = $increment_amount;
            $employeeSelaryLog->effected_date = date('Y-m-d', strtotime($effective_date));
            $employeeSelaryLog->save();
        });
        return redirect()->back()->with('success', 'Encrement Salary Added Success');
    }


    public function franchiseOwnerView(){
        $allData = User::where('role_id', 3)->orderBy('id', 'desc')->get();
        return view('owner.pages.employee.view-franchiseOwner', compact('allData'));
    }





}
