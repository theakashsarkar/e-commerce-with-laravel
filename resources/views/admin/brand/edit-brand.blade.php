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
                        <form action="{{ route('update-brand') }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                    <label for="" class="control-label col-md-4">Brand Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="brand_name" id="" value="{{ $brand->name }}" class="form-control"/>
                                        <input type="hidden" name="brand_id" id="" value="{{ $brand->id }}" class="form-control"/>    
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="" class="control-label col-md-4">Brand Description</label>
                                    <div class="col-md-8">
                                        <textarea name="brand_description" id="" cols="30" rows="10" class="form-control">{{$brand->brand_description}}</textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="" class="control-label col-md-4">Publication Status</label>
                                    <div class="col-md-8 radio">
                                       <label for=""><input type="radio" checked name="name"{{ $brand->publication_status == 1 ? 'checked' : ''}} value="1">published</label>
                                       <label for=""><input type="radio"  name="name" {{ $brand->publication_status == 0 ? 'checked' : '' }}  value="0">unpubished</label>
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Brand Info"/>
                                </div>

                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

@endSection