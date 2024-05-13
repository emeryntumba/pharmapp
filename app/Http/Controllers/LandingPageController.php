<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function index(){
        if (Auth::check()){
            return redirect('/home');
        }
        return view('landing_page.index');
    }
}
