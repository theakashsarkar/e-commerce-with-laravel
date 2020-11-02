@extends('frontEnd.master')
@section('body')
    <div class="banner1">
        <div class="container">
            <h3><a href="{{ route('/') }}">Home</a>/ <span>Add To Cart</span></h3>
        </div>
    </div>
        <div class="content">
            <div class="single-wl3">
                <div class="container">
                    <div class="row">
                        <h3 class="text-center text-success">My Shopping Cart</h3>
                        <hr/>
                            <table class="table table-bordered">
                                <tr class="bg-primary">
                                    <th>SL NO</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total price</th>
                                    <th>Action</th>
                                </tr>
                                @php($i = 1)
                                @php($sum = 0)
                                @foreach($cartProducts as $cartProduct)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $cartProduct->name }}</td>
                                    <td><img src="{{ asset($cartProduct->image) }}" alt=""></img></td>
                                    <td>TK. {{ $cartProduct->price }}</td>
                                    <td>
                                        {{ Form::open(['route'=>'update-cart','method'=>'post']) }}
                                            <input type="number" name="qty" value="{{ $cartProduct->quantity }}" min="1"/>
                                            <input type="hidden" name="rowId" value="{{ $cartProduct->id }}"/>
                                            <input type="submit" name="btn" vlaue="update"/>
                                        {{ Form::close() }}
                                    </td>
                                    <td>TK. {{ $total = $cartProduct->price * $cartProduct->quantity }}</td>
                                    <td>
                                        <a href="{{ route('delete-card-item', ['rowId' => $cartProduct->id]) }}" class="btn btn-danger btn-xs" title="Delete">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                                <?php  $sum = $sum + $total;?>
                                @endforeach
                            </table>
                        <hr />
                        <table class="table table-bordered">
                            <tr>
                                <th>Item Total (Tk. )</th>
                                <td>{{ $sum }}</td>
                            </tr>
                            <tr>
                                <th>Vat Total (TK. )</th>
                                <td>{{ $vat = 0 }}</td>
                            </tr>
                            <tr>
                                <th>Grand Total</th>
                                <th>{{ $sum + $vat }}</th>
                            </tr>
                        </table>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-11 col-md-offset-1">
                                <a href="route('checkout')" class="btn btn-success">Checkout</a>
                                <a href="" class="btn btn-success pull-right">Continue shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
