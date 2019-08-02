@extends('layouts.app')
@section('content')

    <div class="container">
        <h2 class="my-3">Create Restaurant</h2>

        <div>
        <!--@if ($message = Session::get('success'))
            <div> class="alert alert-success alert-block"-->
                <!--<button type="button" class="close" data-dismiss="alert">×</button>-->
            <!--<strong>{{ $message }}</strong>
                </div>

            @endif-->

                @if (count($errors) > 0)

                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        </div>


        <form action="{{route('events.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- NAME -->
            <div class="form-group">
                <label for="res-name">Restaurant Name</label>
                <input class="form-control" type="text" name="res-name" id="res-name"
                       placeholder="Enter Restaurant Name">
            </div>

            <!-- DARBO LAIKAS NUO -->
            <div class="form-group">
                <label for="time-from">From</label>
                <input class="form-control" type="time" name="time-from" id="time-from">
            </div>

            <!-- DARBO LAIKAS IKI -->
            <div class="form-group">
                <label for="time-to">To</label>
                <input class="form-control" type="time" name="time-to" id="time-to">
            </div>

            <!-- LOCATION -->
            <div class="form-group">
                <label for="location">Location</label>
                <input class="form-control" type="text" name="location" id="location" placeholder="Enter Location">
            </div>

            <!-- TELEFONAS -->
            <div class="form-group">
                <label for="tel">Telephone</label>
                <input class="form-control" type="tel" name="tel" id="tel" placeholder="Enter Telephone">
            </div>

            <!-- URL -->
            <div class="form-group">
                <label for="url">URL</label>
                <input class="form-control" type="url" name="url" id="url" placeholder="Enter URL">
            </div>

            <!-- DESCRIPTION -->
            <div class="form-group">
                <label for="desc">Restaurant Description</label>
                <textarea class="form-control" id="desc" rows="3"></textarea>
            </div>

            <!-- IMAGE UPLOAD-->
            <div class="form-group d-flex flex-column">
                <label for="image">Upload Image</label>
                <input type="file" name="image">
            </div>

            <!-- BUTTON -->
            <div class="d-flex justify-content-around">
                <button type="submit" class="btn btn-primary">Create</button>
                <button type="button" class="btn btn-primary">Back</button>
            </div>


        </form>
    </div>


@endsection
