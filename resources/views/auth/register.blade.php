@extends('layouts.app')

@section('content')

    <div class="modal-dialog text-center">
        <div class="col-sm-9 main-section register-center">
            <div class="modal-content modal-content-register">
                <h2 class="title">{{trans('users.register')}}</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <input type="text" id="name" placeholder="Enter name"
                               class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="email" id="email" placeholder="Enter e-mail"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" id="password" placeholder="Password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" id="password-confirm" placeholder="Confirm Password"
                               name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <button type="submit"
                            class="btn btn-primary button-properties-register">{{trans('users.register')}}</button>
                </form>
            </div>
        </div>
    </div>


@endsection
