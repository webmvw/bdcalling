<?php

namespace App\Http\Controllers\KAMOperation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderDeliver;
use App\Models\Team;

class OrderController extends Controller
{

    public function deliveryList(){
      $allData = OrderDeliver::where('order_status', 'Delivered')->orderBy('id', 'desc')->with('responsible_info', 'account', 'team', 'delivered_by_info')->get();
        return view('kamoperation.pages.order.view-delivery', compact('allData'));
    }

     public function view(){
        $allData = OrderDeliver::whereIn('order_status', ['NRA', 'WIP', 'NE', 'Complete', 'Delivered', 'Revision', 'Issues', 'Cancalled'])->orderBy('id', 'desc')->with('responsible_info', 'account')->get();
        return view('kamoperation.pages.order.view-order', compact('allData'));
    }



    public function status($id){
      $data['getOrder'] = OrderDeliver::find($id);
      $data['teams'] = Team::all();
      return view('kamoperation.pages.order.status-order', $data);
    }


    public function statusUpdate(Request $request, $id){
      $getOrderDeliver = OrderDeliver::find($id);
      $getOrderDeliver->order_status = $request->order_status;
      $getOrderDeliver->team_id = $request->team;
      $getOrderDeliver->remarks = $request->remarks;
      $getOrderDeliver->save();
      return redirect()->route('kamoperation.order.view')->with('success', 'Order Status Updated Success');
    }


    public function delivery($id){
      $data['getOrder'] = OrderDeliver::find($id);
      $data['teams'] = Team::all();
      return view('kamoperation.pages.order.delivery-order', $data);
    }


    public function deliverySuccess(Request $request, $id){
      $getOrder = OrderDeliver::find($id);

      if($request->tips == null){
        $getOrder->tips = $request->tips;
        $getOrder->order_status = $request->order_status;
        $getOrder->team_id = $request->team;
        $getOrder->remarks = $request->remarks;
        $getOrder->deli_date = $request->deli_date;
        $getOrder->delivered_by = Auth::user()->id;
        $getOrder->save();
      }else{
        $tips = $request->tips;
        $percentage = $getOrder->percentage;
        $new_platform_charges = ($tips/100)*$percentage;
        $total_platform_charges = $getOrder->platform_charges+$new_platform_charges;
        $deli_amount_add = $tips-$new_platform_charges;
        $new_deli_amount = $getOrder->deli_amount+$deli_amount_add;

        $getOrder->platform_charges = $total_platform_charges;
        $getOrder->tips = $tips;
        $getOrder->order_status = $request->order_status;
        $getOrder->team_id = $request->team;
        $getOrder->remarks = $request->remarks;
        $getOrder->deli_date = $request->deli_date;
        $getOrder->deli_amount = $new_deli_amount;
        $getOrder->delivered_by = Auth::user()->id;
        $getOrder->save();
      }

      return redirect()->route('kamoperation.order.view')->with('success', 'Order Delivery Success');

    }

}
