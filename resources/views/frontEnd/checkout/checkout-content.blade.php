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
                    <div class="col-md-12 well">
                        <h3 class="text-success text-center">You have login to complete you valuable order. if your not registered than please register first.</h3>
                    </div>
                    <div class="col-md-5 well">
                        <h3>Register if you are not Registered before!</h3>
                        <br/>
                            {{ Form::open(['route'=>'registration', 'mathod' =>'POST']) }}
                                <div class="form-group">
                                        <input type="text" name="first_name" class="form-control" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                                </div>

                                <div class="form-group">
                                        <input type="email" name="email_address" class="form-control" placeholder="example@email.com">
                                </div>

                                <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="password">
                                </div>

                                <div class="form-group">
                                        <input type="number" name="phone_number" class="form-control" placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                        <input type="text" name="address" class="form-control" placeholder="Address">
                                </div>
                                    <input type="submit" name="btn" class="btn btn-success btn-block" value="Registration">
                            {{ Form::close() }}
                    </div>
                    <div class="col-md-5 well" style="margin-left:20px;">
                        <h3>Already Registered? Login here!</h3>
                        <br>
                        {{ Form::open() }}
                            <div class="form-group">
                                <input type="email" name="Email" class="form-control" placeholder="example@email.com">
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="password">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Log-in">
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
