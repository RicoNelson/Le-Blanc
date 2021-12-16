<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
    
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
</head>
<body>
    {{-- Navbar --}}
    <header class="p-3 bg-primary text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    {{-- <img src="https://img.icons8.com/external-bearicons-flat-bearicons/50/000000/external-Goat-chinese-new-year-bearicons-flat-bearicons.png"/> --}}
                    <img src="{{ URL::asset('images/logo/logo sementara.png') }}" alt="" height="50">
                </a>
    
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="/search" class="nav-link px-2 text-white">Search Product</a></li>
                </ul>
        

                @auth
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu btn-outline-light" aria-labelledby="navbarDropdown">
                            @if (auth()->user()->role_id === 2)
                                <li><a class="dropdown-item" href="/update-profile/{{ auth()->user()->user_id }}">Update Profile</a></li>
                                <li><a class="dropdown-item" href="/cart">Cart</a></li>
                                <li><a class="dropdown-item" href="/transaction">Transaction History</a></li>
                            @endif

                            @if (auth()->user()->role_id === 1)
                                <li><a class="dropdown-item" href="/insert">Insert Product</a></li>
                                <li><a class="dropdown-item" href="/manage-user">Manage User</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>


                @else
                <div class="text-end">
                    <a href="/login"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
                    <a href="/register"><button type="button" class="btn btn-warning">Sign-up</button></a>
                </div>
                @endauth
                    
            </div>
        </div>
    </header>

    <div class="container">
        @yield('body')
    </div>

    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="/search" class="nav-link px-2 text-muted">Search Product</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Instagram</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Facebook</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Youtube</a></li>
            </ul>
            <p class="text-center text-muted">&copy; 2021 MbWekCenter, Inc</p>
        </footer>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>