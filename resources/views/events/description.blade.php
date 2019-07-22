@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-9">
                <div class="d-md-flex justify-content-between">
                <h2 class="m-2">{{$event->name}}</h2>
                    <p>{{$event->countUsers($event->id)}}</p>
                <form action="{{route('events.join',['event' => $event->id])}}" method="POST" class="float-left">
                    @csrf
                    {{method_field('PUT')}}
                    @if($event->modelIf($event->id) === false)
                        <button type="submit" class="btn btn-primary btn-sm my-2">Join</button>
                    @else
                        <button type="submit" class="btn btn-danger btn-sm my-2">Leave</button>
                    @endif
                </form>

                </div>
                <hr>
                <p>{{$event->date}}</p>
                <hr>
                <div class="p-2"><img class="img-fluid" src="http://placehold.it/900x300" alt=""></div>
                <div class="card">
                    <h5 class="card-header">Description</h5>
                    <div class="card-body">
                        <p class="card-text">{{$event->description}}</p>
                    </div>
                </div>
                <hr>
                <div class="card w-50 my-2">

                    <div class="card-body">
                        <h5 class="card-title">Papildoma informacija 1</h5>
                        <p class="card-text">Meniu</p>
                    </div>
                </div>
                <div class="card w-50 my-2">
                    <div class="card-body">
                        <h5 class="card-title">Papildoma informacija 2</h5>
                        <p class="card-text">Atsiliepimai</p>
                    </div>
                </div>
                <div class="card w-50 my-2">
                    <div class="card-body">
                        <h5 class="card-title">Papildoma informacija 3</h5>
                        <p class="card-text">Kontaktai</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card m-2">
                    <h5 class="card-header">Administratorius</h5>
                    <div class="card-body">
                        <h6 class="card-title">Administratoriaus veiksmai</h6>
                        <a href="{{route('restaurants.create')}}" class="btn btn-primary my-2">Add restaurant</a>
                        <a href="#" class="btn btn-primary my-2">Delete event</a>
                        <a href="#" class="btn btn-primary my-2">Edit event</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
