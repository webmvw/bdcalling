<?php

namespace App\Http\Controllers\FranchiseOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Team;
use App\Models\Department;
use App\Models\Franchise;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function view(){
        $franchise_id = Auth::user()->franchise_id;
    	$data['allteams'] = Team::where('franchise_id', $franchise_id)->orderBy('id', 'desc')->get();
    	return view('franchiseowner.pages.team.view-team', $data);
    }


    public function add(){
        $franchise_id = Auth::user()->franchise_id;
        $data['departments'] = Department::where('franchise_id', $franchise_id)->get();
    	return view('franchiseowner.pages.team.add-team', $data);
    }

    public function store(Request $request){

        $request->validate([
            'team_name' => 'required',
            'department_id' => 'required',
        ]);

    	$team = new Team;
    	$team->team_name = strip_tags($request->team_name);
        $team->department_id = strip_tags($request->department_id);
        $team->franchise_id =  Auth::user()->franchise_id;
    	$team->save();
    	return redirect()->route('franchiseowner.team.view')->with("success", "Team Added Successfully!!");
    }


    public function edit($id){
        $franchise_id = Auth::user()->franchise_id;
        $data['getDepartment'] = Department::where('franchise_id', $franchise_id)->get();
    	$data['getTeam'] = Team::find($id);
      
    	return view('franchiseowner.pages.team.edit-team', $data);
    }

    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'team_name'   =>  'required',
            'department_id'   => 'required',
        ]);
    	$team = Team::find($id);
    	$team->team_name = strip_tags($request->team_name);
        $team->department_id = strip_tags($request->department_id);
        $team->franchise_id = Auth::user()->franchise_id;
    	$team->save();
    	return redirect()->route('franchiseowner.team.view')->with("success", "Team updated Successfully!!");
    }

    public function delete($id){
    	$getteam = Team::find($id);
    	$getteam->delete();
    	return redirect()->route('franchiseowner.team.view')->with("success", "Team deleted Successfully!!");
    }
}
