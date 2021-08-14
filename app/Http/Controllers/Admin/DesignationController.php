<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Designation;
use App\Models\Franchise;
use Illuminate\Support\Facades\Auth;

class DesignationController extends Controller
{
     public function view(){
        $franchise_id = Auth::user()->franchise_id;
    	$data['allDesignation'] = Designation::where('franchise_id', $franchise_id)->get();
    	return view('admin.pages.designation.view-designation', $data);
    }



    public function add(){
    	return view('admin.pages.designation.add-designation');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
        ]);

    	$designation = new Designation;
    	$designation->name = strip_tags($request->name);
        $designation->franchise_id = Auth::user()->franchise_id;
    	$designation->save();
    	return redirect()->route('admin.designation.view')->with("success", "Designation Added Successfully!!");
    }


    public function edit($id){
    	$data['designation'] = Designation::find($id);
    	return view('admin.pages.designation.edit-designation', $data);
    }

    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'name'   =>  'required',
        ]);
    	$designation = Designation::find($id);
    	$designation->name = strip_tags($request->name);
    	$designation->save();
    	return redirect()->route('admin.designation.view')->with("success", "Designation updated Successfully!!");
    }

    public function delete($id){
    	$designation = Designation::find($id);
    	$designation->delete();
    	return redirect()->route('admin.designation.view')->with("success", "Designation deleted Successfully!!");
    }
}
