@extends('layouts.front')

@section('title')
    E-SHOP
@endsection

@section('content')
    @include('layouts.inc.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2 class="text-center">Featured Products</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($featured_products as $product)
                        <div class="item">
                            <a href="{{url('category/'. $product->category->slug. '/'. $product->slug)}}">
                                <div class="card">
                                    <img height="235px" width="214px" src="assets/uploads/product/{{$product->image}}" alt="product name">
                                    <div class="card-body">
                                        <h4>{{$product->name}}</h4>
                                        <span class="float-start">{{$product->selling_price}}</span>
                                        <span class="float-end"><s>{{$product->original_price}}</s></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach()
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2 class="text-center">Trending Category</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($trending_category as $trending)
                        <div class="item">
                            <a href="{{url('category', $trending->slug)}}">
                                <div class="card">
                                    <img height="235px" width="214px" src="assets/uploads/category/{{$trending->image}}" alt="product name">
                                    <div class="card-body">
                                        <h4>{{$trending->name}}</h4>
                                        <p>
                                            {{$trending->description}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach()
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots: false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
@endsection


