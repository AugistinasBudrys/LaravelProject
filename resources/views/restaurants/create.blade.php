@extends('layouts.app')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <h2 class='mt-4'>Add Restaurant</h2>
                <hr>
                        <form action="{{route('restaurants.store')}}" method='POST'>
                            @csrf
                            <div class='col-md-4 pl-0'>
                                    <div class='form-group'>
                                        <label for='res-name'>Restaurant id</label>
                                        <input type='text' id='res-name' name='name' class='form-control' placeholder='name'>
                                    </div>
                            </div>
                            <div class='d-md-flex flex-row'>
                                    <div class='form-group mr-2'>
                                        <label for='from'>From</label>
                                        <input type='time' name='work_time_from' id='from' class='form-control' placeholder='time'>
                                    </div>
                                    <div class='form-group mr-4'>
                                        <label for='to'>To</label>
                                        <input type='time' class='form-control' id='to' name='work_time_to'>
                                    </div>
                                    <div class='form-group mr-4'>
                                        <label for='location'>Location</label>
                                        <input type='text' class='form-control' id='location' name='address' placeholder='Enter Location'>
                                    </div>
                                    <div class='form-group mr-4'>
                                        <label for='tel'>Telephone</label>
                                        <input class='form-control' type='tel' id='tel' name='phone_number' placeholder='Enter Telephone'>
                                    </div>
                                    <div class='form-group mr-4'>
                                        <label for='url'>URL</label>
                                        <input class='form-control' type='url' id='url' name='URL' placeholder='Enter URL'>
                                    </div>
                            </div>
                            <div class='form-group'>
                                <label for='description'>Restaurant Description</label>
                                <textarea class='form-control' id='description' name='description' rows='3'></textarea>
                            </div>
                            <div class='form-group'>
                                    <input type='file' name='menu' class='form-control-md' placeholder='menu'>
                                </div>
                            <div class="d-flex justify-content-around">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <a href="{{route('restaurants.index')}}"
                                   class='btn btn-primary'>back</a>
                            </div>
            </form>

            </div>
        </div>
    </div>
@endsection
