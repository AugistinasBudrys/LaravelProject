@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center event-padding-block">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ trans('users.verify_email') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ trans('users.verification_link') }}
                            </div>
                        @endif

                        {{ trans('users.check_email') }}
                        {{ trans('users.not_receive_email') }}, <a
                                href="{{ route('verification.resend') }}">{{ trans('users.request another') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
