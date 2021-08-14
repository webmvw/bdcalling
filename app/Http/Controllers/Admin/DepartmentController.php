<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Department;
use App\Models\Franchise;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{


     public function view(){
        $franchise_id = Auth::user()->franchise_id;
        $data['allDepartments'] = Department::where('franchise_id', $franchise_id)->orderBy('id', 'desc')->get();
        return view('admin.pages.department.view-department', $data);
    }



    public function add(){
        return view('admin.pages.department.add-department');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'department_code' => 'required|unique:departments',
        ]);

        $data = Department::insert([
            'name' => strip_tags($request->name),
            'department_code' => strip_tags($request->department_code),
            'franchise_id' => Auth::user()->franchise_id,
        ]);
        return redirect()->route('admin.department.view')->with('success', 'Department Added Success');
    }


    public function edit($id){
        $data['getDepartment'] = Department::find($id);
        return view('admin.pages.department.edit-department', $data);
    }


    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'name'   => 'required',
            'department_code'   =>  [
                'required',
                 Rule::unique('departments')->ignore($id),
            ],
        ]);
    	$department = Department::find($id);
    	$department->name = strip_tags($request->name);
        $department->department_code = strip_tags($request->department_code);
    	$department->save();
    	return redirect()->route('admin.department.view')->with("success", "Department updated Successfully!!");
    }

    public function delete($id){
    	$getDepartment = Department::find($id);
    	$getDepartment->delete();
    	return redirect()->route('admin.department.view')->with("success", "Department deleted Successfully!!");
    }





}
