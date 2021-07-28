<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(){
    	$allData = User::where('role_id', '3')->orderBy('id', 'desc')->get();
    	return view('superadmin.pages.employee.view-employee', compact('allData'));
    }


	 /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function add(){
        $data['department'] = Department::all();
        $data['designation'] = Designation::all();
    	return view('superadmin.pages.employee.add-employee', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
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
        $code = rand(0000, 9999);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($code);
        $user->mobile = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->id_no = $final_id_no;
        $user->dob = date('Y-m-d', strtotime($request->dob));
        $user->code = $code;
        $user->join_date = date('Y-m-d', strtotime($request->join_date));
        $user->department_id = $request->department;
        $user->designation_id = $request->designation;
        $user->salary = $request->salary;
        $user->role_id = '3';
        $user->status = '1';
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time().$file->getClientOriginalName();
            $file->move('img/employee/',$filename);
            $user->image = $filename;
        }
        $user->save();
        // end insert Employee data in user model

        return redirect()->route('employee.view')->with('success', 'Employee Registration Successfully!!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    	$data['getEmployee'] = User::find($id);
        $data['department'] = Department::all();
        $data['designation'] = Designation::all();
        return view('superadmin.pages.employee.edit-employee', $data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
    	$user = User::find($id);
    	$user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->phone;
        $user->department_id = $request->department;
        $user->designation_id = $request->designation;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        if($request->hasfile('image')){
        	if(File::exists('img/employee/'.$user->image)){
                File::delete('img/employee/'.$user->image);
            }
            $file = $request->file('image');
            $filename = time().$file->getClientOriginalName();
            $file->move('img/employee/',$filename);
            $user->image = $filename;
        }
        $user->save();
    	return redirect()->route('employee.view')->with('success', 'Employee Updated Success');
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
    	$user = User::find($id);
    	if(File::exists('img/employee/'.$user->image)){
            File::delete('img/employee/'.$user->image);
        }
    	$user->delete();
    	return redirect()->route('employee.view')->with('success', 'Employee Deleted Success');
    }



}
