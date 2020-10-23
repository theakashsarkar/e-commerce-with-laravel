<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;

class categoryController extends Controller
{
    //
    public function addCategory(){
        return view('admin.category.add-category');
    }
    public function saveCategory(Request $request){
    
       $category = new Category();
       $category->category_name        = $request->category_name;
       $category->category_description = $request->category_description;
       $category->publication_staus    = $request->name;
       $category->save();
       
       return redirect('addCategory')->with('message',"category info save successfull");
    }
    public function manageCategory(){
        $categories = Category::all();
        return view('admin.category.manage-category',['categories' =>$categories]);
    }
    public function unpublishedCategoryInfo($id){
        $category = Category::find($id);
        $category->publication_staus = 0;
        $category->save();
        return redirect('category/manage')->with('message',"category unpublished");
    }
    public function publishedCategoryInfo($id){
        $category = Category::find($id);
        $category->publication_staus = 1;
        $category->save();
        return redirect('category/manage')->with('message',"category info published");
    }
    public function editCategoryInfo($id){
        $category = Category::find($id);
        return view('admin.category.edit-category', ['category'=> $category]);
    }
    public function updateCategoryInfo(Request $request){
        $category = Category::find($request->category_id);
        $category->category_name = $request->category_name; 
        $category->category_description = $request->category_description;
        $category->publication_staus = $request->name;
        $category->save();
        return redirect('category/manage')->with('message',"category info update"); 
    }
    public function deleteCategoryInfo($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('category/manage')->with('message',"category info delete"); 
    }
}
