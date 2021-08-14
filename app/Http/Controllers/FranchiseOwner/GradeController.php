<?php

namespace App\Http\Controllers\FranchiseOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Grade;
use App\Models\Franchise;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    public function view(){
        $franchise_id = Auth::user()->franchise_id;
    	$data['allGrades'] = Grade::where('franchise_id', $franchise_id)->get();
    	return view('franchiseowner.pages.grade.view-grade', $data);
    }


    public function add(){
    	return view('franchiseowner.pages.grade.add-grade');
    }

    public function store(Request $request){

        $request->validate([
            'grade_name' => 'required',
            'amount' => 'required',
        ]);

    	$grade = new Grade;
    	$grade->grade_name = strip_tags($request->grade_name);
        $grade->amount = strip_tags($request->amount);
        $grade->franchise_id = Auth::user()->franchise_id;
    	$grade->save();
    	return redirect()->route('franchiseowner.grade.view')->with("success", "Grade Added Successfully!!");
    }


    public function edit($id){
    	$data['getGrade'] = Grade::find($id);
    	return view('franchiseowner.pages.grade.edit-grade', $data);
    }

    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'grade_name'   =>  'required',
            'amount' => 'required',
        ]);
    	$grade = Grade::find($id);
    	$grade->grade_name = strip_tags($request->grade_name);
        $grade->amount = strip_tags($request->amount);
    	$grade->save();
    	return redirect()->route('franchiseowner.grade.view')->with("success", "Grade updated Successfully!!");
    }

    public function delete($id){
    	$getGrade = Grade::find($id);
    	$getGrade->delete();
    	return redirect()->route('franchiseowner.grade.view')->with("success", "Grade deleted Successfully!!");
    }
}
