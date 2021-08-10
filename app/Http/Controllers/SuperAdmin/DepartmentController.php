<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Department;
use App\Models\Franchise;

class DepartmentController extends Controller
{
    public function view(){
        $data['franchises'] = Franchise::all(); 
    	$data['allDepartments'] = Department::orderBy('id', 'desc')->get();
    	return view('superadmin.pages.department.view-department', $data);
    }

     public function search(Request $request){
       $data['franchises'] = Franchise::all(); 
       $data['franchise_id'] = strip_tags($request->franchise_id);
       $data['allDepartments'] = Department::where('franchise_id', $request->franchise_id)->get();
       return view('superadmin.pages.department.view-department', $data);
    }

    public function add(){
        $data['franchises'] = Franchise::all();
    	return view('superadmin.pages.department.add-department', $data);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'department_code' => 'required|unique:departments',
            'franchise_id' => 'required',
        ]);

    	$department = new Department;
    	$department->name = strip_tags($request->name);
        $department->department_code = strip_tags($request->department_code);
        $department->franchise_id = strip_tags($request->franchise_id);
    	$department->save();
    	return redirect()->route('department.view')->with("success", "Department Added Successfully!!");
    }


    public function edit($id){
    	$data['getDepartment'] = Department::find($id);
        $data['franchises'] = Franchise::all();
    	return view('superadmin.pages.department.edit-department', $data);
    }

    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'name'   =>  'required',
            'department_code'   =>  [
                'required',
                 Rule::unique('departments')->ignore($id),
            ],
            'franchise_id' => 'required',
        ]);
    	$department = Department::find($id);
    	$department->name = strip_tags($request->name);
        $department->department_code = strip_tags($request->department_code);
        $department->franchise_id = strip_tags($request->franchise_id);
    	$department->save();
    	return redirect()->route('department.view')->with("success", "Department updated Successfully!!");
    }

    public function delete($id){
    	$getDepartment = Department::find($id);
    	$getDepartment->delete();
    	return redirect()->route('department.view')->with("success", "Department deleted Successfully!!");
    }
}
