@extends('layouts.app')

@section('content')
    <div class='container'>
        @hasrole('admin')
        {{--<div class='row align-items-right col-md-12 text-right event-padding-block'>
            <a href="{{route('events.create')}}" class='float-right'>
                <button type='button' class='btn btn-primary'>{{trans('events.btn_create')}}</button>
            </a>
        </div>--}}
        <div class='d-flex justify-content-end my-3'>
            <a href="{{route('events.create')}}" class='float-right'>
                <button type='button' class='btn btn-primary'>{{ trans('events.btn_create') }}</button>
            </a>
        </div>
        @endhasrole
        @if($events->first() !== null)

            {{--<div class='row align-items-baseline my-6'>--}}
            <div class='card mt-3'>
                <div class='card-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <h1 class='font-weight-light'>{{$events->first()->name}}
                                <p class='font-weight-bold btn-lg float-right'>{{$events->first()->date}}</p></h1>
                        </div>
                        <div class='col-lg-6'>
                            <img class='img-fluid rounded mb-3 mb-lg-0 ml-md-0' src='{{$events->first()->image}}'
                                 alt=''>
                        </div>
                        <div class='col-lg-6 align-bottom'>
                            <div class='flex-md-grow-2 col-md-12'>
                                <p>{{$events->first()->description}}</p>
                            </div>
                            <div class='flex-md-grow-2 col-md-12'>
                                <ul class='navbar-nav align-items-end'>
                                    <li class='nav-item'>
                                        <a href="{{route('events.description',['event' => $events->first()->id])}}"
                                           class='float-left'>
                                            <button type='button'
                                                    class='btn btn-primary'>{{trans('events.btn_more')}}</button>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--</div>--}}

            <hr>
            <div class='text-center'>{{trans('events.foll_events')}}</div>
            <hr>

            <div class='row'>
                @foreach($events as $event)
                    @if($events->first()->id !== $event->id)
                        <div class='col-md-4 event-padding-block'>
                            <div class='card mb-4 h-100'>
                                <div class='card-body'>
                                    <h2 class='card-title'>{{$event->name}}</h2>
                                    <p class='card-text'>{{$event->description}}</p>
                                </div>
                                <div class='card-footer'>
                                    <a href="{{route('events.description',['event' => $event->id])}}"
                                       class='btn btn-primary btn-sm'>{{trans('events.btn_more')}}</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>


        @else
            <p class='text-black-50 m-0'>{{trans('events.no_events')}}</p>
        @endif
    </div>
@endsection
