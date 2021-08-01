<?php

namespace App\Http\Controllers\KAMSales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KAMSalesController extends Controller
{
    public function index(){
    	return view('kamsales.index');
    }
}
