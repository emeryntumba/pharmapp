<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(){

        return view('pages.user-profile');
    }

    public function operation(){
        return view('pages.user-operation');
    }
}
