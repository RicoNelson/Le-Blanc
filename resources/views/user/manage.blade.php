@extends('layouts.main')

@section('body')
@if (session()->has('deleteUserSuccess'))
<div class="container d-flex justify-content-center mt-3">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('deleteUserSuccess') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<div class="container mt-4">
    <h2>Manage User </h2>

    <div class="container mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @if ($user->count() !== 0)

                    @foreach ($user as $us)
                        @if ($us->role_id !== 1)
                            <tr>
                                <th scope="row">{{ $us->user_id}}</th>
                                <td>{{ $us->name }}</td>
                                <td>
                                    <form action="/manage-user/{{ $us->user_id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                        
                    @endforeach

                @else
                    <th scope="row">You have no user...</th>
                    <td></td>
                    <td></td>

                @endif
                
            </tbody>
        </table>
    </div>
</div>
@endsection