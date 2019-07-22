@extends('layouts.app')
@section('content')

    <div class="container ">

        <div class="row">

            <div class="col-md-12">

                <h2 class="mt-4">Create Restaurant</h2>

                <hr>

                <!-- Restaurant NAME -->
                <div class="col-md-4 pl-0">
                    <form>
                        <div class="form-group">
                            <label for="res-name">Restaurant Name</label>
                            <input type="text" class="form-control" id="res-name" placeholder="Enter Restaurant Name">
                        </div>
                    </form>
                </div>


                <!-- START D-FLEX -->
                <!-- DARBO LAIKAS NUO -->
                <div class="d-md-flex flex-row">
                    <form>
                        <div class="form-group mr-2">
                            <label for="fromt">From</label>
                            <input type="time" class="form-control" id="fromt">
                        </div>
                    </form>


                    <!-- IKI -->
                    <form>
                        <div class="form-group mr-4">
                            <label for="tot">To</label>
                            <input type="time" class="form-control" id="tot">
                        </div>
                    </form>

                    <!-- Restaurant LOCATION -->
                    <form>
                        <div class="form-group mr-4">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" placeholder="Enter Location">
                        </div>
                    </form>


                    <!-- Restaurant telefonas -->
                    <form>
                        <div class="form-group mr-4">
                            <label for="tel">Telephone</label>
                            <input class="form-control" type="tel" id="tel" placeholder="Enter Telephone">
                        </div>
                    </form>

                    <!-- Restaurant URL -->
                    <form>
                        <div class="form-group mr-4">
                            <label for="url">URL</label>
                            <input class="form-control" type="url" id="url" placeholder="Enter URL">
                        </div>
                    </form>

                </div>
                <!-- END D-FLEX -->

                <!-- Restaurant DESCRIPTION -->
                <div class="form-group">
                    <label for="description">Restaurant Description</label>
                    <textarea class="form-control" id="description" rows="3"></textarea>
                </div>

                <!-- Restaurant BUTTONS -->
                <div class="d-flex justify-content-around">
                    <button type="button" class="btn btn-primary">Create</button>
                    <button type="button" class="btn btn-primary">Back</button>
                </div>
            </div>
        </div>
    </div>


@endsection
