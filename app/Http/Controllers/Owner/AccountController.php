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
        $data['franchises'] = Franchise::all(); 
    	$data['allAccount'] = Account::latest()->get();
    	return view('owner.pages.account.view-account', $data);
    }


    public function search(Request $request){
        $data['search'] = true;
       $data['franchises'] = Franchise::all(); 
       $data['franchise_id'] = strip_tags($request->franchise_id);
       $data['allAccount'] = Account::where('franchise_id', $request->franchise_id)->get();
       return view('owner.pages.account.view-account', $data);
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
    	$account->account_name = strip_tags($request->account_name);
        $account->source = strip_tags($request->source);
        $account->account_link = strip_tags($request->account_link);
        $account->franchise_id = strip_tags($request->franchise);
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
    	$account->account_name = strip_tags($request->account_name);
        $account->source = strip_tags($request->source);
        $account->account_link = strip_tags($request->account_link);
        $account->franchise_id = strip_tags($request->franchise);
    	$account->save();
    	return redirect()->route('owner.account.view')->with("success", "Account updated Successfully!!");
    }

    public function delete($id){
    	$account = Account::find($id);
    	$account->delete();
    	return redirect()->route('owner.account.view')->with("success", "Account deleted Successfully!!");
    }
    
}
