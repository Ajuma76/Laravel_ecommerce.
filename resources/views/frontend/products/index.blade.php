<base href="/public">
@extends('layouts.front')

@section('title')
{{$category->name}}
@endsection

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0 text-black">

                <a  class="text-black" href="{{url('category')}}">
                    Collections
                </a>

                /
                {{$category->name}}


            </h6>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{$category->name}}</h2>
                    @foreach($product as $products)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <a href="{{url('category/'. $category->slug. '/'. $products->slug)}}">
                                    <img height="235px" width="214px" src="assets/uploads/product/{{$products->image}}" alt="product name">
                                    <div class="card-body">
                                        <h4>{{$products->name}}</h4>
                                        <span class="float-start">{{$products->selling_price}}</span>
                                        <span class="float-end"><s>{{$products->original_price}}</s></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach()
            </div>
        </div>
    </div>

@endsection


