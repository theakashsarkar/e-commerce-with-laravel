@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manage Category</h4>
                </div>
                <div class="panel-body">
                <h3 class="text-center text-success id=">{{ Session::get('message')}}</h3>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">SL NO</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Description</th>
                                <th scope="col">Publication Status</th>
                                <th scope="col">publication status</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 0);
                        @foreach($categories as $category)
                          <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $category->category_name}}</td>
                            <td>{{ $category->category_description}}</td>
                            <td>{{ $category->publication_staus == 1 ? 'published' : 'Unpublished' }}</td>
                            <td>
                                @if($category->publication_staus == 1)
                                    <a href="{{ route('unpublished-category', ['id' => $category->id]) }}" class="btn btn-success">public</a>
                                @else
                                    <a href="{{ route('published-category', ['id' => $category->id]) }}" class="btn btn-warning">Unpublic</a>
                                @endif    
                            </td>
                            <td>
                                <a href="{{ route('edit-category', ['id' => $category->id]) }}" class="btn btn-primary">EDIT</a>
                            </td>
                            <td>
                                <a href="{{ route('delete-category', ['id' => $category->id]) }}" class="btn btn-danger">DELETE</a>
                            </td>   
                           
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endSection