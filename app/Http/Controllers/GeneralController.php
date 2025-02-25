<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function landingPage(){
        $stories = Story::all();
        return view('welcome', ['stories' => $stories]);
    }

    public function details($slug){
        // return $slug;
        $story = Story::where('slug', $slug)->first();
        return view('details', ['story' => $story]);
    }

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
