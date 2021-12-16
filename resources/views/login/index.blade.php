@extends('layouts.main')

@section('body')


@if (session()->has('regis_success'))
<div class="container d-flex justify-content-center mt-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('regis_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if (session()->has('loginError'))
<div class="container d-flex justify-content-center mt-3">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<div class="text-center mt-5">
    <main class="form-signin">
        <form action="/login" method="post">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please Login</h1>
        
            <div class="form-floating input-placeholder">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ Cookie::get('email_cookie') ?? "" }} ">
                <label for="email">Email address</label>

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating input-placeholder">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required value="{{ Cookie::get('password_cookie') ?? "" }}">
                <label for="password">Password</label>
            </div>
        
            <div class="checkbox mb-3 mt-4">
                <label>
                <input type="checkbox" name="remember" id="remember" checked="{{ Cookie::get('email_cookie') !== null }}"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary mb-4" type="submit">Log in</button>

            <p>Not Registered? <a href="/register">Register Now!</a></p>
        </form>


    </main>

</div>    
@endsection
