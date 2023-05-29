<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use App\Models\User;
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

Route::get('/', [HomeController::class,'index']);

Route::get('/listings',[ListingController::class,'index']);

//Show The Create Form 
//TO MAKE THE USER CONTROLL ONLY HIS LISTING WE USE THE AUTH MIDDLEWARE
Route::get('/listings/create',[ListingController::class,'create'])->middleware('auth');

//Store Listing Data
Route::post('/listings',[ListingController::class,'store'])->middleware('auth');

//Managing Listings
Route::get('/listings/manage' , [ListingController::class,'manage'])->middleware('auth');

//Editing a Single Listing
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');

//Update a single Listing
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');

//Delete a single Listing
Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');

// Listing is an elloquent model 
// Binding listing here allow us to access it's id directly  
Route::get('/listings/{listing}',[ListingController::class,'show']);


//Show Register Form
Route::get('/register',[UserController::class,'register'])->middleware('guest');
//Only if You are a Guest user you can access the files


//Show Login Form
Route::get('/login',[UserController::class,'login'])->name('login');
//login it's the view that is been redirect to by the authenticate middleware


//Save Login Form's Data
Route::post('/users/authenticate',[UserController::class,'authenticate']);

//Create A New User
Route::post('/users',[UserController::class,'store']);

//Log User Out
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');



// Common Resource Routes:
    // index - Show All
    // show - Show Single
    // create - Show Form To Create New Single
    // store - Store New Single
    // edit - Store Form To Edit Single
    // update - Updated Single
    // destroy - Delete Listing


// Testing
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