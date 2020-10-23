<?php

namespace App\Http\Controllers;

use App\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function addBrand(){
        return view('admin.brand.add-brand');
    }
    public function saveBrandInfo(Request $request){
        $this->validate($request,[
            "brand_name"         => "required|regex:/^[\pL\s\-]+$/u|max:15|min:5",
            "brand_description"  => "required",
            "publication_status" => "required",
        ]);
        $brand = new brand();
        $brand->name               = $request->brand_name;
        $brand->brand_description  = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();
        return redirect('manageBrand')->with('message',"brand info save");
    }
    public function manageBrandinfo(){
        $brands = brand::all();
        return view('admin.brand.manage-brand',['brands' => $brands]);
    }
    public function unpublishedBrandInfo($id){
        $brand = brand::find($id);
        $brand->publication_status = 0;
        $brand->save();
        return redirect('manageBrand')->with('message',"brand published info successfully");

    }
    public function publicBrandInfo($id){
        $brand = brand::find($id);
        $brand->publication_status = 1;
        $brand->save();
        return redirect('manageBrand')->with('message',"brand Unpublished info successfully");
    }
    public function editBrandInfo($id){
        $brand = brand::find($id);
        return view('admin.brand.edit-brand',['brand' => $brand]);
    }
    public function updateBrandInfo(Request $request){
        $brand = brand::find($request->brand_id);
        $brand->name               = $request->brand_name;
        $brand->brand_description  = $request->brand_description;
        $brand->publication_status = $request->name;
        $brand->save();
        return redirect('manageBrand')->with('message','brand info save'); 
    }
    public function deleteBrandInfo($id){
        $brand = brand::find($id);
        $brand->delete();
        return redirect('manageBrand')->with('message','brand info delete'); 
    }

}
