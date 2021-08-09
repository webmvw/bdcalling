<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Grade;
use App\Models\Franchise;

class GradeController extends Controller
{
    public function view(){
        $data['franchises'] = Franchise::all();
    	$data['allGrades'] = Grade::orderBy('id', 'desc')->get();
    	return view('owner.pages.grade.view-grade', $data);
    }


    public function search(Request $request){
       $data['franchises'] = Franchise::all(); 
       $data['franchise_id'] = strip_tags($request->franchise_id);
       $data['allGrades'] = Grade::where('franchise_id', $request->franchise_id)->get();
       return view('owner.pages.grade.view-grade', $data);
    }



    public function add(){
        $data['franchises'] = Franchise::all();
    	return view('owner.pages.grade.add-grade', $data);
    }

    public function store(Request $request){

        $request->validate([
            'grade_name' => 'required',
            'amount' => 'required',
            'franchise_id' => 'required',
        ]);

    	$grade = new Grade;
    	$grade->grade_name = strip_tags($request->grade_name);
        $grade->amount = strip_tags($request->amount);
        $grade->franchise_id = strip_tags($request->franchise_id);
    	$grade->save();
    	return redirect()->route('owner.grade.view')->with("success", "Grade Added Successfully!!");
    }


    public function edit($id){
    	$data['getGrade'] = Grade::find($id);
        $data['franchises'] = Franchise::all();
    	return view('owner.pages.grade.edit-grade', $data);
    }

    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'grade_name'   =>  'required',
            'amount' => 'required',
            'franchise_id' => 'required',
        ]);
    	$grade = Grade::find($id);
    	$grade->grade_name = strip_tags($request->grade_name);
        $grade->amount = strip_tags($request->amount);
        $grade->franchise_id = strip_tags($request->franchise_id);
    	$grade->save();
    	return redirect()->route('owner.grade.view')->with("success", "Grade updated Successfully!!");
    }

    public function delete($id){
    	$getGrade = Grade::find($id);
    	$getGrade->delete();
    	return redirect()->route('owner.grade.view')->with("success", "Grade deleted Successfully!!");
    }
}
