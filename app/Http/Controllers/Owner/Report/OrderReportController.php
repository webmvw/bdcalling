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

        $get_1st_year_date = OrderDeliver::select('inc_date')->first();
        $get_last_year_date = OrderDeliver::select('inc_date')->orderBy('inc_date', 'desc')->first();
        $first_year = date('Y', strtotime($get_1st_year_date->inc_date));
        $last_year = date('Y', strtotime($get_last_year_date->inc_date));

        $year = date('Y');
        $month = date('m');
        $select_franchise = 'all';

        $getReport = OrderDeliver::select('inc_date')->whereYear('created_at', $year)->whereMonth('created_at', $month)->groupBy('inc_date')->orderBy('inc_date', 'desc')->get();
        return view('owner.pages.report.order.franchisewise.franchisewise-order-report', compact('franchises', 'first_year', 'last_year', 'year', 'month', 'select_franchise', 'getReport'));
    }

    public function franchiseWiseOrderReportRequest(Request $request){
        $request->validate([
            'franchise' => 'required',
            'year' => 'required',
            'month' => 'required',
        ]); 

        $franchises = Franchise::all();

        $get_1st_year_date = OrderDeliver::select('inc_date')->first();
        $get_last_year_date = OrderDeliver::select('inc_date')->orderBy('inc_date', 'desc')->first();
        $first_year = date('Y', strtotime($get_1st_year_date->inc_date));
        $last_year = date('Y', strtotime($get_last_year_date->inc_date));


        $franchise_id = strip_tags($request->franchise);
        $year = strip_tags($request->year);
        $month = strip_tags($request->month);

        if($franchise_id == 'all'){
            $getReport = OrderDeliver::select('inc_date')->whereYear('created_at', $year)->whereMonth('created_at', $month)->groupBy('inc_date')->orderBy('inc_date', 'desc')->get();
        }else{
            $getReport = OrderDeliver::select('inc_date')->where('franchise_id', $franchise_id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->groupBy('inc_date')->orderBy('inc_date', 'desc')->get();
        }
        return view('owner.pages.report.order.franchisewise.franchisewise-order-report-view', compact('getReport', 'franchise_id', 'first_year', 'last_year', 'franchises', 'year', 'month'));
    }





    /**
     * department wise all order report
     */
    public function departmentwiseOrderReport(){
        $franchises = Franchise::all();

        $get_1st_year_date = OrderDeliver::select('inc_date')->first();
        $get_last_year_date = OrderDeliver::select('inc_date')->orderBy('inc_date', 'desc')->first();
        $first_year = date('Y', strtotime($get_1st_year_date->inc_date));
        $last_year = date('Y', strtotime($get_last_year_date->inc_date));

        $year = date('Y');
        $month = date('m');
        $select_franchise = 'all';

        $getReport = OrderDeliver::select('inc_date')->whereYear('created_at', $year)->whereMonth('created_at', $month)->groupBy('inc_date')->orderBy('inc_date', 'desc')->get();
        return view('owner.pages.report.order.departmentwise.departmentwise-order-report', compact('franchises', 'first_year', 'last_year', 'year', 'month', 'select_franchise', 'getReport'));
    }

    public function departmentwiseOrderReportRequest(Request $request){
         $request->validate([
            'franchise' => 'required',
            'year' => 'required',
            'month' => 'required',
        ]);   

        $franchises = Franchise::all();

        $get_1st_year_date = OrderDeliver::select('inc_date')->first();
        $get_last_year_date = OrderDeliver::select('inc_date')->orderBy('inc_date', 'desc')->first();
        $first_year = date('Y', strtotime($get_1st_year_date->inc_date));
        $last_year = date('Y', strtotime($get_last_year_date->inc_date));

        $franchise_id = strip_tags($request->franchise);
        $year = strip_tags($request->year);
        $month = strip_tags($request->month);


        if($franchise_id == 'all'){
            $getReport = OrderDeliver::select('inc_date')->whereYear('created_at', $year)->whereMonth('created_at', $month)->groupBy('inc_date')->orderBy('inc_date', 'desc')->get();
        }else{
            $getReport = OrderDeliver::select('inc_date')->where('franchise_id', $franchise_id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->groupBy('inc_date')->orderBy('inc_date', 'desc')->get();
        }
        return view('owner.pages.report.order.departmentwise.departmentwise-order-report-view', compact('getReport', 'franchise_id', 'first_year', 'last_year', 'franchises', 'year', 'month'));
    }



     /**
     * account wise all order report
     */
    public function accountwiseOrderReport(){
        $franchises = Franchise::all();

        $get_1st_year_date = OrderDeliver::select('inc_date')->first();
        $get_last_year_date = OrderDeliver::select('inc_date')->orderBy('inc_date', 'desc')->first();
        $first_year = date('Y', strtotime($get_1st_year_date->inc_date));
        $last_year = date('Y', strtotime($get_last_year_date->inc_date));

        $year = date('Y');
        $month = date('m');
        $select_franchise = 'all';

        $getReport = OrderDeliver::select('inc_date')->whereYear('created_at', $year)->whereMonth('created_at', $month)->groupBy('inc_date')->orderBy('inc_date', 'desc')->get();
        return view('owner.pages.report.order.accountwise.accountwise-order-report', compact('franchises', 'first_year', 'last_year', 'year', 'month', 'select_franchise', 'getReport'));
    }

    public function accountwiseOrderReportRequest(Request $request){
         $request->validate([
            'franchise' => 'required',
            'year' => 'required',
            'month' => 'required',
        ]);   

        $franchises = Franchise::all();

        $get_1st_year_date = OrderDeliver::select('inc_date')->first();
        $get_last_year_date = OrderDeliver::select('inc_date')->orderBy('inc_date', 'desc')->first();
        $first_year = date('Y', strtotime($get_1st_year_date->inc_date));
        $last_year = date('Y', strtotime($get_last_year_date->inc_date));

        $franchise_id = strip_tags($request->franchise);
        $year = strip_tags($request->year);
        $month = strip_tags($request->month);


        if($franchise_id == 'all'){
            $getReport = OrderDeliver::select('inc_date')->whereYear('created_at', $year)->whereMonth('created_at', $month)->groupBy('inc_date')->orderBy('inc_date', 'desc')->get();
        }else{
            $getReport = OrderDeliver::select('inc_date')->where('franchise_id', $franchise_id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->groupBy('inc_date')->orderBy('inc_date', 'desc')->get();
        }
        return view('owner.pages.report.order.accountwise.accountwise-order-report-view', compact('getReport', 'franchise_id', 'first_year', 'last_year', 'franchises', 'year', 'month'));
    }




    /**
     *  kam sales order report
     */
     
     public function kamsalesOrderReport(){

        $franchises = Franchise::all();

        $get_1st_year_date = OrderDeliver::select('inc_date')->first();
        $get_last_year_date = OrderDeliver::select('inc_date')->orderBy('inc_date', 'desc')->first();
        $first_year = date('Y', strtotime($get_1st_year_date->inc_date));
        $last_year = date('Y', strtotime($get_last_year_date->inc_date));

        $year = date('Y');
        $month = date('m');
        $select_franchise = 'all';

        $getKamSalesOrder = OrderDeliver::select('inc_date')->whereYear('created_at', $year)->whereMonth('created_at', $month)->groupBy('inc_date')->orderBy('inc_date', 'desc')->get();

        return view('owner.pages.report.order.kamsales.kamsales-order-report', compact('franchises', 'first_year', 'last_year', 'getKamSalesOrder', 'year', 'month', 'select_franchise'));

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


        $get_1st_year_date = OrderDeliver::select('inc_date')->first();
        $get_last_year_date = OrderDeliver::select('inc_date')->orderBy('inc_date', 'desc')->first();
        $first_year = date('Y', strtotime($get_1st_year_date->inc_date));
        $last_year = date('Y', strtotime($get_last_year_date->inc_date));

        if($request_franchise_id == 'all'){
            $getKamSalesOrder = OrderDeliver::select('inc_date')->whereYear('created_at', $request_year)->whereMonth('created_at', $request_month)->groupBy('inc_date')->orderBy('inc_date', 'desc')->get();
        }else{
            $getKamSalesOrder = OrderDeliver::select('inc_date')->where('franchise_id', $request_franchise_id)->whereYear('created_at', $request_year)->whereMonth('created_at', $request_month)->groupBy('inc_date')->orderBy('inc_date', 'desc')->get();
        }
    

        return view('owner.pages.report.order.kamsales.kamsales-order-report-view', compact('getKamSalesOrder', 'request_franchise_id', 'request_year', 'request_month', 'franchises', 'first_year', 'last_year'));
     }



}
