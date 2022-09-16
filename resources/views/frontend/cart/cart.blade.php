@extends('layouts.front')

@section('title')
    Cart
@endsection
@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a  class="text-black" href="{{url('/')}}">
                    Home
                </a>
                /
                <a class="text-black"  href="{{url('cart')}}">
                    Cart
                </a>
            </h6>
        </div>
    </div>

    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">

            {{session()->get('message')}}

            <button class="btn btn-close" data-dismiss="alert">
                X
            </button>
        </div>
    @endif
    <div class="container my-5">
        <div class="card shadow ">

            @if($cartItems->count() > 0)

            <div class="card-body">

                @php  $total = 0;   @endphp
                @foreach($cartItems as $item)
                <div class="row product_data">
                    <div class="col-md-2  my-auto">
                        <img src="assets/uploads/product/{{$item->products->image}}" height="70px;" width="70px;" alt="image here">
                    </div>
                    <div class="col-md-3 my-auto">
                        <h6>{{$item->products->name}}</h6>
                    </div>

                    <div class="col-md-2 my-auto">
                        <h6> KES: {{$item->products->selling_price}}</h6>
                    </div>

                    <div class="col-md-3 my-auto">
                        <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                        @if($item->products->qty >= $item->prod_qty)
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width: 130px;">
                            <button class="input-group-text changequantity decrement-btn btn">-</button>
                            <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$item->prod_qty}}">
                            <button class="input-group-text changequantity increment-btn btn">+</button>
                        </div>
                            @php $total +=  $item->products->selling_price * $item->prod_qty; @endphp
                        @else
                            <h6>Out Of Stock</h6>
                        @endif
                    </div>
                    <div class="col-md-2 my-auto">
                        <button class="badge badge-danger delete-cart-item" onclick="return confirm('Remove Product?')">
                            <i class="fa fa-trash"></i> Remove
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
            <hr>
            <div class="card-footer">
                <h5>Total Price : KES {{$total}}</h5>

                <a href="{{url('checkout')}}" class="btn btn-outline-success float-end">Proceed to Place Order</a>
            </div>

            @else
                <div class="card-body text-center">
                    <h2><i class="fa fa-shopping-cart"></i> Your Cart is Empty</h2>
                    <a href="{{url('category')}}" class="btn btn-outline-info float-end">Continue Shopping</a>
                </div>
            @endif

        </div>
    </div>
@endsection






