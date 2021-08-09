<?php

namespace App\Http\Controllers\FranchiseOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FranchiseOwnerController extends Controller
{
    public function index(){
        return view('franchiseowner.index');
    }
}
