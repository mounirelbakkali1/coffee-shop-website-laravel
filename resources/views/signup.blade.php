@extends('register-layout')

@section('title',"register")

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex">
                <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Sign Up</h3>
                        </div>
                        <div class="w-100">
                            <p class="social-media d-flex justify-content-end">
                                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                            </p>
                        </div>
                    </div>
                    <form action="{{ route('user.create_account') }}" class="signin-form" method="POST">
                        @csrf
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger">{{$error}}</p>
                            @endforeach
                        @endif
                        <div class="form-group mb-3">
                            <label class="label" for="name">name</label>
                            <input type="text" class="form-control" placeholder="name" value="{{old('name')}}" name="name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="name">name</label>
                            <input type="email" class="form-control" placeholder="email" value="{{old('email')}}" name="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Cofirm Password" name="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50 text-left">
                                <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="#">Forgot Password</a>
                            </div>
                        </div>
                    </form>
                    <p class="text-center">Have already an account ? <a data-toggle="tab" href="{{route("login")}}">Sign In</a></p>
                </div>
                <div class="img" style="background-image: url('{{asset('images/register-bg.jpg')}}');"></div>
            </div>
        </div>
    </div>
@endsection
