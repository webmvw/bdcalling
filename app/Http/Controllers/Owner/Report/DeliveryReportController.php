<?php

namespace App\Http\Controllers\Owner\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDeliver;
use App\Models\Franchise;
use App\Models\Department;
use App\Models\Account;
use DB;

class DeliveryReportController extends Controller
{
    
    /**
     * all order report
     */
    
    public function allDeliveryReport(){
        return view('owner.pages.report.delivery.all-delivery-report');
    }

    public function allDeliveryReportRequest(Request $request){
        $start_date = strip_tags($request->start_date);
        $end_date = strip_tags($request->end_date);

        $getReport = OrderDeliver::select(DB::raw('sum(deli_amount) as deli_amount'), 'deli_date')->whereBetween('deli_date', [$start_date, $end_date])->where('order_status', 'Delivered')->groupBy('deli_date')->get();
        return view('owner.pages.report.delivery.all-delivery-report', compact('getReport', 'start_date', 'end_date'));
    }




     /**
     * Franchise wise all order report
     */
    public function franchiseWiseDeliveryReport(){
        $franchises = Franchise::all();
        return view('owner.pages.report.delivery.franchisewise.franchisewise-delivery-report', compact('franchises'));
    }

    public function franchiseWiseDeliveryReportRequest(Request $request){
        $request->validate([
            'franchise' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);   

        $franchises = Franchise::all();

        $franchise_id = strip_tags($request->franchise);
        $start_date = strip_tags($request->start_date);
        $end_date = strip_tags($request->end_date);

        $getReport = OrderDeliver::select(DB::raw('sum(deli_amount) as deli_amount'), 'deli_date')->whereBetween('deli_date', [$start_date, $end_date])->where('franchise_id', $franchise_id)->where('order_status', 'Delivered')->groupBy('deli_date')->get();
        return view('owner.pages.report.delivery.franchisewise.franchisewise-delivery-report-view', compact('getReport', 'franchise_id', 'start_date', 'end_date', 'franchises'));
    }





    /**
     * department wise all order report
     */
    public function departmentwiseDeliveryReport(){
        $franchises = Franchise::all();
        return view('owner.pages.report.delivery.departmentwise.departmentwise-delivery-report', compact('franchises'));
    }

    public function get_department(Request $request){
        $franchise_id = $request->franchise_id;
        $getDepartment = Department::where('franchise_id', $franchise_id)->get();
        return response()->json($getDepartment, 200);
    }

    public function departmentwiseDeliveryReportRequest(Request $request){
         $request->validate([
            'franchise' => 'required',
            'department' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);   

        $franchises = Franchise::all();

        $franchise_id = strip_tags($request->franchise);
        $department_id = strip_tags($request->department);
        $start_date = strip_tags($request->start_date);
        $end_date = strip_tags($request->end_date);

        $Get_Department = Department::find($department_id);
        $department_name = $Get_Department->name;

        $getReport = OrderDeliver::select(DB::raw('sum(deli_amount) as deli_amount'), 'deli_date')->whereBetween('deli_date', [$start_date, $end_date])->where('franchise_id', $franchise_id)->where('department_id', $department_id)->where('order_status', 'Delivered')->groupBy('deli_date')->get();

        return view('owner.pages.report.delivery.departmentwise.departmentwise-delivery-report-view', compact('getReport', 'franchise_id', 'start_date', 'end_date', 'franchises', 'department_name'));
    }



}
