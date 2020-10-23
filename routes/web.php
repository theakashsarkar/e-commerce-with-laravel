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
Route::get( '/product', [
    'uses' => 'newShopeController@product',
    'as'   => 'product',
] );
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
Route::get( '/home', 'HomeController@index' )->name( 'home' );

