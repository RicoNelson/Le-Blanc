@extends('layouts.main')

@section('body')
    @if (session()->has('updateProfileSuccess'))
        <div class="container d-flex justify-content-center mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('updateProfileSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container col-8 text-center mt-3">
        <h2>Update Profile</h2>
    </div>

    <form class="container mt-5 col-8" method="post" action="/update-profile/{{ auth()->user()->user_id }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
                @error('name')
                    <div class="invalid-feedback d-block text-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>

        </div>

        <div class="form-group row mb-3">
            <label for="password" class="col-sm-2 col-form-label">Password: </label>
            <div class="col-sm-10">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                    <div class="invalid-feedback d-block text-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password: </label>
            <div class="col-sm-10">
                <input type="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                @error('password_confirmation')
                    <div class="invalid-feedback d-block text-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group d-flex mb-3">
            <label for="gender" class="col-sm-2 col-form-label">Gender:</label>
            <select id="inputGender" name="gender" class="form-control form-select @error('gender') is-invalid @enderror">
                <option>Gender</option>
                <option value="male" @if($user->gender === "male") selected @endif>Male</option>
                <option value="female" @if($user->gender === "female") selected @endif>Female</option>
            </select>

            @error('gender')
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

    </form>
@endsection
