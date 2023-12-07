@extends('layout.app_with_login')
@section('title','Products')
@section('content')
@include('errors.index')
<section id="responsive-datatable">
    <div
     class="row">
        <div class="col-md-12 col-12">
            <form id="blog-form"  enctype="multipart/form-data" action="{{ isset($productDetails) ? route('user.product.update',['id' => $productDetails->id]) : route('user.product.store') }}" method="post">
                {{ @csrf_field() }}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-1 col-6">
                                <label class="form-label" for="title">Name</label>
                                <input type="text" class="form-control" value="{{ (isset($productDetails)) ? $productDetails->name : '' }}" id="title" placeholder="Title" name="title" required/>
                            </div>
                            <div class="mb-1 col-6">
                                <label class="form-label" for="author">Category</label>
                                <select name="category" class="form-control">
                                    <option selected disabled>--Select--</option>
                                    @foreach($cat as $key => $value)
                                    @if(isset($productDetails))
                                    <option value="{{$value->name}}" {{ $value->name ==  $productDetails->category ? 'selected' : '' }}>{{$value->name}}</option>
                                    @else
                                    <option value="{{$value->name}}">{{$value->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-1 col-6">
                                <label class="form-label" for="description">Slug</label>
                                <input type="text" class="form-control" id="description" placeholder="Slug" name="slug" value="{{ (isset($productDetails)) ? $productDetails->slug : '' }}" required>
                            </div>
                            <div class="mb-1 col-6">
                                <label class="form-label" for="description">Price</label>
                                <input type="text" class="form-control" id="description" placeholder="Price" name="price" value="{{ (isset($productDetails)) ? $productDetails->price : '' }}" required>
                            </div>
                            <div class="mb-1 col-6">
                                <label class="form-label" for="description">Description</label>
                                <textarea rows="1" cols="5" class="form-control" id="description" placeholder="Description" name="description" required>{{ (isset($productDetails)) ? $productDetails->description : '' }}</textarea>
                            </div>
                            <div class="mb-1 col-6">
                                <label class="form-label" for="image">Image</label>
                                <input class="form-control" id="image" type="file" name="images" accept="image/*"><br>
                            </div>
                            <div class="mb-1 col-6">
                                @if (isset($productDetails) && !empty($productDetails->image))
                                    <img src="{{$productDetails->image}}" class="rounded" width="60px" height="60px">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@push('custom-styles')
@endpush
@push('custom-scripts')
@endpush
