<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'event_id',
        'restaurant_id'
    ];

    public function getEventIdAttribute()
    {
        return $this->attributes['event_id'];
    }
    public function getRestaurantIdAttribute()
    {
        return $this->attributes['restaurant_id'];
    }
    public function getUserIdAttribute()
    {
        return $this->attributes['user_id'];
    }

    public function setEventIdAttribute(string $event_id): void
    {
        $this->attributes['event_id'] = str_replace('/integer/', '', $event_id);
    }

    public function setRestaurantIdAttribute(string $restaurant_id): void
    {
        $this->attributes['restaurant_id'] = str_replace('/integer/', '', $restaurant_id);
    }

    public function setUserIdAttribute(string $user_id): void
    {
        $this->attributes['user_id'] = str_replace('/integer/', '', $user_id);
    }

}
