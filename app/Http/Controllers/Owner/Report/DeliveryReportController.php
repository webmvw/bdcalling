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
     * all delivery report
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
     * Franchise wise all delivery report
     */
    public function franchiseWiseDeliveryReport(){
        $franchises = Franchise::all();

        $get_1st_year_date = OrderDeliver::select('inc_date')->first();
        $get_last_year_date = OrderDeliver::select('inc_date')->orderBy('inc_date', 'desc')->first();
        $first_year = date('Y', strtotime($get_1st_year_date->inc_date));
        $last_year = date('Y', strtotime($get_last_year_date->inc_date));

        $year = date('Y');
        $month = date('m');
        $select_franchise = 'all';

        $getReport = OrderDeliver::select('deli_date')->whereYear('deli_date', $year)->whereMonth('deli_date', $month)->where('order_status', 'Delivered')->groupBy('deli_date')->orderBy('deli_date', 'desc')->get();

        return view('owner.pages.report.delivery.franchisewise.franchisewise-delivery-report', compact('franchises', 'first_year', 'last_year', 'year', 'month', 'select_franchise', 'getReport'));
    }

    public function franchiseWiseDeliveryReportRequest(Request $request){

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
            $getReport = OrderDeliver::select('deli_date')->whereYear('deli_date', $year)->whereMonth('deli_date', $month)->where('order_status', 'Delivered')->groupBy('deli_date')->orderBy('deli_date', 'desc')->get();
        }else{
            $getReport = OrderDeliver::select('deli_date')->where('franchise_id', $franchise_id)->whereYear('deli_date', $year)->whereMonth('deli_date', $month)->where('order_status', 'Delivered')->groupBy('deli_date')->orderBy('deli_date', 'desc')->get();
        }
        return view('owner.pages.report.delivery.franchisewise.franchisewise-delivery-report-view', compact('getReport', 'franchise_id', 'first_year', 'last_year', 'franchises', 'year', 'month'));
    }





    /**
     * department wise all delivery report
     */
    public function departmentwiseDeliveryReport(){
        $franchises = Franchise::all();

        $get_1st_year_date = OrderDeliver::select('inc_date')->first();
        $get_last_year_date = OrderDeliver::select('inc_date')->orderBy('inc_date', 'desc')->first();
        $first_year = date('Y', strtotime($get_1st_year_date->inc_date));
        $last_year = date('Y', strtotime($get_last_year_date->inc_date));

        $year = date('Y');
        $month = date('m');
        $select_franchise = 'all';

        $getReport = OrderDeliver::select('deli_date')->whereYear('deli_date', $year)->whereMonth('deli_date', $month)->groupBy('deli_date')->orderBy('deli_date', 'desc')->get();
        return view('owner.pages.report.delivery.departmentwise.departmentwise-delivery-report', compact('franchises', 'first_year', 'last_year', 'year', 'month', 'select_franchise', 'getReport'));
    }


    public function departmentwiseDeliveryReportRequest(Request $request){

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
            $getReport = OrderDeliver::select('deli_date')->whereYear('deli_date', $year)->whereMonth('deli_date', $month)->groupBy('deli_date')->orderBy('deli_date', 'desc')->get();
        }else{
            $getReport = OrderDeliver::select('deli_date')->where('franchise_id', $franchise_id)->whereYear('deli_date', $year)->whereMonth('deli_date', $month)->groupBy('deli_date')->orderBy('deli_date', 'desc')->get();
        }
        return view('owner.pages.report.delivery.departmentwise.departmentwise-delivery-report-view', compact('getReport', 'franchise_id', 'first_year', 'last_year', 'franchises', 'year', 'month'));
    }



     /**
     * account wise all Delivery report
     */
    public function accountwiseDeliveryReport(){

        $franchises = Franchise::all();

        $get_1st_year_date = OrderDeliver::select('inc_date')->first();
        $get_last_year_date = OrderDeliver::select('inc_date')->orderBy('inc_date', 'desc')->first();
        $first_year = date('Y', strtotime($get_1st_year_date->inc_date));
        $last_year = date('Y', strtotime($get_last_year_date->inc_date));

        $year = date('Y');
        $month = date('m');
        $select_franchise = 'all';

        $getReport = OrderDeliver::select('deli_date')->whereYear('deli_date', $year)->whereMonth('deli_date', $month)->groupBy('deli_date')->orderBy('deli_date', 'desc')->get();
        return view('owner.pages.report.delivery.accountwise.accountwise-delivery-report', compact('franchises', 'first_year', 'last_year', 'year', 'month', 'select_franchise', 'getReport'));
    }

    public function accountwiseDeliveryReportRequest(Request $request){

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
            $getReport = OrderDeliver::select('deli_date')->whereYear('deli_date', $year)->whereMonth('deli_date', $month)->groupBy('deli_date')->orderBy('deli_date', 'desc')->get();
        }else{
            $getReport = OrderDeliver::select('deli_date')->where('franchise_id', $franchise_id)->whereYear('deli_date', $year)->whereMonth('deli_date', $month)->groupBy('deli_date')->orderBy('deli_date', 'desc')->get();
        }
        return view('owner.pages.report.delivery.accountwise.accountwise-delivery-report-view', compact('getReport', 'franchise_id', 'first_year', 'last_year', 'franchises', 'year', 'month'));
    }




    /**
     *  kam Operation delivery report
     */
     
     public function kamOperationDeliveryReport(){

        $franchises = Franchise::all();

        $get_1st_year_date = OrderDeliver::select('inc_date')->first();
        $get_last_year_date = OrderDeliver::select('inc_date')->orderBy('inc_date', 'desc')->first();
        $first_year = date('Y', strtotime($get_1st_year_date->inc_date));
        $last_year = date('Y', strtotime($get_last_year_date->inc_date));

        $year = date('Y');
        $month = date('m');
        $select_franchise = 'all';

        $getKamOperationDelivery = OrderDeliver::select('deli_date')->whereYear('deli_date', $year)->whereMonth('deli_date', $month)->where('order_status', 'Delivered')->groupBy('deli_date')->orderBy('deli_date', 'desc')->get();

        return view('owner.pages.report.delivery.kamoperation.kamoperation-delivery-report', compact('franchises', 'first_year', 'last_year', 'getKamOperationDelivery', 'year', 'month', 'select_franchise'));
     }


     public function kamOperationDeliveryReportRequest(Request $request){
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
            $getKamOperationDelivery = OrderDeliver::select('deli_date')->whereYear('deli_date', $request_year)->whereMonth('deli_date', $request_month)->where('order_status', 'Delivered')->groupBy('deli_date')->orderBy('deli_date', 'desc')->get();
        }else{
            $getKamOperationDelivery = OrderDeliver::select('deli_date')->where('franchise_id', $request_franchise_id)->whereYear('deli_date', $request_year)->whereMonth('deli_date', $request_month)->where('order_status', 'Delivered')->groupBy('deli_date')->orderBy('deli_date', 'desc')->get();
        }
    

        return view('owner.pages.report.delivery.kamoperation.kamoperation-delivery-report-view', compact('getKamOperationDelivery', 'request_franchise_id', 'request_year', 'request_month', 'franchises', 'first_year', 'last_year'));
     }




}
