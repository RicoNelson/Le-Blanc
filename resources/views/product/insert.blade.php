@extends('layouts.main')

@section('body')

@if (session()->has('insertSuccess'))
<div class="container d-flex justify-content-center mt-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('insertSuccess') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<div class="container col-8 text-center mt-3">
    <h2>Insert Product</h2>
</div>

<form class="container mt-5 col-8" method="post" action="/insert" enctype="multipart/form-data">
    @csrf
    <div class="d-flex mb-3">
        <label class="col-sm-2 col-form-label" for="category_id">Category:</label>
        <div>
            <select class="form-control form-select" id="category_id" name="category_id">
                <option value="">Choose Category</option>
                @foreach ($category as $cat)
                    <option  value="{{ $cat->category_id }}">{{ $cat->category_name }}</option>
                @endforeach
            </select>

            @error('category_id')
                <div class="invalid-feedback d-block text-start">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="product_name" class="col-sm-2 col-form-label">Title: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="product_name" name="product_name">
            @error('product_name')
                <div class="invalid-feedback d-block text-start">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>

    <div class="form-group row mb-3">
        <label for="product_description" class="col-sm-2 col-form-label">Description:</label>
        <div class="col-sm-10">
            <textarea class="form-control @error('product_description') is-invalid @enderror" id="product_description" name="product_description" rows="3"></textarea>
            @error('product_description')
                <div class="invalid-feedback d-block text-start">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>

    <div class="form-group row mb-3">
        <label for="price" class="col-sm-2 col-form-label">Starting Price: </label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="price" @error('price') is-invalid @enderror name="price">
        </div>

        @error('price')
            <div class="invalid-feedback d-block text-start">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group row mb-3">
        <label for="datetimeInput" class="col-sm-2 col-form-label">Starting Price: </label>
        <div class="col-sm-10">
            <input type="datetime-local" class="form-control" id="datetimeInput" @error('datetimeInput') is-invalid @enderror name="datetimeInput">
        </div>

        @error('datetimeInput')
            <div class="invalid-feedback d-block text-start">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group row mb-3">
        <label for="product_image" class="col-sm-2 col-form-label">Image: </label>
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="product_image" name="product_image">
            </div>
            @error('product_image')
                <div class="invalid-feedback d-block text-start">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>


    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection