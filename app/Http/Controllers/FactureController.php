<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function index(){
        return view('pages.factures');
    }
}
