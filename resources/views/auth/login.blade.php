@extends('layouts.auth')

@section('content')
<div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
<div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> inventory <span class="tx-info">plus</span> <span class="tx-normal">]</span></div>
<div class="tx-center mg-b-60">The Application Management For Material</div>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div><!-- form-group -->
    <div class="form-group">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        @endif
    </div><!-- form-group -->
    <button type="submit" class="btn btn-info btn-block">Sign In</button>
</form>
<div class="mg-t-60 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign Up</a></div>
</div>
@endsection
