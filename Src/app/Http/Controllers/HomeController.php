<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //The Home Page View Controlling
    public function index(){
        return view('home',[
            'Message'=>'Hello! Marhba Bik! We will Help You To Start Your Career',
            'title' => 'Home'
        ]);
    }
}
