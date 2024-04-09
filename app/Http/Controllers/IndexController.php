<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index(){
        $devise = Auth::user()->gestionnaire->etablissement->devise;
        Session::put('devise', $devise);
        return view('index');
    }
}
