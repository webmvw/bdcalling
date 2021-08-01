<?php

namespace App\Http\Controllers\KAMSales;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class KAMSalesController extends Controller
{
    public function index(){
    	return view('kamsales.index');
    }
    public function view(){
        $kam_id=Auth::user()->id;
    $kam_data=Order::query()->where('kam_id','=',$kam_id)->get();
        return view('kamsales.pages.order.order-list',compact('kam_data'));
    }

    public function add(){
        $date = Carbon::now();
        $account=Account::all();
        date_default_timezone_set('Asia/Dhaka');
        $date=$date->toFormattedDateString();


        return view('kamsales.pages.order.add-order',compact('date','account'));
    }




    public function store(Request $req){
    $kam_id=$req->input('kam_id');
    $inc_data=$req->input('inc_date');

    $account=$req->input('account');
    $amount=$req->input('amount');
    $percentage=$req->input('percentage');
    if ($percentage==""){
        $platform_charges_calculate=($amount/100)*20;

    }else{
    $platform_charges_calculate= $amount*$percentage/100;
    }
    $client_user_id=$req->input('client_user_id');
    $client_name=$req->input('client_name');
    $email_address=$req->input('email_address');
    $client_linkedIn=$req->input('client_linkedIn');
    $order_page_url=$req->input('order_page_url');
    $spreadsheet_link=$req->input('spreadsheet_link');
    $remarks=$req->input('remarks');

    $deli_amount_calculate=$amount-$platform_charges_calculate;
    $deli_deedline=$req->input('deli_deedline');
    $date= Carbon::parse($deli_deedline)->format('m F Y h:i A');


     $result=Order::query()->insert([

         "kam_id"=>$kam_id,
         "inc_data"=>$inc_data,
         "account"=>$account,
         "amount"=>$amount,
         "percentage"=>$percentage,
         "charges_platform"=>$platform_charges_calculate,
         "client_user_id"=>$client_user_id,
         "client_name"=>$client_name,
         "email_address"=>$email_address,
         "client_linkedIn"=>$client_linkedIn,
         "order_page_url"=>$order_page_url,
         "spreadsheet_link"=>$spreadsheet_link,
         "remarks"=>$remarks,
         "deli_amount"=>$deli_amount_calculate,
         "deli_deedline"=>$date
     ]);

    return redirect()->route('order.view')->with('success','Record Added Successfully');

    }


}
