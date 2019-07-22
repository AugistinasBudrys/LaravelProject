@extends('layouts.app')

@section('content')
    @hasrole('admin')
        <div class="row align-items-right col-md-12 text-right">
        <a href="{{route('events.create')}}" class="float-right">
            <button type="button" class="btn btn-primary">Create Event</button>
        </a>
        </div>
    @endhasrole
    @if($events->first() !== null)
    <div class="row align-items-center my-6">
        <div class="col-md-12">
            <h1 class="font-weight-light">{{$events->first()->name}}
                <p class="font-weight-bold btn-lg float-right">{{$events->first()->date}}</p></h1>
        </div>
        <div class="col-lg-6">
            <img class="img-fluid rounded mb-3 mb-lg-0 ml-md-0" src="http://placehold.it/900x400" alt="">
        </div>
        <div class="col-lg-6">
            <p>{{$events->first()->description}}</p>
            <div class="row col-md-12">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
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
            <p class="text-white m-0">Following events</p>
        </div>
    </div>
    <div class="container">
        <div class="row col-md-12">
            @foreach($events as $event)
                @if($events->first()->id !== $event->id)
                    <div class="col-md-4 event-padding-block">
                        <div class="card mb-4 h-100">
                            <div class="card-body">
                                <h2 class="card-title">{{$event->name}}</h2>
                                <p class="card-text">{{$event->description}}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('events.description',['event' => $event->id])}}" class="btn btn-primary btn-sm">More Info</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    @else
        <p class="text-black-50 m-0">No events could be found</p>
    @endif
@endsection
