@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Products</h4>

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
                        <th>Category</th>
                        <th>Name</th>
                        <th>Selling Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </th>
                <tb>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td><img src="assets/uploads/product/{{ $product->image }}" class="cate-img"></td>
                            <td>
                                <a href="{{ url('edit.product', $product->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('delete.product', $product->id) }}" class="btn btn-danger"
                                   onclick="return confirm('Delete Item?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tb>
            </table>

        </div>
    </div>
@endsection
