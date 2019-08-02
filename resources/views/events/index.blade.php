@extends('layouts.app')

@section('content')
    @if($events->first() !== null)
    <div class="container">
        <div class="row align-items-center my-2 col-md-12">
            <h1 class="font-weight-bold btn-lg">{{$events->first()->date}}</h1>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <h1 class="font-weight-light">{{$events->first()->name}}</h1>
                </li>
            </ul>
        </div>
        <div class="row align-items-center my-1 text-center">
        </div>
        <div class="row align-items-center my-5">
            <div class="col-lg-6">
                <img class="img-fluid rounded mb-3 mb-lg-0 ml-md-0" src="http://placehold.it/900x400" alt="">
            </div>
            <div class="col-lg-6">
                <p>{{$events->first()->description}}</p>
                <div class="row col-md-12">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a href="{{route('events.description',['event' => $events->first()->id])}}" class="float-left">
                                <button type="button" class="btn btn-primary">More info</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card text-white bg-secondary my-5 py-4 text-center">
            <div class="card-body">
                <p class="text-white m-0">This call to action card is a great place to showcase some important
                    information or display a clever tagline!</p>
            </div>
        </div>
        <div class="container">
            <div class="row col-md-12">
                @foreach($events as $event)
                    @if($events->first()->name != $event->name)
                        <div class="col-md-4 event-padding-block">
                            <div class="card mb-4 h-100">
                                <div class="card-body">
                                    <h2 class="card-title">{{$event->name}}</h2>
                                    <p class="card-text">{{$event->description}}</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('events.description', ['event'=>$event->id])}}" class="btn btn-primary btn-sm">More Info</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @else <p class="text-black-50 m-0">No events</p>
    @endif
@endsection
