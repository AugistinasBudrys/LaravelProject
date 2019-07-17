<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Event
 * @package App\Models
 */
class Event extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'date',
        'name',
        'description'
    ];

    /**
     * @return BelongsToMany
     */
    public function event_Users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return BelongsToMany
     */
    public function restaurants(): BelongsToMany
    {
        return $this->belongsToMany(Restaurant::class);
    }

    /**
     * This function gets called when removing events
     *
     * @param int $id
     * @return bool
     */
    public function remove_Event( int $id): bool
    {
        $event = $this->find($id);
        if ($event) {
            $event->event_Users()->detach();
            $event->restaurants()->detach();
            $event->delete();
            return true;
        }
        return false;
    }
}
