<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Account;

class AccountController extends Controller
{
     public function view(){
    	$allAccount = Account::latest()->get();
    	return view('superadmin.pages.account.view-account', compact('allAccount'));
    }

    public function add(){
    	return view('superadmin.pages.account.add-account');
    }

    public function store(Request $request){
        $request->validate([
            'account_name' => 'required|unique:accounts',
            'source' => "required",
            'account_link' => "required"
        ]);

    	$account = new Account;
    	$account->account_name = $request->account_name;
        $account->source = $request->source;
        $account->account_link = $request->account_link;
    	$account->save();
    	return redirect()->route('account.view')->with("success", "Account Added Successfully!!");
    }


    public function edit($id){
    	$account = Account::find($id);
    	return view('superadmin.pages.account.edit-account', compact('account'));
    }

    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'account_name'   =>  [
                'required',
                 Rule::unique('accounts')->ignore($id),
            ],
            'source' => "required",
            'account_link' => "required"
        ]);
    	$account = Account::find($id);
    	$account->account_name = $request->account_name;
        $account->source = $request->source;
        $account->account_link = $request->account_link;
    	$account->save();
    	return redirect()->route('account.view')->with("success", "Account updated Successfully!!");
    }

    public function delete($id){
    	$account = Account::find($id);
    	$account->delete();
    	return redirect()->route('account.view')->with("success", "Account deleted Successfully!!");
    }
    
}
