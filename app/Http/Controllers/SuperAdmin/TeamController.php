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
    	$allteams = Team::latest()->get();
    	return view('superadmin.pages.team.view-team', compact('allteams'));
    }

    public function add(){
        $data['departments'] = Department::all();
        $data['franchises'] = Franchise::all();
    	return view('superadmin.pages.team.add-team', $data);
    }

    public function store(Request $request){
        $request->validate([
            'team_name' => 'required|unique:teams',
            'department_id' => 'required',
            'franchise' => 'required',
        ]);

        $team = new Team;
        $team->team_name = $request->team_name;
        $team->department_id = $request->department_id;
        $team->franchise_id = $request->franchise;
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
            'team_name'   =>  [
                'required',
                 Rule::unique('teams')->ignore($id),
            ],
            'department_id'   => 'required',
            'franchise' => 'required',
        ]);
        $team = Team::find($id);
        $team->team_name = $request->team_name;
        $team->department_id = $request->department_id;
        $team->franchise_id = $request->franchise;
        $team->save();
    	return redirect()->route('team.view')->with("success", "Team updated Successfully!!");
    }

    public function delete($id){
    	$getteam = Team::find($id);
    	$getteam->delete();
    	return redirect()->route('team.view')->with("success", "Team deleted Successfully!!");
    }
}
