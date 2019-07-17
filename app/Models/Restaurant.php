<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Restaurant
 * @package App\Models
 */
class Restaurant extends Model
{
    /**
     * @var array 
     */
    protected $fillable = [
        'name',
        'address',
        'description',
        'work_time',
        'phone_number'
    ];

    /**
     * @return BelongsToMany
     */
    public function event_restaurants(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

    /**
     * function used to remove events from database
     *
     * @param $id
     * @return bool
     */
    public function Remove_restaurant($id): bool
    {
        $restaurant = $this->find($id);
        if ($restaurant) {
            $restaurant->event_restaurants()->detach();
            $restaurant->delete();
            return true;
        }
        return false;
    }
}
