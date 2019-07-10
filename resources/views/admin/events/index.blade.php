@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Manage Events</div>

                    <div class="card-body">
                        <table class="" table>
                            <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Created by</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <th>{{ $event->date }}</th>
                                    <th>{{ $event->name }}</th>
                                    <th>{{$event->description}}</th>
                                    <th>{{ implode(', ',$event->eventusers()->get()->pluck('name')->toArray()) }}</th>
                                    <th>
                                        <form action="{{route('admin.events.destroy',$event->id)}}" method="POST"
                                              class="float-left">
                                            {{method_field('DELETE')}}
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sn">Delete</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$events->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
