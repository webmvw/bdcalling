<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Grade;

class GradeController extends Controller
{
    public function view(){
    	$allGrades = Grade::get();
    	return view('owner.pages.grade.view-grade', compact('allGrades'));
    }

    public function add(){
    	return view('owner.pages.grade.add-grade');
    }

    public function store(Request $request){

        $request->validate([
            'grade_name' => 'required|unique:grades',
            'amount' => 'required',
        ]);

    	$grade = new Grade;
    	$grade->grade_name = $request->grade_name;
        $grade->amount = $request->amount;
    	$grade->save();
    	return redirect()->route('owner.grade.view')->with("success", "Grade Added Successfully!!");
    }


    public function edit($id){
    	$getGrade = Grade::find($id);
    	return view('owner.pages.grade.edit-grade', compact('getGrade'));
    }

    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'grade_name'   =>  [
                'required',
                 Rule::unique('grades')->ignore($id),
            ],
            'amount' => 'required',  
        ]);
    	$grade = Grade::find($id);
    	$grade->grade_name = $request->grade_name;
        $grade->amount = $request->amount;
    	$grade->save();
    	return redirect()->route('owner.grade.view')->with("success", "Grade updated Successfully!!");
    }

    public function delete($id){
    	$getGrade = Grade::find($id);
    	$getGrade->delete();
    	return redirect()->route('owner.grade.view')->with("success", "Grade deleted Successfully!!");
    }
}
