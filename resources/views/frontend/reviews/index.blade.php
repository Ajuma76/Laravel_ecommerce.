<base href="/public">
@extends('layouts.front')

@section('title', 'Write a review')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if($verified_purchase->count() > 0)
                            <h5>Review for {{$product->name}}</h5>
                            <form action="{{ url('add_review') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <textarea class="form-control" name="user_review" rows="5" placeholder="write a review"></textarea>
                                <button type="submit" class="btn btn-facebook mt-3">Submit Review</button>
                            </form>
                        @else
                            <div class="alert alert-secondary">
                                <h5>Purchase first to review this product! :)</h5>

                                <a href="{{ url('category') }}" class="btn btn-facebook btn-success mt-3">Start Shopping</a>

                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
