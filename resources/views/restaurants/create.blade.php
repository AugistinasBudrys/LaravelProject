@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Events
                    </div>
                    <div class="card-body">
                        <form action="{{route('restaurants.store')}}" method="POST">
                            @csrf
                            <div class="form-group col">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control-md" placeholder="name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="address" class="form-control-md col-12" placeholder="address">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="description"
                                                  placeholder="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <p>From: <input type="time" name="work_time_from" class="form-control-md" placeholder="time">
                                         To: <input type="time" name="work_time_to" class="form-control-md" placeholder="time"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="file" name="menu" class="form-control-md" placeholder="menu">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="phone_number" class="form-control-md" placeholder="number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="url" name="URL" class="form-control-md col-12" placeholder="URL">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
