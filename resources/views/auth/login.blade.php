@extends('layouts.app')

@section('content')


    <div class="modal-dialog text-center login-form">
        <div class="col-sm-9 main-section" id="login-center">
            <div class="modal-content" id="modal-content-login">
                <h2 id="login">Login</h2>
                <form method="POST" action="{{ route('login') }}" class="col-12">
                    @csrf

                    <div class="form-group" id="login-form">
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
                        <input type="password" id="exampleInputPassword1" placeholder="Password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"
                                   id="exampleCheck1" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="exampleCheck1">{{ __('Remember Me') }}</label>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}" id="padding">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                    <button id="button-properties-login" type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>




@endsection
