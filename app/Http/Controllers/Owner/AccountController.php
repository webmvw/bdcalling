<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Account;
use App\Models\Franchise;

class AccountController extends Controller
{
     public function view(){
    	$allAccount = Account::latest()->get();
    	return view('owner.pages.account.view-account', compact('allAccount'));
    }

    public function add(){
        $data['franchises'] = Franchise::all();
    	return view('owner.pages.account.add-account', $data);
    }

    public function store(Request $request){
        $request->validate([
            'account_name' => 'required|unique:accounts',
            'source' => "required",
            'account_link' => "required",
            'franchise' => "required"
        ]);

    	$account = new Account;
    	$account->account_name = $request->account_name;
        $account->source = $request->source;
        $account->account_link = $request->account_link;
        $account->franchise_id = $request->franchise;
    	$account->save();
    	return redirect()->route('owner.account.view')->with("success", "Account Added Successfully!!");
    }


    public function edit($id){
    	$data['account'] = Account::find($id);
        $data['franchises'] = Franchise::all();
    	return view('owner.pages.account.edit-account', $data);
    }

    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'account_name'   =>  [
                'required',
                 Rule::unique('accounts')->ignore($id),
            ],
            'source' => "required",
            'account_link' => "required",
            'franchise' => "required"
        ]);
    	$account = Account::find($id);
    	$account->account_name = $request->account_name;
        $account->source = $request->source;
        $account->account_link = $request->account_link;
        $account->franchise_id = $request->franchise;
    	$account->save();
    	return redirect()->route('owner.account.view')->with("success", "Account updated Successfully!!");
    }

    public function delete($id){
    	$account = Account::find($id);
    	$account->delete();
    	return redirect()->route('owner.account.view')->with("success", "Account deleted Successfully!!");
    }
    
}