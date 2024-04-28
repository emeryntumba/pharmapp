<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('administrateur')){
            return view('pages.stock');
        }else{
            return redirect('user/operations');
        }
    }
}
