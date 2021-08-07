<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\OrderDeliver;
use Illuminate\Http\Request;

class AllOrderController extends Controller
{
    public function allOrderView()
    {
        $allData = OrderDeliver::whereIn('order_status', ['NRA', 'WIP', 'NE', 'Complete', 'Revision', 'Issues', 'Cancalled'])->get();
        return view('owner.pages.all-order-list.all-order-list', compact('allData'));

    }

    public function view(Request $req)
    {
        $day = $req->input('dates');
        if (!empty($day)) {
            $result = OrderDeliver::query()->where('inc_date', 'LIKE', "%{$day}%")->get();
            $Total_amount = OrderDeliver::query()->where('inc_date', '=', $day)->sum('amount');
            $Total_Platform_charge = OrderDeliver::query()->where('inc_date', '=', $day)->sum('platform_charges');
            $deli_amount = OrderDeliver::query()->where('inc_date', '=', $day)->sum('deli_amount');
            $Convert = date("d/m/Y", strtotime($day));
            return view('owner.pages.all-order-list.report-view', compact('result', 'Total_amount', 'Total_Platform_charge', 'deli_amount', 'Convert'));

        }

    }

    public function DeliveryView()
    {
        $allData = OrderDeliver::where('order_status', 'Delivered')->get();
        return view('owner.pages.all-order-list.all-delivery-list', compact('allData'));
    }

    public function deliveryReport(Request $req)
    {
        $day = $req->input('dates');
        if (!empty($day)) {

            $result = OrderDeliver::query()->where('order_status','=','Delivered')->where( 'inc_date', 'LIKE', "%{$day}%")->get();
            $Total_amount = OrderDeliver::query()->where('inc_date', '=', $day)->where('order_status','=','Delivered')->sum('amount');
            $Total_Platform_charge = OrderDeliver::query()->where('inc_date', '=', $day)->where('order_status','=','Delivered')->sum('platform_charges');
            $deli_amount = OrderDeliver::query()->where('inc_date', '=', $day)->where('order_status','=','Delivered')->sum('deli_amount');
            $Convert = date("d/m/Y", strtotime($day));
            return view('owner.pages.all-order-list.delivery-report-view', compact('result', 'Total_amount', 'Total_Platform_charge', 'deli_amount', 'Convert'));

        }

    }
}
