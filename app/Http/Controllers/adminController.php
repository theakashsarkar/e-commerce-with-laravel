<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use DB;

class adminController extends Controller
{
    //model view controller
    
    public function index(){
    	return view('admin.dashBord.dashBord');
    }
    public function dashBord(){
        return view('admin.dashBord.dashBord');
       
    }
}
