@extends('layouts.main')

@section('body')
<div class="row justify-content-center mt-5">
    
    <main class="form-signin border-radius-null text-center">
        <form action="/register" method="post">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Registration Form</h1>
        
            <div class="form-floating input-placeholder">
                <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" placeholder="Your Name" required>
                <label for="name">Name</label>

                @error('name')
                    <div class="invalid-feedback d-block text-start">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="form-floating input-placeholder">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Email address</label>

                @error('email')
                    <div class="invalid-feedback d-block text-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating input-placeholder">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
                <label for="password">Password</label>

                @error('password')
                    <div class="invalid-feedback d-block text-start">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="form-floating input-placeholder">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" required>
                <label for="password_confirmation">Confirm Password</label>
            </div>

            <div class="input-placeholder">
            <select id="inputGender" name="gender" class="form-control form-select py-3 rounded-bottom @error('gender') is-invalid @enderror">
                <option selected>Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            @error('gender')
                    <div class="invalid-feedback d-block text-start">
                        {{ $message }}
                    </div>
            @enderror
            </div>

            <button class="w-100 btn btn-lg btn-primary mb-4 mt-3" type="submit">Register</button>

            <p>Already have an account? <a href="/login">Login Now!</a></p>
        </form>


    </main>

</div>    
@endsection
