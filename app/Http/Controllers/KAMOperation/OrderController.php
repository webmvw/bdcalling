<?php

namespace App\Http\Controllers\KAMOperation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderDeliver;
use App\Models\Team;
use App\Models\Department;

class OrderController extends Controller
{

    public function deliveryList(){
      $franchise_id = Auth::user()->franchise_id;
      $allData = OrderDeliver::with('responsible_info', 'account', 'team', 'delivered_by_info')->where('franchise_id', $franchise_id)->where('order_status', 'Delivered')->orderBy('deli_date', 'desc')->get();
        return view('kamoperation.pages.order.view-delivery', compact('allData'));
    }

     public function view(){
        $franchise_id = Auth::user()->franchise_id;
        $allData = OrderDeliver::where('franchise_id', $franchise_id)->whereIn('order_status', ['NRA', 'WIP', 'NE', 'Complete', 'Revision', 'Issues', 'Cancalled'])->orderBy('id', 'desc')->with('responsible_info', 'account')->get();
        return view('kamoperation.pages.order.view-order', compact('allData'));
    }



    public function status($id){
      $franchise_id = Auth::user()->franchise_id;
      $data['getOrder'] = OrderDeliver::find($id);
      $data['teams'] = Team::where('franchise_id', $franchise_id)->get();
      $data['departments'] = Department::where('franchise_id', $franchise_id)->get();
      return view('kamoperation.pages.order.status-order', $data);
    }


    public function statusUpdate(Request $request, $id){
      $getOrderDeliver = OrderDeliver::find($id);
      $getOrderDeliver->order_status = strip_tags($request->order_status);
      $getOrderDeliver->team_id = strip_tags($request->team);
      $getOrderDeliver->department_id = strip_tags($request->department);
      $getOrderDeliver->remarks = strip_tags($request->remarks);
      $getOrderDeliver->save();
      return redirect()->route('kamoperation.order.view')->with('success', 'Order Status Updated Success');
    }


    public function delivery($id){
      $franchise_id = Auth::user()->franchise_id;
      $data['getOrder'] = OrderDeliver::find($id);
      $data['teams'] = Team::where('franchise_id', $franchise_id)->get();
      $data['departments'] = Department::where('franchise_id', $franchise_id)->get();
      return view('kamoperation.pages.order.delivery-order', $data);
    }


    public function deliverySuccess(Request $request, $id){
      $getOrder = OrderDeliver::find($id);

      if($request->tips == null){
        $getOrder->tips = $request->tips;
        $getOrder->order_status = $request->order_status;
        $getOrder->team_id = $request->team;
        $getOrder->department_id = $request->department;
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
        $getOrder->department_id = $request->department;
        $getOrder->remarks = $request->remarks;
        $getOrder->deli_date = $request->deli_date;
        $getOrder->deli_amount = $new_deli_amount;
        $getOrder->delivered_by = Auth::user()->id;
        $getOrder->save();
      }

      return redirect()->route('kamoperation.order.view')->with('success', 'Order Delivery Success');

    }

}
