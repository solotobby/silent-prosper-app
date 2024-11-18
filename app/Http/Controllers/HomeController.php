<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        return redirect('user/home');
        // return view('dashboard');
    }
}
