@extends('layouts.app')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <h2 class='mt-4'>Add Event</h2>
                <hr>
                <form action="{{route('events.update', ['event'=> $event->id])}}" method='POST'>
                    {{method_field('PUT')}}
                    @csrf
                    <div class='col-md-5 pl-0'>
                        <div class='form-group'>
                            <label for='event-name'>Event name</label>
                            <input type='text' id='event-name' name='name' value='{{$event->name}}' class='form-control' placeholder='Name'>
                        </div>
                    </div>
                    <div class='d-md-flex flex-row'>
                        <div class='form-group mr-4'>
                            <label for='event-date'>Date</label>
                            <input type='date' id='event-date' name='date' value='{{$event->date}}' class='form-control' placeholder='date'>
                        </div>
                        <div class='d-md-flex flex-row'>
                            <div>
                                <div class='form-group mr-4'>
                                    <label for='event-time'>Time</label>
                                    <input type='time' id='event-time' name='time' value='{{$event->time}}' class='form-control'
                                           placeholder='time'>
                                </div>
                            </div>
                        </div>
                        <div class='form-group mr-4'>
                            <label for='event-location'>Location</label>
                            <input type='text' id='event-location' name='address' value='{{$event->address}}' class='form-control'
                                   placeholder='address'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='event-description'>Event Description</label>
                        <textarea class='form-control' id='event-description' name='description'
                                  placeholder='description' rows='3'>{{$event->description}}</textarea>
                    </div>
                    <div class='d-flex justify-content-center'>
                        <button type='submit' class='btn btn-primary mr-5'>Add</button>
                        <a href="{{route('events.description',['event' => $event->id])}}"
                           class='btn btn-primary'>Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
