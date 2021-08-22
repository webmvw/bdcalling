<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Designation;
use App\Models\Franchise;

class DesignationController extends Controller
{
     public function view(){
        $data['franchises'] = Franchise::all();
    	$data['allDesignation'] = Designation::get();
    	return view('owner.pages.designation.view-designation', $data);
    }


    public function search(Request $request){
        $data['search'] = true;
       $data['franchises'] = Franchise::all(); 
       $data['franchise_id'] = strip_tags($request->franchise_id);
       $data['allDesignation'] = Designation::where('franchise_id', $request->franchise_id)->get();
       return view('owner.pages.designation.view-designation', $data);
    }



    public function add(){
        $data['franchises'] = Franchise::all();
    	return view('owner.pages.designation.add-designation', $data);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'franchise_id' => 'required',
        ]);

    	$designation = new Designation;
    	$designation->name = strip_tags($request->name);
        $designation->franchise_id = strip_tags($request->franchise_id);
    	$designation->save();
    	return redirect()->route('owner.designation.view')->with("success", "Designation Added Successfully!!");
    }


    public function edit($id){
    	$data['designation'] = Designation::find($id);
        $data['franchises'] = Franchise::all();
    	return view('owner.pages.designation.edit-designation', $data);
    }

    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'name'   =>  'required',
            'franchise_id' => 'required',
        ]);
    	$designation = Designation::find($id);
    	$designation->name = strip_tags($request->name);
        $designation->franchise_id = strip_tags($request->franchise_id);
    	$designation->save();
    	return redirect()->route('owner.designation.view')->with("success", "Designation updated Successfully!!");
    }

    public function delete($id){
    	$designation = Designation::find($id);
    	$designation->delete();
    	return redirect()->route('owner.designation.view')->with("success", "Designation deleted Successfully!!");
    }
}
