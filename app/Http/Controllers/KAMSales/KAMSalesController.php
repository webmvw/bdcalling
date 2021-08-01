<?php

namespace App\Http\Controllers\KAMSales;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Order;
class KAMSalesController extends Controller
{
    public function index(){
    	return view('kamsales.index');
    }
    public function view(){
        $date = Carbon::now();
        $account=Account::all();
        date_default_timezone_set('Asia/Dhaka');
        $date=$date->toFormattedDateString();


        return view('kamsales.pages.order.add-order',compact('date','account'));
    }

public function store(Request $req){


    $responsible=$req->input('responsible');
    $inc_data=$req->input('inc_date');

    $account=$req->input('account');
    $amount=$req->input('amount');
    $percentage=$req->input('percentage');
    $charges_platform=$req->input('charges_platform');
    $client_user_id=$req->input('client_user_id');
    $client_name=$req->input('client_name');
    $email_address=$req->input('email_address');
    $client_linkedIn=$req->input('client_linkedIn');
    $order_page_url=$req->input('order_page_url');
    $spreadsheet_link=$req->input('spreadsheet_link');
    $remarks=$req->input('remarks');
    $deli_amount=$req->input('deli_amount');
    $deli_deedline=$req->input('deli_deedline');

 $result=Order::query()->insert([

     "responsible"=>$responsible,
     "inc_data"=>$inc_data,
     "account"=>$account,
     "amount"=>$amount,
     "percentage"=>$percentage,
     "charges_platform"=>$charges_platform,
     "client_user_id"=>$client_user_id,
     "client_name"=>$client_name,
     "email_address"=>$email_address,
     "client_linkedIn"=>$client_linkedIn,
     "order_page_url"=>$order_page_url,
     "spreadsheet_link"=>$spreadsheet_link,
     "remarks"=>$remarks,
     "deli_amount"=>$deli_amount,
     "deli_deedline"=>$deli_deedline
 ]);

return redirect()->route('order.view')->with('Add Successfully');



}

}
