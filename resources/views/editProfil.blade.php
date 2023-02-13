@extends('layout')
@section('title',"edit profil")

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Edit Profile</h1>
        <form method="post" action="{{route("profil.update")}}">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif
            @csrf
            <div class="form-group">
                <label for="username">Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="username"
                    placeholder="Enter your name"
                    value="{{Auth::user()->name}}"
                    name="name"
                    required
                />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Enter email"
                    name="email"
                    value="{{Auth::user()->email}}"
                    required
                />
            </div>
            <div class="form-group">
               <label  for="password">Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    placeholder="Password"
                    name="password"
                />
            </div>

            <div class="form-group">
               <label  for="password">Confirm Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    placeholder="Password"
                    name="password_confirmation"
                />
            </div>


            <button type="submit" class="btn btn-primary mt-5">save changes</button>
        </form>
    </div>
@endsection
