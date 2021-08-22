<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Team;
use App\Models\Department;
use App\Models\Franchise;

class TeamController extends Controller
{
    public function view(){
        $data['franchises'] = Franchise::all();
    	$data['allteams'] = Team::orderBy('id', 'desc')->get();
    	return view('superadmin.pages.team.view-team', $data);
    }


    public function search(Request $request){
        $data['search'] = true;
       $data['franchises'] = Franchise::all(); 
       $data['franchise_id'] = strip_tags($request->franchise_id);
       $data['allteams'] = Team::where('franchise_id', $request->franchise_id)->orderBy('id', 'desc')->get();
       return view('superadmin.pages.team.view-team', $data);
    }


    public function add(){
        $data['franchises'] = Franchise::all();
    	return view('superadmin.pages.team.add-team', $data);
    }

    public function store(Request $request){
        $request->validate([
            'team_name' => 'required',
            'department_id' => 'required',
            'franchise' => 'required',
        ]);

        $team = new Team;
        $team->team_name = strip_tags($request->team_name);
        $team->department_id = strip_tags($request->department_id);
        $team->franchise_id = strip_tags($request->franchise);
        $team->save();
    	return redirect()->route('team.view')->with("success", "Team Added Successfully!!");
    }


    public function edit($id){
        $data['getDepartment'] = Department::all();
    	$data['getTeam'] = Team::find($id);
        $data['franchises'] = Franchise::all();
    	return view('superadmin.pages.team.edit-team', $data);
    }



    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'team_name'   => 'required',
            'department_id'   => 'required',
            'franchise' => 'required',
        ]);
        $team = Team::find($id);
        $team->team_name = strip_tags($request->team_name);
        $team->department_id = strip_tags($request->department_id);
        $team->franchise_id = strip_tags($request->franchise);
        $team->save();
    	return redirect()->route('team.view')->with("success", "Team updated Successfully!!");
    }

    public function delete($id){
    	$getteam = Team::find($id);
    	$getteam->delete();
    	return redirect()->route('team.view')->with("success", "Team deleted Successfully!!");
    }
}
