@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4>My Orders</h4>
                </div>
                <div class="card-body">
                    @if($oder->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Order Date</th>
                            <th>Tracking Number</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($oder as $item)
                            <tr>
                                <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->tracking_no }}</td>
                                <td>{{ $item->total_price }}</td>
                                <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                                <td>
                                    <a href=" {{url('view-order', $item->id)}} " class="btn btn-outline-info btn-facebook">View </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <h4>You Have No Orders :( <span class="float-end"><a class="btn btn-outline-info btn-facebook" href="{{ url('category') }}">Start Shopping</a></span></h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
