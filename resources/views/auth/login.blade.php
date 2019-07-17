@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group" id="login-form">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter email"
                   class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" id="exampleInputPassword1" placeholder="Password"
                   class="form-control @error('password') is-invalid @enderror" name="password"
                   required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="exampleCheck1">{{ __('Remember Me') }}</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </form>


@endsection
