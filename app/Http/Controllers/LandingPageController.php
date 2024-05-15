<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function index(){
        if (Auth::check()){
            return redirect('/dashboard');
        }
        return view('landing_page.index');
    }
}
