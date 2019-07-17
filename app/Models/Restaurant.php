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
    public function event_Restaurants(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

    /**
     * Function used to remove events from database
     *
     * @param int $id
     * @return bool
     */
    public function remove_Restaurant(int $id): bool
    {
        $restaurant = $this->find($id);
        if ($restaurant) {
            $restaurant->event_Restaurants()->detach();
            $restaurant->delete();
            return true;
        }
        return false;
    }
}
