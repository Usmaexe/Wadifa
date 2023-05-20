<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// ::get("the end path","closure which is a function") 
//All listings
Route::get('/', function () {
    return view('listings',[
        'heading' => 'Latest Listings',
        'listings' => Listing::all()
    ]);
});

//Single Listing
Route::get('/listings/{id}',function($id){
    return view('listing',[
        'heading' => 'The Job You Are Looking For',
        'listing' => Listing::find($id)
    ]);
});



// -----------------------------------Testing
// Route::get('/hello',function(){
//     //Response render the HTML and we can add status to it (202)
//     //By default the type of rendring is TEXT/HTML
//     return response('<h1>Hello world</h1>',200)
//     ->header('Content-Type','text/plain');
// });

// Route::get('/posts/{id}',function($id){
//     // dd($id); //die and dump debug 
//     return response('<h1>Post'.$id.'</h1>');
// })->where('id' , '[0-9]+');

// Route::get('/search',function(Request $request){
//     // dd($request->name . ' ' . $request->password );
//     return response("<h1>".$request->name . ' ' . $request->password."</h1>");
// });