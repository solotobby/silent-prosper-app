<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function about(){
        return view('about');
    }

    public function privacy(){
        return view('privacy-policies');
    }

    public function terms(){
        return view('terms-conditions');
    }
}
