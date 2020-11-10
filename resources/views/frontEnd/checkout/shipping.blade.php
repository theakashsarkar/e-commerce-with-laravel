@extends('frontEnd.master')
@section('body')
    <div class="banner1">
        <div class="container">
            <h3><a href="{{ route('/') }}">Home</a>/ <span> Add To Cart</span></h3>
        </div>
    </div>
    <div class="content">
        <div class="single-wl3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 well text-center text-success">
                       Dear {{ Session::get('customerName') }}. You have to give as product shipping info to complete valuable order. If you billing info & shipping info are same then just press on save shipping info button.
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <br />
                        <h3>Shipping info</h3>
                        <br/>
                        {{ Form::open(['route' => 'new-shipping', 'method' => 'POST']) }}
                        <div class="form-group">
                            <input type="text" value="{{ $customer->first_name.' '.$customer->last_name }}" name="full_name" class="form-control" placeholder="First Name">
                        </div>

                        <div class="form-group">
                            <input type="email" value="{{ $customer->email_address }}" name="email_address" class="form-control" placeholder="example@email.com">
                        </div>

                        <div class="form-group">
                            <input type="number" value="{{ $customer->phone_number }}" name="phone_number" class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" name="address" placeholder="Address">{{ $customer->address }}</textarea>
                        </div>
                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Shipping info">
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
