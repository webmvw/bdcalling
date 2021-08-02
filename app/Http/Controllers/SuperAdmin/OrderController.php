<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $allOrder = Order::orderBy('id', 'desc')->get();
        return view('superadmin.pages.order.view-order', compact('allOrder'));
    }
}
