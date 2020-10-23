<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newShopeController extends Controller
{
    //function
    public function index(){
        return view('frontEnd.Home.home');
    }
    public function product(){
        return view('frontEnd.Category.category');
    }
    public function product1(){
        return view('frontEnd.Category.category1');
    }
    public function mail(){
        return view('frontEnd.Mail.mail');
    }
}
