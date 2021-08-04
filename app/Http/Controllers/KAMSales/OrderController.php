<?php

namespace App\Http\Controllers\KAMSales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\OrderDeliver;

class OrderController extends Controller
{
    public function view(){
        $allData = OrderDeliver::where('order_status', 'NRA')->orderBy('id', 'desc')->with('responsible_info', 'account')->get();
        return view('kamsales.pages.order.view-order', compact('allData'));
    }



    public function add(){
        $data['accounts'] = Account::all();
        $data['date'] = date('Y-m-d');
        return view('kamsales.pages.order.add-order', $data);
    }



    public function store(Request $request){
        $request->validate([
            'account' => 'required',
            'amount' => 'required',
            'client_user_id' => 'required',
            'client_name' => 'required',
            'order_page_url' => 'required',
            'deli_last_date' => 'required',
        ]);

        $order = new OrderDeliver;
        $order->responsible = Auth::user()->id;
        $order->inc_date = $request->inc_date;
        $order->account_id = $request->account;
        $order->amount = $request->amount;
        if($request->percentage == null){
            $percentage = 20;
            $platform_charge = ($request->amount/100)*20;
        }else{
            $percentage = $request->percentage;
            $platform_charge = ($request->amount/100)*$percentage;
        }
        $order->percentage = $percentage;
        $order->platform_charges = $platform_charge;
        $order->client_user_id = $request->client_user_id;
        $order->client_name = $request->client_name;
        $order->client_email = $request->client_email;
        $order->client_linkedin = $request->client_linkedin;
        $order->orderpage_url = $request->order_page_url;
        $order->spreadsheet_link = $request->spreadsheet_link;
        $order->remarks = $request->remarks;
        $order->deli_last_time = $request->deli_last_date;
        $order->order_status = "NRA";
        $order->deli_amount = $request->amount-$platform_charge;
        $order->save();
        return redirect()->route('order.view')->with("success", "Order Added Successfully!!");
    }

}
