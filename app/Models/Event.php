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

    /**
     * @param string $date
     * @return void
     */
    public function setDateAttribute(string $date): void
    {
        $this->attributes['date'] = str_replace("/date/", "", $date);
    }

    /**
     * @param string $name
     * @return void
     */
    public function setNameAttribute(string $name): void
    {
        $this->attributes['name'] = str_replace("/string/", "", $name);
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescriptionAttribute(string $description): void
    {
        $this->attributes['description'] = str_replace("/string/", "", $description);
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
    public function removeEvent(int $id): bool
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
