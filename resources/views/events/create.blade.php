@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Events
                    </div>
                    <div class="card-body">
                        <form action="{{route('events.store')}}" method="POST">
                            @csrf
                            <div class="form-group col">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="date" name="date" class="form-control-md" placeholder="date">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="time" name="time" class="form-control-md" placeholder="time">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control-md" placeholder="Name">
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
                                        <input type="text" name="address" class="form-control-md" placeholder="address">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
