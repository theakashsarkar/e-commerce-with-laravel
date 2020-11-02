@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Brand Category</h4>
                </div>
                <div class="panel-body">
                <h3 class="text-center text-success id=">{{ Session::get('message')}}</h3>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">SL NO</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Brand Description</th>
                            <th scope="col">Publication Status</th>
                            <th scope="col">publication status</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 0);
                        @foreach($brands as $brand)
                          <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $brand->name}}</td>
                            <td>{{ $brand->brand_description}}</td>
                            <td>{{ $brand->publication_status == 1 ? 'published' : 'Unpublished' }}</td>
                            <td>
                                @if($brand->publication_status == 1)
                                    <a href="{{ route('unpublished-brand', ['id' => $brand->id]) }}" class="btn btn-success">public</a>
                                @else
                                    <a href="{{ route('published-brand', ['id' => $brand->id]) }}" class="btn btn-warning">Unpublic</a>
                                @endif    
                            </td>
                            <td>
                                <a href="{{ route('edit-brand', ['id' => $brand->id]) }}" class="btn btn-primary">EDIT</a>
                            </td>
                            <td>
                                <a href="{{ route('delete-brand', ['id' => $brand->id]) }}" class="btn btn-danger">DELETE</a>
                           
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endSection