<base href="/public">
@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Add Product</h1>
        </div>
        <div class="card-body">
            <form action="{{ url('update.product', $products->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select">
                            <option value="">{{$products->category->name}}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" value="{{$products->name}}" class="form-control" name="name" required autofocus>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Slug</label>
                        <input type="text" value="{{$products->slug}}" class="form-control" name="slug" required autofocus>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Small Description</label>
                        <input type="text" value="{{$products->small_description}}" class="form-control" name="small_description" required autofocus>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" rows="3" class="form-control" required autofocus>{{$products->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" value="{{$products->original_price}}" class="form-control" required name="original_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" value="{{$products->selling_price}}" class="form-control" required name="selling_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" value="{{$products->tax}}" class="form-control" required name="tax">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" value="{{$products->qty}}" class="form-control" required name="qty">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" {{$products->status == '1' ? 'checked': ''}}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" name="trending" {{$products->trending == '1' ? 'checked' : ''}}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{$products->meta_title}}" class="form-control" name="meta_title" required autofocus>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control" required autofocus>{{$products->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control" required autofocus>{{$products->meta_description}}</textarea>
                    </div>
                    @if($products->image)
                        <img src="assets/uploads/product/{{ $products->image }}" class="edit-img" alt="">
                    @endif
                    <div class="col-md-12 mb-3">
                        <input type="file" class="form-control" name="image" autofocus>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection









