<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // To Display All Listings
    // We are using the dependencies injection
    public function index(Request $request){
        return view('listings.index',[
            'title' => 'Jobs Available',
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }

    //To show a single Listing
    public function show(Listing $listing){
        return view('listings.show',[
            'heading' => 'The Job You Are Looking For',
            'listing' => $listing
        ]);
    }

    //To Create Listing Form
    public function create(){
        
        return view('listings.create',[
            'title' => 'Create'    
        ]);
    }

    //To Store Listing Data
    //request here is a dependencie injection
    public function store(Request $request){
        // The request variable is an array contain all the data that are sent by a page to the app
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required',Rule::unique('listings','company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required' , 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        
        Listing::create($formFields);

        return redirect('/listings')->with('message','Listing created successfully!');
    }
}
