@extends('layouts.main')

@section('body')

@if (session()->has('updateSuccess'))
<div class="container d-flex justify-content-center mt-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('updateSuccess') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<div class="container col-8 text-center mt-3">
    <h2>Update Product</h2>
</div>

<form class="container mt-5 col-8" method="post" action="/update/{{ $product->product_id }}" enctype="multipart/form-data">
    @csrf
    <div class="d-flex mb-3">
        <label class="col-sm-2 col-form-label" for="category">Category:</label>
        <div>
            <select class="form-control form-select" id="category" name="category">
                @foreach ($category as $cat)
                    <option  value="{{ $cat->category_id }}" @if($product->category->category_name === "$cat->category_id") selected @endif>{{ $cat->category_name }}</option>
                @endforeach
            </select>

            @error('category')
                <div class="invalid-feedback d-block text-start">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="title" class="col-sm-2 col-form-label">Title: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="title" @error('title') is-invalid @enderror name="title" value="{{ $product->product_name }}">
        </div>

        @error('title')
            <div class="invalid-feedback d-block text-start">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group row mb-3">
        <label for="description" class="col-sm-2 col-form-label">Description:</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="description" @error('description') is-invalid @enderror name="description" rows="3">{{ $product->product_description }}</textarea>
        </div>

        @error('description')
            <div class="invalid-feedback d-block text-start">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group row mb-3">
        <label for="price" class="col-sm-2 col-form-label">Price: </label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="price" @error('price') is-invalid @enderror value="{{ $product->price }}" name="price">
        </div>

        @error('price')
            <div class="invalid-feedback d-block text-start">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group row mb-3">
        <label for="stock" class="col-sm-2 col-form-label">Stock: </label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="stock" @error('stock') is-invalid @enderror value="{{ $product->stock }}" name="stock">
        </div>

        @error('stock')
            <div class="invalid-feedback d-block text-start">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group row mb-3">
        <label for="image" class="col-sm-2 col-form-label">Image: </label>
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
            </div>
        </div>

        @error('image')
            <div class="invalid-feedback d-block text-start">
                {{ $message }}
            </div>
        @enderror
    </div>


    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

    <input type="hidden" name="id" value="{{ $product->product_id }}">

</form>
@endsection