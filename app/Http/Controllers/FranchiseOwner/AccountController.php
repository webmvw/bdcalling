<?php

namespace App\Http\Controllers\FranchiseOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Account;
use App\Models\Franchise;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
     public function view(){
        $franchise_id = Auth::user()->franchise_id;
    	$data['allAccount'] = Account::where('franchise_id', $franchise_id)->orderBy('id', 'desc')->get();
    	return view('franchiseowner.pages.account.view-account', $data);
    }



    public function add(){
    	return view('franchiseowner.pages.account.add-account');
    }

    public function store(Request $request){
        $request->validate([
            'account_name' => 'required|unique:accounts',
            'source' => "required",
            'account_link' => "required",
        ]);

    	$account = new Account;
    	$account->account_name = strip_tags($request->account_name);
        $account->source = strip_tags($request->source);
        $account->account_link = strip_tags($request->account_link);
        $account->franchise_id = Auth::user()->franchise_id;
    	$account->save();
    	return redirect()->route('franchiseowner.account.view')->with("success", "Account Added Successfully!!");
    }


    public function edit($id){
    	$data['account'] = Account::find($id);
    	return view('franchiseowner.pages.account.edit-account', $data);
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
        ]);
    	$account = Account::find($id);
    	$account->account_name = strip_tags($request->account_name);
        $account->source = strip_tags($request->source);
        $account->account_link = strip_tags($request->account_link);
    	$account->save();
    	return redirect()->route('franchiseowner.account.view')->with("success", "Account updated Successfully!!");
    }

    public function delete($id){
    	$account = Account::find($id);
    	$account->delete();
    	return redirect()->route('franchiseowner.account.view')->with("success", "Account deleted Successfully!!");
    }
    
}
