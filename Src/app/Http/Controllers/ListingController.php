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
            //here instead of writing get we did paginate to have pages and we have 4 elements per page
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(4)
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

        // dd($request->file('logo')->store());//if we did this the file is saved in the app folder

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
        
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('CompanyLogos','public');
        }

        $formFields['user_id'] = auth()->id();
        Listing::create($formFields);

        // flash messages package
        flash()->success('Your Job Listing Has Been Created!');

        return redirect('/listings');
    }

    // Edit
    public function edit(Listing $listing){
        return view('listings.edit',[
            'listing'=>$listing,
            'title' => 'Edit' 
        ]);
    }

    //Store The Updated Information
    public function update(Request $request,Listing $listing){

        // The request variable is an array contain all the data that are sent by a page to the app
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required' , 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('CompanyLogos','public');
        }

        $formFields['user_id'] = auth()->id();

        $listing->update($formFields);

        // flash messages package
        flash()->updated('Your Job Listing Has Been Updated!');

        return back();
    }

    //Delete Listing
    public function destroy(Listing $listing){
        $listing->delete();
        flash()->deleted('The Job Listing Has Been Deleted Succefully!');
        return redirect('/listings');
    }

    //Managing The Listing of each user
    public function manage(){
        return view('listings.manage',['listings' => auth()->user()->listings]);
    }
}
