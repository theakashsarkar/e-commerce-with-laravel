@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Add Brand</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
                    {{ Form::open(['route' => 'update-product', 'class' => 'form-horizontal', 'mathod' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'editProductFrom']) }}
                    <div class="form-group">
                            <label class="control-label col-md-3" for="">Category Name</label>
                            <div class="col-md-9">
                                <select name="category_id" id="" class="form-control">
                                    <option value="">----Select Category Name----</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->has("brand_name") ? $errors->first("brand_name") : ' ' }}</span>
                    </div>
                    <div class="form-group">
                            <label class="control-label col-md-3" for="">Brand Name</label>
                            <div class="col-md-9">
                                <select name="brand_id" id="" class="form-control">
                                    <option value="">----Select Brand Name----</option>
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->has("brand_name") ? $errors->first("brand_name") : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="">Product Name</label>
                            <div class="col-md-9">
                                <input type="text" name="product_name" value="{{ $product ->product_name }}"class="form-control">
                                <input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control">
                                <span class="text-danger">{{ $errors->has("product_name") ? $errors->first("product_name") : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="">Product price</label>
                            <div class="col-md-9">
                                <input type="number" name="product_price" value="{{ $product->product_price }}"class="form-control">
                                <span class="text-danger">{{ $errors->has("product_price") ? $errors->first("product_price") : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="">Product Quantity</label>
                            <div class="col-md-9">
                                <input type="number" name="product_quantity" value="{{ $product->product_quantity}}" class="form-control">
                                <span class="text-danger">{{ $errors->has("product_quantity") ? $errors->first("product_quantity") : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="">short Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="short_description" id="" cols="30" rows="10">{{ $product->short_description}}</textarea>
                                <span class="text-danger">{{ $errors->has("short_description") ? $errors->first("short_description") : " " }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="">Long Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="long_description" name="long_description" id="" cols="30" rows="10">{{ $product->long_description}}</textarea>
                                <script>
                                    CKEDITOR.replace( 'long_description' );
                                  </script>
                                <span class="text-danger">{{ $errors->has("long_description") ? $errors->first("long_description") : " " }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="">Product Image</label>
                            <div class="col-md-9">
                                <input type="file" name="product_image" accept="image/*"/>
                                <br />
                                <img src="{{ asset($product->product_image) }}" alt="" height="80" width="80"/>
                                <span class="text-danger">{{ $errors->has("short_description") ? $errors->first("long_description") : " " }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="">Publication Status</label>
                            <div class="col-md-9 radio">
                                <label for=""><input type="radio" name="publication_status" {{ $product->publication_status == 1 ? 'checked' : ''}} value="1">published</label>
                                <label for=""><input type="radio" name="publication_status" {{ $product->publication_status == 0 ? 'checked' : '' }}}value="0">Unpublished</label>
                                <span class="text-danger">{{ $errors->has("publication_status") ? $errors->first("publication_status") : " " }}</span>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-9 col-md-offset-3">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Update product info">
                            </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        document.forms['editProductFrom'].elements['category_id'].value ='{{ $product->category_id}}';
        document.forms['editProductFrom'].elements['brand_id'].value    ='{{ $product->brand_id }}';
    </script>
@endSection
