@extends('layouts.app')

@section('content')
    <div class='container'>
        @hasrole('admin')
        <div class='d-flex justify-content-end my-3'>
            <a href="{{route('restaurants.create')}}" class='float-right'>
                <button type='button' class='btn btn-primary'>Add restaurant</button>
            </a>
        </div>
        @endhasrole
    </div>

    <div class='container mt-3'>
        <div class='row'>

        @foreach($restaurants as $restaurant)

                <div class='col-md-12 event-padding-block'>
                    <div class='card h-100'>

                        <div class='card-body'>

                            <div class='row'>

                                <div class='col-md-5 mb-3'>
                                    <img class='card-img img-fluid' src='{{$restaurant->logo}}' alt=''>
                                </div>

                                <div class='col-md-7'>
                                    <h2 class='card-title'>{{$restaurant->name}}</h2>
                                    <p class='card-text'>{{$restaurant->description}}</p>
                                    <div class='d-flex justify-content-end'>
                                        <a href="{{ route('restaurant.description', ['restaurant'=>$restaurant->id]) }}"
                                           class='btn btn-primary btn-sm'>More Info</a>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>
                </div>


            @endforeach

        </div>
    </div>

@endsection