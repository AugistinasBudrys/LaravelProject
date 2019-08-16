@extends('layouts.app')
@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md'>
                <div class='d-md-flex justify-content-between'>
                    <h2 class='m-2'>{{$event->name}}</h2>
                    <div class='d-md-flex justify-content-end'></div>
                    @if($event->modelIf($event->id) === false)
                        <button type='submit' id='extra' class='btn btn-primary btn-sm my-2 join' value='{{$event->id}}'
                                data-text-swap='Leave'>{{trans('events.btn_join')}}
                        </button>
                    @else
                        <button type='submit' id='extra' class='btn btn-primary btn-sm my-2 join' value='{{$event->id}}'
                                data-text-swap='Join'>{{trans('events.btn_leave')}}
                        </button>
                    @endif
                </div>
                <hr>
                <p>{{$event->date}}</p>
                <hr>
                <div class='event-padding-block'><img class='img-fluid' src='{{$event->image}}' alt=''></div>
                <div class='card event-padding-block'>
                    <h5 class='card-header'>{{trans('events.description')}}</h5>
                    <div class='card-body'>
                        <p class='card-text'>{{$event->description}}</p>
                    </div>
                </div>
                <hr>
                <div class='card w-100 my-2'>

                    <div class='card-body'>
                        <h5 class='card-title'>{{trans('events.joined')}}</h5>
                        <p class='card-text'
                           id='joined-users'>{{$event->joinedUsers($event->id)}}</p>
                    </div>
                </div>
                <hr>
                <div class='card w-100 my-2'>
                    <div class='card-body'>
                        <h5 class='card-title'>{{trans('events.res_event')}}</h5>
                        <div id='added-events'>
                            <input type='hidden' id='vote' value='{{$event->id}}'>
                            @foreach($event->eventRestaurants($event->id) as $names)
                                <div class='d-md-flex justify-content-between'>
                                    <p class='card-text'>{{$names->name}}</p>
                                    <button id='{{$names->id}}' class='btn-primary btn-sm mb-2 vote'>vote</button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @hasrole('admin')
            <div class='col-md-3'>
                <div class='card m-2'>
                    <h5 class='card-header'>{{trans('events.admin')}}</h5>
                    <div class='card-body'>
                        <h6 class='card-title'>{{trans('events.actions')}}</h6>
                        <button class='btn btn-primary my-2 addRest' name='add' value='add'
                                id='{{$event->id}}'>{{trans('events.add_res')}}</button>

                        <button id='yes' class='btn btn-primary my-2'>{{trans('events.delete')}}</button>
                        <a href='#' class='btn btn-primary my-2'>{{trans('events.edit')}}</a>
                    </div>
                </div>
            </div>
            @endhasrole
        </div>
    </div>
    @include('events/add',['event'=>$event, 'restaurants'=>$restaurants])
@endsection
