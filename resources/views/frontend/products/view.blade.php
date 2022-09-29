<base href="/public">
@extends('layouts.front')

@section('title', $product->name)

@section('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('ratings')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate {{$product->name}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                @if($user_rating)
                                    @for($i = 1; $i <= $user_rating->ratings; $i++)
                                        <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                        <label for="rating{{ $i }}" class="fa fa-star"></label>
                                    @endfor
                                    @for($j =$user_rating->ratings+1; $j <=5; $j++)
                                            <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                            <label for="rating{{ $j }}" class="fa fa-star"></label>
                                    @endfor

                                @else
                                        <input type="radio" value="1" name="product_rating" checked id="rating1">
                                        <label for="rating1" class="fa fa-star"></label>
                                        <input type="radio" value="2" name="product_rating" id="rating2">
                                        <label for="rating2" class="fa fa-star"></label>
                                        <input type="radio" value="3" name="product_rating" id="rating3">
                                        <label for="rating3" class="fa fa-star"></label>
                                        <input type="radio" value="4" name="product_rating" id="rating4">
                                        <label for="rating4" class="fa fa-star"></label>
                                        <input type="radio" value="5" name="product_rating" id="rating5">
                                        <label for="rating5" class="fa fa-star"></label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
    <div class=" product_data">
        <div class="">
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

                    <div>
                        @php $rate = number_format($rating_value) @endphp
                    </div>

                    <div class="ratings">

                        @for($i = 1; $i <= $rate; $i++)
                            <i class="fa fa-star checked"></i>
                        @endfor
                        @for($j = $rate+1; $j <=5; $j++)
                        <i class="fa fa-star"></i>
                        @endfor

                            <span>
                                @if($ratings->count() > 0)
                                {{$ratings->count()}}  Ratings
                                @else
                                @endif
                            </span>
                    </div>

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
                <div class="col-md-12">
                    <hr>
                    <h3>Description</h3>
                    <p class="mt-3">
                        {!! $product->description !!}
                    </p>
                </div>
                <hr>
            </div>
            <div class="row mb-5">
                <div class="col-md-4">
                    <button type="button" class="btn btn-link btn-facebook mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Rate This Product
                    </button>

                    <a href="{{ url('add_review/'. $product->slug .'/user_review') }}" class="btn btn-link btn-facebook mb-5">
                        Write a review
                    </a>
                </div>
                <div class="col-md-8 mt-2">
                    <div class="user-review">
                        @foreach($review as $item)
                            <label for="">{{ $item->users->name .' '. $item->users->lname }}</label>

                            @if($item->user_id == Auth::id())
                                <a href="{{ url('edit_review/'. $product->slug .'/user_review') }}">Edit</a>
                            @endif
                            <br>

                            @php
                                $ratingmodel = \App\Models\Rating::where('prod_id', $product->id)->where('user_id', $item->users->id)->first();
                            @endphp

                            @if($ratingmodel)
                                @php $user_rated = $ratingmodel->ratings @endphp
                                @for($i = 1; $i <= $user_rated; $i++)
                                    <i class="fa fa-star checked"></i>
                                @endfor
                                @for($j = $user_rated+1; $j <=5; $j++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            @endif
                            <br>

                            <small class="">Reviewed on {{$item->created_at->format('d M Y')}}</small>
                            <p>
                                {{$item->review}}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

{{--The product quality was excellent. The delivery was on time too.--}}
{{--The product quality was excellent. The delivery was on time too.--}}
{{--The product quality was excellent. The delivery was on time too.--}}
{{--The product quality was excellent. The delivery was on time too.--}}
