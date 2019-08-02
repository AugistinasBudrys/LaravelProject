@extends('layouts.app')

@section('content')

    <div class='container'>

        <div class='row'>

            <div class='col-md'>

                <!-- Pavadinimas ir Join mygtukas -->
                <div class='d-md-flex justify-content-between'>
                    <h2 class='mt-2'>{{$restaurant->name}}</h2>
                </div>

                <hr>
                <!-- Date -->
                <p>Date</p>
                <hr>

                <!-- Image -->
                <div class='p-2'><img class='img-fluid' src='{{$restaurant->logo}}' alt=''></div>
                <hr>

                <!-- 5 smaller images
                <div class='d-md-flex align-items-start'>
                    <div class='p-2'><img class='img-fluid ' src='http://placehold.it/900x300' alt=''></div>
                    <div class='p-2'><img class='img-fluid ' src='http://placehold.it/900x300' alt=''></div>
                    <div class='p-2'><img class='img-fluid ' src='http://placehold.it/900x300' alt=''></div>
                    <div class='p-2'><img class='img-fluid ' src='http://placehold.it/900x300' alt=''></div>
                    <div class='p-2'><img class='img-fluid ' src='http://placehold.it/900x300' alt=''></div>
                </div>-->

                <div class='d-md-flex align-items-start'>
                    @foreach($images as $image)
                        <div class='p-2'><img class='img-fluid' src='{{$image}}' alt=''></div>
                    @endforeach
                </div>

                <hr>

                <!-- Description -->
                <div class='card'>
                    <h5 class='card-header'>Description</h5>
                    <div class='card-body'>
                        <p class='card-text'>{{$restaurant->description}}</p>
                    </div>
                </div>

                <hr>

                <!-- Papildoma informacija -->
                <div class='card w-50'>
                    <h5 class='card-header'>Papildoma informacija</h5>
                    <div class='card-body'>
                        <p class='card-text'>{{$restaurant->address}}</p>
                        <p class='card-text'>{{$restaurant->phone_number}}</p>
                        <p class='card-text'>{{$restaurant->work_time_from}}-{{$restaurant->work_time_to}}</p>
                        <a href='{{$restaurant->URL}}'>Tinklalapis</a>
                    </div>
                </div>

            </div>

            @hasrole('admin')
            <div class='col-lg-3'>

                <!-- Administratoriaus veikla -->
                <div class='card mt-2'>
                    <h5 class='card-header'>Administratorius</h5>
                    <div class='card-body'>
                        <h6 class='card-title'>Administratoriaus veiksmai</h6>
                        <a href='#' class='btn btn-primary my-2'>Ištrinti restoraną</a>
                        <a href='#' class='btn btn-primary my-2'>Redaguoti restoraną</a>
                    </div>
                </div>

            </div>
            @endhasrole

        </div>
    </div>

@endsection