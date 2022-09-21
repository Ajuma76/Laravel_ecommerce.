<base href="/public">
@extends('layouts.front')

@section('title', $product->name)

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a  class="text-black" href="{{url('category')}}">
                Collections
            </a>
            /

            <a class="text-black"  href="{{url('category/'.$product->category->slug)}}">
                {{$product->category->name}}
            </a>
            /

            <a class="text-black"  href="{{url('category/'.$product->category->slug.'/'.$product->slug)}}">

            {{$product->name}}
            </a>
        </h6>
    </div>
</div>

<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="assets/uploads/product/{{$product->image}}" class="w-100" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$product->name}}
                        @if($product->trending == '1')
                        <label style="font-size: 16px;" class="float-end badge badge-danger trending_tag">Trending</label>
                        @endif
                    </h2>

                    <hr>

                    <label class="me-3">Original Price : <s>KES {{$product->original_price}}</s></label>
                    <label class="fw-bold">Selling Price : KES {{$product->selling_price}}</label>
                    <p class="mt-3">
                        {!! $product->small_description !!}
                    </p>

                    <hr>
                    @if($product->qty > 0)
                        <label class="badge badge-success">In Stock</label>
                    @else
                        <label class="badge badge-danger">Out of Stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{$product->id}}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width: 130px;">
                                <button class="input-group-text decrement-btn btn">-</button>
                                <input type="text" class="form-control text-center qty-input" name="quantity " value="1" />
                                <button class="input-group-text increment-btn btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <br>
                            @if($product->qty > 0)
                                <button type="button" class="btn btn-info addToCartBtn me-3 float-start">Add To Cart <i class="fa fa-shopping-cart"></i></button>
                            @endif
                            <button type="button" class="btn btn-success addToWishlistBtn me-3 float-start">Add To Wishlist <i class="fa fa-heart"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <h3>Description</h3>
                <p class="mt-3">
                    {!! $product->description !!}
                </p>
            </div>
        </div>
    </div>
</div>

@endsection




























