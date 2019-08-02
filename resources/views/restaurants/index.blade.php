@extends('layouts.app')

@section('content')
    <div class='container'>
    @hasrole('admin')
<div class="event-padding-block row align-items-right col-md-12 text-right">
    <a href="{{route('restaurants.create')}}" class="float-right">
        <button type="button" class="btn btn-primary">Add restaurant</button>
    </a>
</div>
@endhasrole
    </div>
@endsection