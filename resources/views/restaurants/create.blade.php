@extends('layouts.app')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <h2 class='mt-4'>{{ trans('restaurants.add_res') }}</h2>
                <hr>
                <form action="{{ route('restaurants.store') }}" method='POST' enctype="multipart/form-data">
                    @csrf
                    <div class='col-md-4 pl-0'>
                        <div class='form-group'>
                            <label for='res-name'>{{ trans('restaurants.name') }}</label>
                            <input type='text' id='res-name' name='name' class='form-control' placeholder='Enter Name'>
                        </div>
                    </div>

                    <div class='d-md-flex flex-row'>
                        <div class='form-group mr-2'>
                            <label for='from'>{{ trans('restaurants.from') }}</label>
                            <input type='time' name='work_time_from' id='from' class='form-control'>
                        </div>
                        <div class='form-group mr-4'>
                            <label for='to'>{{ trans('restaurants.location') }}</label>
                            <input type='time' class='form-control' id='to' name='work_time_to'>
                        </div>
                        <div class='form-group mr-4'>
                            <label for='location'>{{ trans('restaurants.location') }}</label>
                            <input type='text' class='form-control' id='location' name='address'
                                   placeholder='Enter Location'>
                        </div>
                        <div class='form-group mr-4'>
                            <label for='tel'>{{ trans('restaurants.telephone') }}</label>
                            <input class='form-control' type='tel' id='tel' name='phone_number'
                                   placeholder='Enter Telephone'>
                        </div>
                        <div class='form-group mr-4'>
                            <label for='url'>{{ trans('restaurants.url') }}</label>
                            <input class='form-control' type='url' id='url' name='URL' placeholder='Enter URL'>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='description'>{{ trans('restaurants.form_desc') }}</label>
                        <textarea class='form-control' id='description' name='description' rows='3'></textarea>
                    </div>

                    <div class='form-group d-flex flex-column'>
                        <label for='logo'>{{ trans('restaurants.logo') }}</label>
                        <input type='file' id='logo' name='logo' class='form-control-md'>
                    </div>

                    <div class='form-group d-flex flex-column'>
                        <label for='images'>{{ trans('restaurants.images') }}</label>
                        <input type='file' id='images' name='images[]' multiple>
                    </div>

                    <div class='d-md-flex justify-content-center'>
                        <button type='submit' class='btn btn-primary mr-5'>{{ trans('restaurants.btn_add') }}</button>
                        <a href="{{route('restaurants.index')}}"
                           class='btn btn-primary'>{{ trans('restaurants.btn_back') }}</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection