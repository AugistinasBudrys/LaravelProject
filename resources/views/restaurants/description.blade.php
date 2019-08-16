@extends('layouts.app')

@section('content')

    <div class='container'>

        <div class='row'>

            <div class='col-md'>

                <!-- Pavadinimas -->
                <h2 class='mt-3 mb-0'>{{$restaurant->name}}</h2>

                <hr>

                <!-- Image -->
                <div><img class='img-fluid' src='{{$restaurant->logo}}' alt=''></div>
                <hr>

                <!--5 smaller images
               <div class='d-md-flex align-items-start'>-->
                <!--<div class="row">
                    <div class="col bg-warning"><img class='img-fluid ' src='http://placehold.it/900x300' alt=''></div>
                    <div class="col bg-primary"><img class='img-fluid ' src='http://placehold.it/900x300' alt=''></div>
                    <div class="col bg-danger"><img class='img-fluid ' src='http://placehold.it/900x300' alt=''></div>
                    <div class="col"><img class='img-fluid ' src='http://placehold.it/900x300' alt=''></div>
                    <div class="col"><img class='img-fluid ' src='http://placehold.it/900x300' alt=''></div>
                </div>-->
                <!--</div>-->

                <div class="row mx-0">
                    @foreach($images as $image)
                        <div class="col-md px-0"><img class='img-fluid img-thumbnail h-100' src='{{$image}}' alt=''>
                        </div>
                    @endforeach
                </div>

                <hr>

                <!-- Description -->
                <div class='card'>
                    <h5 class='card-header'>{{ trans('restaurants.description') }}</h5>
                    <div class='card-body'>
                        <p class='card-text'>{{$restaurant->description}}</p>
                    </div>
                </div>

                <hr>

                <!-- Papildoma informacija -->
                <div class='card w-50'>
                    <h5 class='card-header'>{{ trans('restaurants.information') }}</h5>
                    <div class='card-body'>
                        <p class='card-text'>{{$restaurant->address}}</p>
                        <p class='card-text'>{{$restaurant->phone_number}}</p>
                        <p class='card-text'>{{$restaurant->work_time_from}}-{{$restaurant->work_time_to}}</p>
                        <a href='{{$restaurant->URL}}'>{{ trans('restaurants.website') }}</a>
                    </div>
                </div>

            </div>

            @hasrole('admin')
            <div class='col-lg-3'>

                <!-- Administratoriaus veikla -->
                <div class='card mt-3'>
                    <h5 class='card-header'>{{ trans('restaurants.admin') }}</h5>
                    <div class='card-body'>
                        <h6 class='card-title'>{{trans('restaurants.actions')}}</h6>
                        <a href='#' class='btn btn-primary my-2'>{{ trans('restaurants.delete') }}</a>
                        <a href='#' class='btn btn-primary my-2'>{{ trans('restaurants.update') }}</a>
                    </div>
                </div>

            </div>
            @endhasrole

        </div>
    </div>

@endsection