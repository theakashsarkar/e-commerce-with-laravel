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
                    <table class="table table-dark">
                        <thead> 
                            <tr class="">
                                <th scope="col">SI NO</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Product Quantity</th>
                                <th scope="col">Publication Status</th>
                                <th scope="col">Publication Status</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody> 
                        @php ($i = 1);
                        @foreach($product as $product)
                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $product->category_name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>
                                   
                                    <img src="{{ asset($product->product_image) }}" alt="" height="100" width="100">
                                </td>
                                <td>{{ $product->product_price }}</td>
                                <td>{{ $product->product_quantity }}</td>
                                <td>{{ $product->publication_status == 1 ? 'public' : 'Unpublic'}}</td>
                                <td>
                                    @if($product->publication_status == 1)
                                        <a href="" class="btn btn-success">public</a>
                                    @else
                                        <a href="" class="btn btn-warning">Unpublic</a>
                                    @endif      
                                </td>
                                <td>
                                    <a href="" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-warning">Delete</a>
                                </td>
                              
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endSection