<base href="/public">
@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Edit/Update Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ url('update.category', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" value="{{$category->name}}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Slug</label>
                        <input type="text" value="{{$category->slug}}" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{$category->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" {{$category->status == "1" ? 'checked':''}}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular" {{$category->popular == "1" ? 'checked':''}}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Meta-Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{$category->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{$category->meta_descript}}</textarea>
                    </div>
                    @if($category->image)
                        <img src="assets/uploads/category/{{ $category->image }}" class="edit-img" alt="">
                    @endif
                    <div class="col-md-12 mb-3">
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Edit/Update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection













