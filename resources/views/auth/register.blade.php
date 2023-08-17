@extends('layouts.auth')

@section('content')
<div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white rounded shadow-base">
    <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> inventory <span class="tx-info">plus</span> <span class="tx-normal">]</span></div>
    <div class="tx-center mg-b-40">The Application Management For Material</div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Username">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Password confirm">
        </div><!-- form-group -->

        <button type="submit" class="btn btn-info btn-block">Sign Up</button>
    </form>
    <div class="mg-t-40 tx-center">Ready a member? <a href="{{ route('login') }}" class="tx-info">Sign In</a></div>
</div>
@endsection
