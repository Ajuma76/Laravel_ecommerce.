<base href="/public">
@extends('layouts.admin')

@section('title')
    Orders Details
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="text-white">Orders View
                            <a href="{{ url('orders') }}" class="btn btn-facebook btn-primary float-end">Back</a></h4>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <label for="">First Name</label>
                                <div class="border p-2">{{$orders->fname}}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{$orders->lname}}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{$orders->email}}</div>
                                <label for="">Contact No. </label>
                                <div class="border p-2">{{$orders->phone}}</div>
                                <label for="">Shipping Address</label>
                                <div class="border p-2">
                                    {{ $orders->address1 }}, <br>
                                    {{ $orders->address2 }},<br>
                                    {{ $orders->city }},<br>
                                    {{ $orders->state }},<br>
                                    {{ $orders->county }}
                                </div>
                                <label for="">Zip Code</label>
                                <div class="border p-2">{{$orders->pincode}}</div>
                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders->order_items as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" alt="">
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <h4 class="px-2">Total Price: <span class="float-end">KES {{ $orders->total_price }}</span></h4>
                                    <br>
                                    <div class="mt-3">
                                        <label for="">Order Status</label>
                                        <form action="{{ url('update-order/'. $orders->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <select class="form-select" name="order_status" id="">
                                                <option disabled value="">Order Status</option>
                                                <option {{$orders->status == '0' ? 'selected':''}} value="0">Pending</option>
                                                <option {{$orders->status == '1' ? 'selected':''}} value="1">Completed</option>
                                            </select>
                                            <button type="submit" class="btn btn-facebook btn-block btn-primary mt-5">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
