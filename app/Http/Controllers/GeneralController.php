<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function landingPage(){
        $stories = Story::where('is_published', true)->orderBy('created_at', 'DESC')->get();
        return view('welcome', ['stories' => $stories]);
    }

    public function details($slug){
        // return $slug;
        $story = Story::where('slug', $slug)->first();
        return view('details', ['story' => $story]);
    }

    public function search(Request $request){

  

        $search = $request->input('query');

        $query = Story::where('is_published', true);

        if (!empty($search)) {
            $query->where('title', 'LIKE', "%{$search}%");
        }

        $result = $query->limit(50)->get(); // Adding limit for performance


        // $result = Story::where('is_published', true)->where([
        //     [function ($query) use ($request) {
        //         if (($search = $request->query)) {
                   
        //             $query->orWhere('title', 'LIKE', '%' . $search . '%')
        //                 // ->orWhere('email', 'LIKE', '%' . $search . '%')
        //                 // ->orWhere('phone', 'LIKE', '%' . $search . '%')
        //                 // ->orWhere('referral_code', 'LIKE', '%' . $search . '%')
        //                 ->get();
        //         }
        //     }]
        // ])->get();

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
