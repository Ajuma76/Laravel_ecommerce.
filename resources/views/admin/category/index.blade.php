@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
        <h4>Categories</h4>

            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">

                    {{session()->get('message')}}

                    <button class="btn btn-close" data-dismiss="alert">
                        X
                    </button>
                </div>
            @endif


        </div>
        <div class="card-body">

            <table class="table table-bordered">
                <th>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </th>
                <tb>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td><img src="assets/uploads/category/{{ $category->image }}" class="cate-img"></td>
                        <td>
                            <a href="{{ url('edit.category', $category->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('delete.category', $category->id) }}" class="btn btn-danger"
                               onclick="return confirm('Delete Item?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tb>
            </table>

        </div>
    </div>
@endsection
