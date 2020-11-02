<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\brand;
use Illuminate\Http\Request;

class newShopeController extends Controller
{
    //function
    public function index(){
        
        $newProduct = Product::where('publication_status',1)->orderBy('id','DESC')->take(8)->get();
        return view('frontEnd.Home.home',['newProduct' => $newProduct]);
    }
    public function product($id){
        $categoryProduct = Product::where('category_id',$id)
                           ->where('publication_status',1)
                           ->get();
        return view('frontEnd.Category.category',['categoryProduct' => $categoryProduct]);
    }
    public function productDetails($id)
    {
        $Product = Product::find($id);
        return view('frontEnd.product.product-details',['product' => $Product]);
    }
}
