<?php

namespace App\Http\Controllers;

use App\brand;
use App\Category;
use App\Product;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /*
     * brand and categories published show the admin panel
     */
    public function index(){
        $brands = brand::where('publication_status',1)->get();
        $categories = Category::where('publication_staus',1)->get();
        return view("admin.product.add-product", ["brands" => $brands, "categories" => $categories]);
    }
    /*
     * Form validate function
     */
    protected function productInfoValidate($request)
    {
        $this->validate($request, [
            'product_name'      => 'required',
            'product_price'     => 'required',
            'product_quantity'  => 'required',
            'long_description'  => 'required',
            'short_description' => 'required'
        ]);
    }
    /*
     *  image upload process function
     */
    protected function productImageUpload($request)
    {
        $productImage = $request->file('product_image');
        $fillType     = $productImage->getClientOriginalExtension();
        // $imageName    = $productImage->getClientOriginalName();
        $imageName    =  $request->product_name.".".$fillType;
        $dirctory     = 'product-images/';
        $imageUrl     = $dirctory.$imageName;
        Image::make($productImage)->save($imageUrl);
        // $productImage->move($dirctory,$imageName);
        return $imageUrl;
    }
    protected function saveProductBasicInfo($request,$imageUrl)
    {
        $product = new Product();
        $product -> category_id        = $request -> category_id;
        $product -> brand_id           = $request -> brand_id;
        $product -> product_name       = $request -> product_name;
        $product -> product_price      = $request -> product_price;
        $product -> product_quantity   = $request -> product_quantity;
        $product -> long_description   = $request -> long_description ;
        $product -> short_description  = $request -> short_description;
        $product -> product_image      = $imageUrl;
        $product -> publication_status = $request -> publication_status ;
        $product -> save();

    }
    /*
     * save product function
     */
    public function saveProduct(Request $request){
        $this->productInfoValidate($request);
        $imageUrl = $this->productImageUpload($request);
        $this->saveProductBasicInfo($request,$imageUrl);
        return redirect('/product/add')->with('message','product add successfull');
    }
    /*
     * manage product function
     */
    public function mangeProduct()
    {
       $product = DB::table('products')
                        ->join('categories', 'products.category_id', '=' , 'categories.id')
                        ->join('brands', 'products.brand_id', '=' , 'brands.id')
                        ->select('products.*', 'categories.category_name', 'brands.name')
                        ->get();
        return view('admin.product.manage-product',['product' => $product ]);
    }
    public function editProduct($id)
    {
        $product    = Product::find($id);
        $brands = brand::where('publication_status',1)->get();
        $categories = Category::where('publication_staus',1)->get();
        return view('admin.product.edit-product',['product' => $product, 'brands' => $brands, 'categories' => $categories]);
    }
    public function productBasicInfoUpdate( $product, $request, $imageUrl = null){
        $product -> category_id       = $request -> category_id;
        $product -> brand_id          = $request -> brand_id;
        $product -> product_name      = $request -> product_name;
        $product -> product_price     = $request -> product_price;
        $product -> product_quantity  = $request -> product_quantity;
        $product -> long_description  = $request -> long_description;
        if($imageUrl){
            $product -> product_image = $imageUrl;
        }
        $product -> publication_status= $request -> publication_status;
        $product -> save();
    }
    /*
     * product information update function
     */
    public function updateProduct(Request $request){
        $productImage = $request->file('product_image');
        $product = Product::find( $request -> product_id );
        if( $productImage ) {
            unlink( $product -> product_image );
            $imageUrl = $this->productImageUpload($request);
            $this->productBasicInfoUpdate( $product, $request, $imageUrl);
        }
        else {
            $this->productBasicInfoUpdate( $product, $request);
        }
        return redirect('manage/product')->with('message','product info update');
    }
}
