<?php

namespace App\Http\Controllers\Owner\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDeliver;
use App\Models\Franchise;
use App\Models\Department;
use App\Models\Account;
use DB;

class OrderReportController extends Controller
{   


    /**
     * all order report
     */
    
    public function allOrderReport(){
        return view('owner.pages.report.order.all-order-report');
    }

    public function allOrderReportRequest(Request $request){
        $start_date = strip_tags($request->start_date);
        $end_date = strip_tags($request->end_date);

        $getReport = OrderDeliver::select(DB::raw('sum(deli_amount) as deli_amount'), 'inc_date')->whereBetween('inc_date', [$start_date, $end_date])->groupBy('inc_date')->get();
        return view('owner.pages.report.order.all-order-report', compact('getReport', 'start_date', 'end_date'));
    }



    /**
     * Franchise wise all order report
     */
    public function franchiseWiseOrderReport(){
        $franchises = Franchise::all();
        return view('owner.pages.report.order.franchisewise.franchisewise-order-report', compact('franchises'));
    }

    public function franchiseWiseOrderReportRequest(Request $request){
        $request->validate([
            'franchise' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);   

        $franchises = Franchise::all();

        $franchise_id = strip_tags($request->franchise);
        $start_date = strip_tags($request->start_date);
        $end_date = strip_tags($request->end_date);

        $getReport = OrderDeliver::select(DB::raw('sum(deli_amount) as deli_amount'), 'inc_date')->whereBetween('inc_date', [$start_date, $end_date])->where('franchise_id', $franchise_id)->groupBy('inc_date')->get();
        return view('owner.pages.report.order.franchisewise.franchisewise-order-report-view', compact('getReport', 'franchise_id', 'start_date', 'end_date', 'franchises'));
    }





    /**
     * department wise all order report
     */
    public function departmentwiseOrderReport(){
        $franchises = Franchise::all();
        return view('owner.pages.report.order.departmentwise.departmentwise-order-report', compact('franchises'));
    }

    public function get_department(Request $request){
        $franchise_id = $request->franchise_id;
        $getDepartment = Department::where('franchise_id', $franchise_id)->get();
        return response()->json($getDepartment, 200);
    }

    public function departmentwiseOrderReportRequest(Request $request){
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

        $getReport = OrderDeliver::select(DB::raw('sum(deli_amount) as deli_amount'), 'inc_date')->whereBetween('inc_date', [$start_date, $end_date])->where('franchise_id', $franchise_id)->where('department_id', $department_id)->groupBy('inc_date')->get();

        return view('owner.pages.report.order.departmentwise.departmentwise-order-report-view', compact('getReport', 'franchise_id', 'start_date', 'end_date', 'franchises', 'department_name'));
    }



     /**
     * account wise all order report
     */
    public function accountwiseOrderReport(){
        $franchises = Franchise::all();
        return view('owner.pages.report.order.accountwise.accountwise-order-report', compact('franchises'));
    }

    public function get_account(Request $request){
        $franchise_id = $request->franchise_id;
        $getAccount = Account::where('franchise_id', $franchise_id)->get();
        return response()->json($getAccount, 200);
    }

    public function accountwiseOrderReportRequest(Request $request){
         $request->validate([
            'franchise' => 'required',
            'account' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);   

        $franchises = Franchise::all();

        $franchise_id = strip_tags($request->franchise);
        $account_id = strip_tags($request->account);
        $start_date = strip_tags($request->start_date);
        $end_date = strip_tags($request->end_date);

        $Get_Account = Account::find($account_id);
        $account_name = $Get_Account->account_name;

        $getReport = OrderDeliver::select(DB::raw('sum(deli_amount) as deli_amount'), 'inc_date')->whereBetween('inc_date', [$start_date, $end_date])->where('franchise_id', $franchise_id)->where('account_id', $account_id)->groupBy('inc_date')->get();

        return view('owner.pages.report.order.accountwise.accountwise-order-report-view', compact('getReport', 'franchise_id', 'start_date', 'end_date', 'franchises', 'account_name'));
    }




    /**
     *  kam sales order report
     */
     
     public function kamsalesOrderReport(){
        $franchises = Franchise::all();
        return view('owner.pages.report.order.kamsales.kamsales-order-report', compact('franchises'));
     }

     public function kamsalesOrderReportRequest(Request $request){
        $request->validate([
            'franchise' => 'required',
            'year' => 'required',
            'month' => 'required',
        ]);   

        $franchises = Franchise::all();

        $request_franchise_id = strip_tags($request->franchise);
        $request_year = strip_tags($request->year);
        $request_month = strip_tags($request->month);

        $getKamSalesOrder = OrderDeliver::select('inc_date')->where('franchise_id', $request_franchise_id)->whereYear('created_at', $request_year)->whereMonth('created_at', $request_month)->groupBy('inc_date')->orderBy('inc_date', 'desc')->get();
    

        return view('owner.pages.report.order.kamsales.kamsales-order-report-view', compact('getKamSalesOrder', 'request_franchise_id', 'request_year', 'request_month', 'franchises'));
     }



}
