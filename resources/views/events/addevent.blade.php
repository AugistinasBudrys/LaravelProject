@extends('layouts.app')
@section('content')

    <div class="container ">

        <div class="row">

            <div class="col-md-12">

                <h2 class="mt-4">Add Event</h2>

                <hr>

                <!-- EVENT NAME -->
                <div class="col-md-5 pl-0">
                    <form>
                        <div class="form-group">
                            <label for="event-name">Event name</label>
                            <input type="text" class="form-control" id="event-name" placeholder="Enter Event Name">
                        </div>
                    </form>
                </div>

                <!-- EVENT DATE -->
                <!-- START D-FLEX -->
                <div class="d-md-flex flex-row">
                    <form>
                        <div class="form-group mr-4">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date">
                        </div>
                    </form>


                    <!-- EVENT TIME -->
                    <form>
                        <div class="form-group mr-4">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" id="time">
                        </div>
                    </form>


                    <!-- EVENT LOCATION -->
                    <form>
                        <div class="form-group mr-4">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" placeholder="Enter Location">
                        </div>
                    </form>
                </div>
                <!-- END D-FLEX -->


                <!-- EVENT DESCRIPTION -->
                <div class="form-group">
                    <label for="description">Event Description</label>
                    <textarea class="form-control" id="description" rows="3"></textarea>
                </div>

                <!-- EVENT BUTTONS -->
                <div class="d-flex justify-content-around">
                    <button type="button" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-primary">Back</button>
                </div>
            </div>
        </div>
    </div>


@endsection
