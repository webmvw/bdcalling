<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Designation;

class DesignationController extends Controller
{
     public function view(){
    	$allDesignation = Designation::get();
    	return view('owner.pages.designation.view-designation', compact('allDesignation'));
    }

    public function add(){
    	return view('owner.pages.designation.add-designation');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:designations',
        ]);

    	$designation = new Designation;
    	$designation->name = $request->name;
    	$designation->save();
    	return redirect()->route('owner.designation.view')->with("success", "Designation Added Successfully!!");
    }


    public function edit($id){
    	$designation = Designation::find($id);
    	return view('owner.pages.designation.edit-designation', compact('designation'));
    }

    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'name'   =>  [
                'required',
                 Rule::unique('designations')->ignore($id),
            ]
        ]);
    	$designation = Designation::find($id);
    	$designation->name = $request->name;
    	$designation->save();
    	return redirect()->route('owner.designation.view')->with("success", "Designation updated Successfully!!");
    }

    public function delete($id){
    	$designation = Designation::find($id);
    	$designation->delete();
    	return redirect()->route('owner.designation.view')->with("success", "Designation deleted Successfully!!");
    }
}
