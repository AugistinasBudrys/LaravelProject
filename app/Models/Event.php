<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

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
     * @return string
     */
    public function getDateAttribute(): string
    {
        return $this->attributes['date'];
    }

    /**
     * @return string
     */
    public function getNameAttribute(): string
    {
        return $this->attributes['name'];
    }

    /**
     * @return string
     */
    public function getDescriptionAttribute(): string
    {
        return $this->attributes['description'];
    }
    public function setDateAttribute()
    {
        $this->get()->sortBy('date');
    }

    /**
     * @return BelongsToMany
     */
    public function eventUsers(): BelongsToMany
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
    public function removeEvent( int $id): bool
    {
        $event = $this->find($id);
        if ($event) {
            $event->eventUsers()->detach();
            $event->restaurants()->detach();
            $event->delete();
            return true;
        }
        return false;
    }
}
