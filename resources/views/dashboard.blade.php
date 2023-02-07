{{--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}

@extends('layout')
@section('title',"dashboard")

@section('content')
    <main>
        <div class="row">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="col-lg-8">
                <h4 class="mb-4">List des plat disponible</h4>
                @include('plats')
            </div>
            <div class="col-lg-4">
                <h4 class="mb-4">List des categories</h4>
                @include('categories')
            </div>
        </div>

    </main>
@endsection
