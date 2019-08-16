<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Vote extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'event_id',
        'restaurant_id',
        'user_id'
    ];

    /**
     * @return mixed
     */
    public function getEventIdAttribute(): string
    {
        return $this->attributes['event_id'];
    }

    /**
     * @return mixed
     */
    public function getRestaurantIdAttribute(): string
    {
        return $this->attributes['restaurant_id'];
    }

    /**
     * @return mixed
     */
    public function getUserIdAttribute(): string
    {
        return $this->attributes['user_id'];
    }

    /**
     * @param string $event_id
     * @return void
     */
    public function setEventIdAttribute(string $event_id): void
    {
        $this->attributes['event_id'] = str_replace('/integer/', '', $event_id);
    }

    /**
     * @param string $restaurant_id
     * @return void
     */
    public function setRestaurantIdAttribute(string $restaurant_id): void
    {
        $this->attributes['restaurant_id'] = str_replace('/integer/', '', $restaurant_id);
    }

    /**
     * @param string $user_id
     * @return void
     */
    public function setUserIdAttribute(string $user_id): void
    {
        $this->attributes['user_id'] = str_replace('/integer/', '', $user_id);
    }
}
