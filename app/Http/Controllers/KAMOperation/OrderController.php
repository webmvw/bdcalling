<?php

namespace App\Http\Controllers\KAMOperation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDeliver;

class OrderController extends Controller
{
     public function view(){
        $allData = OrderDeliver::where('order_status', 'NRA')->orderBy('id', 'desc')->with('responsible_info', 'account')->get();
        return view('kamoperation.pages.order.view-order', compact('allData'));
    }
}
