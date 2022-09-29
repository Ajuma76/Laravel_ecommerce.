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
                                    <input type="text" class="form-control fname" value="{{ Auth::user()->name }}" name="fname" placeholder="First Name"  required>
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control lname" value="{{ Auth::user()->lname }}" name="lname" placeholder="Last Name" required>
                                    <span id="lname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Email" required>
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" placeholder="Phone" required>
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="address1">Address 1</label>
                                    <input type="text" class="form-control address1" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Address 1" required>
                                    <span id="address1_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="address2">Address 2</label>
                                    <input type="text" class="form-control address2" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Address 2" required>
                                    <span id="address2_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control city" value="{{ Auth::user()->city }}" name="city" placeholder="City" required>
                                    <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control state" value="{{ Auth::user()->state }}" name="state" placeholder="State" required>
                                    <span id="state_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control country" value="{{ Auth::user()->country }}" name="country" placeholder="Country" required>
                                    <span id="country_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="pin">Pin Code</label>
                                    <input type="text" class="form-control pincode"  value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Pin Code" required>
                                    <span id="pincode_error" class="text-danger"></span>
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

                                @php $total = 0; @endphp
                                @foreach($cartItem as $item)
                                    <tr>
                                        @php $total += $item->products->selling_price * $item->prod_qty @endphp

                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->prod_qty}}</td>
                                        <td> KES: {{$item->products->selling_price}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>

                            <h6 class="px-2">Grand Total <span class="float-end">{{ $total }}</span></h6>
                                <hr>
                            <button  type="submit" class="btn btn-outline-info btn-block">Place Order | COD</button>
                            <button  type="button" class="btn btn-outline-secondary btn-block mt-3 razorpay_btn">Pay  with RazorPay</button>
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
