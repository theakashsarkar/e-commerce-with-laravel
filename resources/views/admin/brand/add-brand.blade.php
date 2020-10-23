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
                    {{ Form::open(['route' => 'new-brand', 'class' => 'form-horizontal', 'mathod' => 'post']) }}
                        <div class="form-group">
                            <label class="control-label col-md-3" for="">Brand Name</label>
                            <div class="col-md-9">
                                <input type="text" name="brand_name" class="form-control">
                                <span class="text-danger">{{ $errors->has("brand_name") ? $errors->first("brand_name") : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="">Brand Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="brand_description" id="" cols="30" rows="10"></textarea>
                                <span class="text-danger">{{ $errors->has("brand_description") ? $errors->first("brand_description") : " " }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="">Publication Status</label>
                            <div class="col-md-9 radio">
                                <label for=""><input type="radio" name="publication_status" checked value="1">published</label>
                                <label for=""><input type="radio" name="publication_status" value="0">Unpublished</label>
                                <span class="text-danger">{{ $errors->has("publication_status") ? $errors->first("publication_status") : " " }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="">Brand Name</label>
                            <div class="col-md-9 col-md-offset-3">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Brnd info">
                            </div>
                        </div>    
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endSection