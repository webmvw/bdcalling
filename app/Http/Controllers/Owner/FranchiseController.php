<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Franchise;

class FranchiseController extends Controller
{
    public function view(){
        $allfranchises = Franchise::latest()->get();
        return view('owner.pages.franchise.view-franchise', compact('allfranchises'));
    }

    public function add(){
        return view('owner.pages.franchise.add-franchise');
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
        $franchise->username = strip_tags($request->username);
        $franchise->nid_number = strip_tags($request->nid_number);
        $franchise->active_bank_account_details = strip_tags($request->active_bank_account_details);
        $franchise->account_name = strip_tags($request->account_name);
        $franchise->account_number = strip_tags($request->account_number);
        $franchise->bank_name = strip_tags($request->bank_name);
        $franchise->branch_name = strip_tags($request->branch_name);
        $franchise->address = strip_tags($request->address);
        $franchise->phone = strip_tags($request->phone);
        $franchise->location = strip_tags($request->location);
        $franchise->save();
        return redirect()->route('owner.franchise.view')->with("success", "Franchise Added Successfully!!");
    }


    public function edit($id){
        $getFranchise = Franchise::find($id);
        return view('owner.pages.franchise.edit-franchise', compact('getFranchise'));
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
        $franchise->username = strip_tags($request->username);
        $franchise->nid_number = strip_tags($request->nid_number);
        $franchise->active_bank_account_details = strip_tags($request->active_bank_account_details);
        $franchise->account_name = strip_tags($request->account_name);
        $franchise->account_number = strip_tags($request->account_number);
        $franchise->bank_name = strip_tags($request->bank_name);
        $franchise->branch_name = strip_tags($request->branch_name);
        $franchise->address = strip_tags($request->address);
        $franchise->phone = strip_tags($request->phone);
        $franchise->location = strip_tags($request->location);
        $franchise->save();
        return redirect()->route('owner.franchise.view')->with("success", "Franchise updated Successfully!!");
    }

    public function delete($id){
        $getFranchise = Franchise::find($id);
        $getFranchise->delete();
        return redirect()->route('owner.franchise.view')->with("success", "Franchise deleted Successfully!!");
    }
}
