<?php

namespace App\Http\Controllers\KAMOperation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KAMOperationController extends Controller
{
    public function index(){
    	return view('kamoperation.index');
    }
}
