<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Restaurant</h4>
                <button type="button" class="close" id='dismiss' data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                            @foreach($restaurants as $restaurant)
                                <div class="form-check">
                                    <input type="checkbox" name="restaurants[]" id='restaurantId' value="{{$restaurant->id}}"
                                            {{$event->hasAnyRestaurant($restaurant->name)?'checked':''}}>
                                    <label>{{$restaurant->name}}</label>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary Add" id='eventId' value='{{$event->id}}'>
                                Add
                            </button>
            </div>

        </div>

    </div>

</div>
