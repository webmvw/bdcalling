<?php

namespace App\Http\Controllers\KAMSales;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class KAMSalesController extends Controller
{
    public function index(){
    	return view('kamsales.index');
    }


}
