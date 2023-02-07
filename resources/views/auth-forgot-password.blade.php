@extends('register-layout')



@section('title',"forget password")


@section('content')
<div class="container justify-content-center align-items-center" style="height: 100vh">
    <form action="{{ route('password.email') }}" class="signin-form " method="POST">
        @csrf
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
        @endif
        <h2>Please provide your email</h2>
        <div class="form-group mb-3">
            <label class="label" for="name">email</label>
            <input type="email" class="form-control" placeholder="email" name="email" required>
        </div>
        <div class="form-group mb-3">
            <button class="btn btn-warning" type="submit">Send</button>
        </div>
    </form>
</div>
@endsection
