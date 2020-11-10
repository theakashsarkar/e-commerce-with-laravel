<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get( '/', [
    'uses' => 'newShopeController@index',
    'as'   => '/',
] );
Route::get( '/category-product/{id}', [
    'uses' => 'newShopeController@product',
    'as'   => 'category-product',
] );
Route::get('/product-details/{id}/{name}',[
    'uses' => 'newShopeController@productDetails',
    'as'   => 'product-details'
]);
Route::get( '/product1', [
    'uses' => 'newShopeController@product1',
    'as'   => 'product1',
] );
Route::get( '/mail', [
    'uses' => 'newShopeController@mail',
    'as'   => 'mail',
] );
Route::get('/addCategory',[
    'uses' => 'categoryController@addCategory',
    'as'   => 'add-category',
]);
Route::get('/dashBord',[
    'uses' => 'adminController@dashBord',
    'as'   => 'dashBord',
]);
Route::post('/category/save',[
    'uses' => 'categoryController@saveCategory',
    'as'   => 'new-category',
]);
Route::get('/category/manage', [
    'uses' => 'categoryController@manageCategory',
    'as'   => 'manage-category'
]);
Auth::routes();
Route::post('/index',[
    'uses' => 'adminController@index',
    'as'   => 'index',
]);
Route::get('category/unpublished/{id}', [
    'uses' => 'categoryController@unpublishedCategoryInfo',
    'as'   => 'unpublished-category',
]);
Route::get('category/published/{id}',[
    'uses' => 'categoryController@publishedCategoryInfo',
    'as'   => 'published-category',
]);
Route::get('category/edit/{id}',[
    'uses' => 'categoryController@editCategoryInfo',
    'as'   => 'edit-category',
]);
Route::get('category/delete/{id}',[
    'uses' => 'categoryController@deleteCategoryInfo',
    'as'   => 'delete-category',
]);
Route::post('category/update',[
    'uses' => 'categoryController@updateCategoryInfo',
    'as'   => 'update-category'
]);
Route::get('addBrand',[
    'uses' => "BrandController@addBrand",
    'as'   => "add-brand",
]);
Route::get('manageBrand',[
    "uses" => "BrandController@manageBrandInfo",
    'as'   => "manage-brand",
]);
Route::post('brand/category/save',[
    'uses' => 'BrandController@saveBrandInfo',
    'as'   => 'new-brand',
]);
Route::get('brand/published/{id}',[
    'uses' => "BrandController@publicBrandInfo",
    'as'   => "published-brand"
]);
Route::get('brand/Unpublished/{id}',[
    'uses' => "BrandController@unpublishedBrandInfo",
    'as'   => 'unpublished-brand'
]);
Route::get('brand/edit/{id}',[
    'uses' => "BrandController@editBrandInfo",
    'as'   => "edit-brand"
]);
Route::get('brand/delete/{id}',[
    'uses' => "BrandController@deleteBrandInfo",
    'as'   => "delete-brand"
]);
Route::post('brand/update',[
    'uses' => "BrandController@updateBrandInfo",
    'as'   => "update-brand",
]);
Route::get("product/add",[
    'uses' => "ProductController@index",
    'as'   => "add-product"
]);
Route::get('manage/product',[
    'uses' => "ProductController@mangeProduct",
    'as'   => "manage-product"
]);
Route::post('new/product',[
    'uses' => "ProductController@saveProduct",
    'as'   => "new-product"
]);
Route::get('edit/prodcut/{id}',[
    'uses' => 'ProductController@editProduct',
    'as'   => 'edit-product'
]);
Route::get('delete/product',[
    'uses' => 'ProductController@deleteProduct',
    'as'   => 'delete-product'
]);
Route::post('update/product',[
    'uses' => 'ProductController@updateProduct',
    'as'   => 'update-product'
]);
Route::post('/add/Cart',[
    'uses' => 'CartController@addToCart',
    'as'   => 'add-to-cart',
]);
Route::get('cart/show',[
   'uses' => 'CartController@showCart',
    'as'  => 'show-cart'
]);
Route::get('cart/delete/{id}',[
    'uses' => 'CartController@deleteCard',
    'as'   => 'delete-card-item'
]);
Route::post('cart/update',[
    'uses' => 'CartController@updateCart',
    'as'   => 'update-cart'
]);
Route::get('cart/checkout',[
    'uses' => 'ChekoutController@index',
    'as'   => 'checkout'
]);
Route::post('customer/registration',[
    'uses' => 'ChekoutController@customerSingUp',
    'as'   => 'registration'
]);
Route::get('/checkout/shipping',[
   'uses' => 'ChekoutController@shippingFrom',
    'as'  => 'checkout-shipping'
]);
Route::post('/shipping/save',[
    'uses' => 'ChekoutController@saveShippingInfo',
    'as'   => 'new-shipping'
]);
Route::get('/checkout/payment',[
   'uses' => 'ChekoutController@paymentForm',
    'as'  => 'checkout-payment'
]);
Route::post('checkout/order',[
    'uses' => 'ChekoutController@newOrder',
    'as'   => 'new-order'
]);
Route::get('/complete/order',[
    'uses' => 'ChekoutController@completeOrder',
    'as'   => 'complete-order'
]);
Route::get( '/home', 'HomeController@index' )->name( 'home' );

