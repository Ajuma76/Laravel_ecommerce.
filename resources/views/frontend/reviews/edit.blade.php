<base href="/public">
@extends('layouts.front')

@section('title', 'Edit review')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Review for {{$review->product->name}}</h5>
                            <form action="{{ url('update_review') }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="review_id" value="{{$review->id}}">
                                <textarea class="form-control" name="user_review_edit" rows="5" placeholder="write a review">{{$review->review}}</textarea>
                                <button type="submit" class="btn btn-facebook mt-3">Update Review</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
