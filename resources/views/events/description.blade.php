@extends('layouts.app')
@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-9'>
                <div class='d-md-flex justify-content-between'>
                    <h2 class='m-2'>{{$event->name}}</h2>
                    <div class='d-md-flex justify-content-end'></div>
                    @if($event->modelIf($event->id) === false)
                        <button type='submit' id='extra' class='btn btn-primary btn-sm my-2 join' value='{{$event->id}}'
                                data-text-swap='Leave'>Join
                        </button>
                    @else
                        <button type='submit' id='extra' class='btn btn-primary btn-sm my-2 join' value='{{$event->id}}'
                                data-text-swap='Join'>Leave
                        </button>
                    @endif
                </div>
                <hr>
                <p>{{$event->date}}</p>
                <hr>
                <div class='p-2 event-padding-block'><img class='img-fluid' src='http://placehold.it/900x300' alt=''>
                </div>
                <div class='card event-padding-block'>
                    <h5 class='card-header'>Description</h5>
                    <div class='card-body'>
                        <p class='card-text'>{{$event->description}}</p>
                    </div>
                </div>
                <hr>
                <div class='card w-50 my-2'>

                    <div class='card-body'>
                        <h5 class='card-title'>People that joined</h5>
                        <p class='card-text'
                           id='joined-users'>{{$event->joinedUsers($event->id)}}</p>
                    </div>
                </div>
            </div>
            @hasrole('admin')
            <div class='col-md-3'>
                <div class='card m-2'>
                    <h5 class='card-header'>Admin</h5>
                    <div class='card-body'>
                        <h6 class='card-title'>Admin actions</h6>
                        <button class='btn btn-primary my-2' id="myBtn">Add restaurant</button>
                        <button id='yes' class='btn btn-primary my-2'>Delete event</button>
                        <a href='#' class='btn btn-primary my-2'>Edit event</a>
                    </div>
                </div>
            </div>
            @endhasrole
        </div>
        </div>
    </div>
@endsection
