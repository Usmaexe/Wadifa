<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // To Display All Listings
    // We are using the dependencies injection
    public function index(Request $request){
        return view('listings.index',[
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag']))->get()
        ]);
    }

    //To show a single Listing
    public function show(Listing $listing){
        return view('listings.show',[
            'heading' => 'The Job You Are Looking For',
            'listing' => $listing
        ]);
    }
}