@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>All Categories</h4>
                    <div class="row">
                        @foreach($categories as $category)
                            <div class="col-md-3 mb-3">
                                <a href="{{url('category', $category->slug)}}">
                                    <div class="card">
                                        <img height="235px" width="214px" src="assets/uploads/category/{{$category->image}}" alt="category name">
                                        <div class="card-body">
                                            <h4>{{$category->name}}</h4>
                                            <p>
                                                {{$category->description}}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
