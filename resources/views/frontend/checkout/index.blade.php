@extends('layouts.front')

@section('title')
    Checkout
@endsection
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a  class="text-black" href="{{url('/')}}">
                    Home
                </a>
                /
                <a class="text-black"  href="{{url('checkout')}}">
                    Checkout
                </a>
            </h6>
        </div>
    </div>
    <div class="container">
        <form action="{{url('place-order')}}" method="post">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-center">Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6 mt-3">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="fname" placeholder="First Name"  required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->lname }}" name="lname" placeholder="Last Name" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control" value="{{ Auth::user()->phone }}" name="phone" placeholder="Phone" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="address1">Address 1</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Address 1" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="address2">Address 2</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Address 2" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->city }}" name="city" placeholder="City" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->state }}" name="state" placeholder="State" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->country }}" name="country" placeholder="Country" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="pin">Pin Code</label>
                                    <input type="text" class="form-control"  value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Pin Code" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-center">Order Details</h6>
                            <hr>

                            @if($cartItem->count() > 0)
                            <table class="table table-bordered table-hover">
                                <tbody>
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                @foreach($cartItem as $item)
                                    <tr>
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->prod_qty}}</td>
                                        <td> KES: {{$item->products->selling_price}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                            <hr>
                            <button  type="submit" class="btn btn-outline-info btn-block">Place Order</button>
                            @else
                            <h5 class="text-center">No Products in Cart</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @csrf
        </form>
    </div>
@endsection
