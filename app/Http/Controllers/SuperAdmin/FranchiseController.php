<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Franchise;

class FranchiseController extends Controller
{
    public function view(){
        $allfranchises = Franchise::latest()->get();
        return view('superadmin.pages.franchise.view-franchise', compact('allfranchises'));
    }

    public function add(){
        return view('superadmin.pages.franchise.add-franchise');
    }

    public function store(Request $request){

        $request->validate([
            'username' => 'required|unique:franchises',
            'nid_number' => 'required',
            'active_bank_account_details' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'location' => 'required',
        ]);

        $franchise = new Franchise;
        $franchise->username = $request->username;
        $franchise->nid_number = $request->nid_number;
        $franchise->active_bank_account_details = $request->active_bank_account_details;
        $franchise->account_name = $request->account_name;
        $franchise->account_number = $request->account_number;
        $franchise->bank_name = $request->bank_name;
        $franchise->branch_name = $request->branch_name;
        $franchise->address = $request->address;
        $franchise->phone = $request->phone;
        $franchise->location = $request->location;
        $franchise->save();
        return redirect()->route('franchise.view')->with("success", "Franchise Added Successfully!!");
    }


    public function edit($id){
        $getFranchise = Franchise::find($id);
        return view('superadmin.pages.franchise.edit-franchise', compact('getFranchise'));
    }

    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'username'   =>  [
                'required',
                 Rule::unique('franchises')->ignore($id),
            ],
            'nid_number' => 'required',
            'active_bank_account_details' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'location' => 'required',
        ]);
        $franchise = Franchise::find($id);
        $franchise->username = $request->username;
        $franchise->nid_number = $request->nid_number;
        $franchise->active_bank_account_details = $request->active_bank_account_details;
        $franchise->account_name = $request->account_name;
        $franchise->account_number = $request->account_number;
        $franchise->bank_name = $request->bank_name;
        $franchise->branch_name = $request->branch_name;
        $franchise->address = $request->address;
        $franchise->phone = $request->phone;
        $franchise->location = $request->location;
        $franchise->save();
        return redirect()->route('franchise.view')->with("success", "Franchise updated Successfully!!");
    }

    public function delete($id){
        $getFranchise = Franchise::find($id);
        $getFranchise->delete();
        return redirect()->route('franchise.view')->with("success", "Franchise deleted Successfully!!");
    }
}
