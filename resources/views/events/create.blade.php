@extends('layouts.app')

@section('content')

    <!-- Trigger/Open The Modal -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-4">{{trans('events.add_event')}}</h2>
                <hr>
                <form action="{{route('events.store')}}" method='POST' enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-5 pl-0">
                        <div class="form-group">
                            <label for="event-name">{{trans('events.name')}}</label>
                            <input type="text" id="event-name" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="d-md-flex flex-row">
                        <div class="form-group mr-4">
                            <label for="event-date">{{trans('events.date')}}</label>
                            <input type="date" id="event-date" name="date" class="form-control" placeholder="date">
                        </div>
                        <div class="d-md-flex flex-row">
                            <div>
                                <div class="form-group mr-4">
                                    <label for="event-time">{{trans('events.time')}}</label>
                                    <input type="time" id="event-time" name="time" class="form-control"
                                           placeholder="time">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mr-4">
                            <label for="event-location">{{trans('events.location')}}</label>
                            <input type="text" id="event-location" name="address" class="form-control"
                                   placeholder="address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="event-description">{{trans('events.form_desc')}}</label>
                        <textarea class="form-control" id="event-description" name="description"
                                  placeholder="Description" rows="3"></textarea>
                    </div>

                    <div class='form-group d-flex flex-column'>
                        <label for='image'>{{trans('events.image')}}</label>
                        <input type='file' id='image' name='image' class='form-control-md'>
                    </div>


                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-5">{{trans('events.btn_add')}}</button>
                        <a href="{{route("events.index")}}"
                           class="btn btn-primary">{{trans('events.btn_back')}}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
