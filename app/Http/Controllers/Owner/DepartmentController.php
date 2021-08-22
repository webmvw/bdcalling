<?php

namespace App\Http\Controllers\Owner;

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
        return view('owner.pages.department.view-department', $data);
    }


    public function search(Request $request){
        $data['search'] = true;
       $data['franchises'] = Franchise::all(); 
       $data['franchise_id'] = strip_tags($request->franchise_id);
       $data['allDepartments'] = Department::where('franchise_id', $request->franchise_id)->get();
       return view('owner.pages.department.view-department', $data);
    }



    public function add(){
        $data['franchises'] = Franchise::all();
        return view('owner.pages.department.add-department', $data);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'department_code' => 'required|unique:departments',
            'franchise_id' => 'required',
        ]);

        $data = Department::insert([
            'name' => strip_tags($request->name),
            'department_code' => strip_tags($request->department_code),
            'franchise_id' => strip_tags($request->franchise_id),
        ]);
        return redirect()->route('owner.department.view')->with('success', 'Department Added Success');
    }


    public function edit($id){
        $data['getDepartment'] = Department::find($id);
        $data['franchises'] = Franchise::all();
        return view('owner.pages.department.edit-department', $data);
    }


    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'name'   => 'required',
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
    	return redirect()->route('owner.department.view')->with("success", "Department updated Successfully!!");
    }

    public function delete($id){
    	$getDepartment = Department::find($id);
    	$getDepartment->delete();
    	return redirect()->route('owner.department.view')->with("success", "Department deleted Successfully!!");
    }





}
