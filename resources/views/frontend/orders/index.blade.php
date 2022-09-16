@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tracking Number</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($oder as $item)
                    <tr>
                        <td>{{ $item->tracking_no }}</td>
                        <td>{{ $item->total_price }}</td>
                        <td>
                            <a href="" class="btn btn-outline-info">View </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
