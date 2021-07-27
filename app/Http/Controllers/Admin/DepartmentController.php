<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function view(){
    	$allDepartments = Department::latest()->get();
    	return view('admin.pages.department.view-department', compact('allDepartments'));
    }

    public function add(){
    	return view('admin.pages.department.add-department');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:departments',
            'department_code' => 'required|unique:departments',
        ]);

    	$department = new Department;
    	$department->name = $request->name;
        $department->department_code = $request->department_code;
    	$department->save();
    	return redirect()->route('department.view')->with("success", "Department Added Successfully!!");
    }


    public function edit($id){
    	$getDepartment = Department::find($id);
    	return view('admin.pages.department.edit-department', compact('getDepartment'));
    }

    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'name'   =>  [
                'required',
                 Rule::unique('departments')->ignore($id),
            ],
            'department_code'   =>  [
                'required',
                 Rule::unique('departments')->ignore($id),
            ]
        ]);
    	$department = Department::find($id);
    	$department->name = $request->name;
        $department->department_code = $request->department_code;
    	$department->save();
    	return redirect()->route('department.view')->with("info", "Department updated Successfully!!");
    }

    public function delete($id){
    	$getDepartment = Department::find($id);
    	$getDepartment->delete();
    	return redirect()->route('department.view')->with("info", "Department deleted Successfully!!");
    }
}
