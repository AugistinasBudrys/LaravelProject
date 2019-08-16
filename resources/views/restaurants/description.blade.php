@extends('layouts.app')

@section('content')

    <div class='container'>

        <div class='row'>

            <div class='col-md'>

                <!-- Pavadinimas -->

                <h2 class='mt-2'>{{$restaurant->name}}</h2>


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

                @if($images !== null)
                    <div class='row mx-0'>
                        @foreach($images as $image)
                            <div class='col-md px-0'><img class='img-fluid img-thumbnail h-100' src='{{$image}}' alt=''></div>
                        @endforeach
                    </div>
                @endif


            <hr>

            <!-- Description -->
            <div class='card'>
                <h5 class='card-header'>{{trans('restaurants.description')}}</h5>
                <div class='card-body'>
                    <p class='card-text'>{{$restaurant->description}}</p>
                </div>
            </div>

            <hr>

            <!-- Papildoma informacija -->
            <div class='card w-50 event-padding-block'>
                <h5 class='card-header'>{{trans('restaurants.information')}}</h5>
                <div class='card-body'>
                    <p class='card-text'>{{$restaurant->address}}</p>
                    <p class='card-text'>{{$restaurant->phone_number}}</p>
                    <p class='card-text'>{{$restaurant->work_time_from}}-{{$restaurant->work_time_to}}</p>
                    <a href='{{$restaurant->URL}}'>{{trans('restaurants.website')}}</a>
                </div>
            </div>

        </div>

        @hasrole('admin')
        <div class='col-lg-3'>

            <!-- Administratoriaus veikla -->
            <div class='card mt-2'>
                <h5 class='card-header'>{{trans('restaurants.admin')}}</h5>
                <div class='card-body'>
                    <h6 class='card-title'>{{trans('restaurants.actions')}}</h6>
                    <div class='modal fade' id='delete-restaurant' tabindex='-1' role='dialog'
                         aria-labelledby='myModalLabel'>
                        <div class='modal-dialog modal-dialog-centered' role='document'>
                            <div class='modal-content'>
                                <div class='modal-body text-center'>
                                    {{trans('restaurants.delete_res')}}
                                </div>
                                <div class='modal-body row'>
                                    <form action="{{route('restaurants.destroy',$restaurant->id)}}" method='POST'
                                          class='col-md-6'>
                                        {{method_field('DELETE')}}
                                        @csrf
                                        <button type='submit'
                                                class='btn-primary float-right'>{{trans('restaurants.yes')}}</button>
                                    </form>
                                    <button type='button' class='btn-primary' id='dismiss'
                                            data-dismiss='modal'>{{trans('restaurants.no')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id='restaurant-delete' class='btn btn-primary my-2'>{{trans('restaurants.delete')}}</button>
                    <a href="{{route('restaurants.edit', $restaurant->id)}}">
                        <button type='button' class='btn btn-primary my-2'>{{trans('restaurants.edit')}}</button>
                    </a>
                </div>
            </div>

        </div>
        @endhasrole

        </div>
    </div>
@endsection