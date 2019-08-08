@extends('layouts.app')
@section('content')

    <div class='container'>

        <div class='row event-padding-block'>
            <div class='col-md'>
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
                <div class='card w-100 my-2'>

                    <div class='card-body'>
                        <h5 class='card-title'>People that joined</h5>
                        <p class='card-text'
                           id='joined-users'>{{$event->joinedUsers($event->id)}}</p>
                    </div>
                </div>
                <hr>
                <div class='card w-100 my-2'>
                    <div class='card-body'>
                        <h5 class='card-title'>Restaurants for this event</h5>
                        <div id='added-events'>
                            <input type='hidden' id='vote' value='{{$event->id}}'>
                            <input type='hidden' id='user' value='{{$user->id}}'>
                            <div id='vote-count'>
                                @foreach($event->eventRestaurants($event->id) as $names)
                                    <div class='d-md-flex'>
                                        <p class='card-text col-md-10'>{{$names->name}}</p>
                                        @if($votes->where('restaurant_id' , $names->id)->where('user_id', $user->id)->first() === null)
                                            <button type='submit' id='{{$names->id}}' class='btn-primary btn-sm mb-2 vote col-md-1'>Vote
                                            </button>
                                        @else
                                            <button type='submit' id='{{$names->id}}' class='btn-primary btn-sm mb-2 vote col-md-1'>Unvote
                                            </button>
                                        @endif
                                        <p class='card-text col-md-1'>{{$votes->where('restaurant_id', $names->id)->count()}}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @hasrole('admin')
            <div class='col-md-3'>
                <div class='card m-2'>
                    <h5 class='card-header'>Admin</h5>
                    <div class='card-body'>
                        <h6 class='card-title'>Admin actions</h6>
                        <button class='btn btn-primary my-2 addRest' name='add' value='add' id='{{$event->id}}'>Add
                            restaurant
                        </button>
                        <div class='modal fade' id='delete-event' tabindex='-1' role='dialog'
                             aria-labelledby='myModalLabel'>
                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-body text-center'>
                                    Are you sure you want to delete this event?
                                    </div>
                                    <div class='modal-body row'>
                                        <form action="{{route('events.destroy',$event->id)}}" method='POST'
                                              class='col-md-6'>
                                            {{method_field('DELETE')}}
                                            @csrf
                                            <button type='submit' class='btn-primary float-right'>Yes</button>
                                        </form>
                                        <button type='button' class='btn-primary' id='dismiss'
                                                data-dismiss='modal'>No
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id='yes' class='btn btn-primary my-2'>Delete event</button>
                        <a href="{{route('events.edit', $event->id)}}">
                            <button type='button' class='btn btn-primary my-2'>Edit event</button>
                        </a>

                    </div>
                </div>
            </div>
            @endhasrole
        </div>
    </div>
    @include('events/add',['event'=>$event, 'restaurants'=>$restaurants])
@endsection
