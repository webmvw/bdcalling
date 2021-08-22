<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Account;
use App\Models\Franchise;

class AccountController extends Controller
{
     public function view(){
        $data['franchises'] = Franchise::all();
    	$data['allAccount'] = Account::orderBy('id', 'desc')->get();
    	return view('superadmin.pages.account.view-account', $data);
    }

    public function search(Request $request){
        $data['search'] = true;
       $data['franchises'] = Franchise::all(); 
       $data['franchise_id'] = strip_tags($request->franchise_id);
       $data['allAccount'] = Account::where('franchise_id', $request->franchise_id)->orderBy('id', 'desc')->get();
       return view('superadmin.pages.account.view-account', $data);
    }

    public function add(){
        $data['franchises'] = Franchise::all();
    	return view('superadmin.pages.account.add-account', $data);
    }

    public function store(Request $request){
        $request->validate([
            'account_name' => 'required|unique:accounts',
            'source' => "required",
            'account_link' => "required",
            'franchise' => "required",
        ]);

        $account = new Account;
        $account->account_name = $request->account_name;
        $account->source = $request->source;
        $account->account_link = $request->account_link;
        $account->franchise_id = $request->franchise;
    	$account->save();
    	return redirect()->route('account.view')->with("success", "Account Added Successfully!!");
    }


    public function edit($id){
    	$data['account'] = Account::find($id);
        $data['franchises'] = Franchise::all();
    	return view('superadmin.pages.account.edit-account', $data);
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
    	return redirect()->route('account.view')->with("success", "Account updated Successfully!!");
    }

    public function delete($id){
    	$account = Account::find($id);
    	$account->delete();
    	return redirect()->route('account.view')->with("success", "Account deleted Successfully!!");
    }
    
}
