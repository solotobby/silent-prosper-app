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

    public function search(Request $request){

        $result = Story::where([
            [function ($query) use ($request) {
                if (($search = $request->q)) {
                    $query->orWhere('title', 'LIKE', '%' . $search . '%')
                        // ->orWhere('email', 'LIKE', '%' . $search . '%')
                        // ->orWhere('phone', 'LIKE', '%' . $search . '%')
                        // ->orWhere('referral_code', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->get();

        return view('search_result', ['result' => $result]);

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
