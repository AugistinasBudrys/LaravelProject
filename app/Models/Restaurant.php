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
        'work_time_from',
        'work_time_to',
        'phone_number',
        'URL'
    ];

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
    public function getAddressAttribute(): string
    {
        return $this->attributes['address'];
    }

    /**
     * @return string
     */
    public function getDescriptionAttribute(): string
    {
        return $this->attributes['description'];
    }

    /**
     * @return string
     */
    public function getWorkTimeFromAttribute(): string
    {
        return $this->attributes['work_time_from'];
    }

    /**
     * @return string
     */
    public function getWorkTimeToAttribute(): string
    {
        return $this->attributes['work_time_to'];
    }

    /**
     * @return string
     */
    public function getPhoneNumberAttribute(): string
    {
        return $this->attributes['phone_number'];
    }

    /**
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return $this->attributes['URL'];
    }
    /**
     * @param string $name
     * @return void
     */
    public function setNameAttribute(string $name): void
    {
        $this->attributes['name'] = str_replace('/string/', '', $name);
    }

    /**
     * @param string $address
     * @return void
     */
    public function setAddressAttribute(string $address): void
    {
        $this->attributes['address'] = str_replace('/string/', '', $address);
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescriptionAttribute(string $description): void
    {
        $this->attributes['description'] = str_replace('/string/', '', $description);
    }

    /**
     * @param string $work_time_from
     * @return void
     */
    public function setWorkTimeFromAttribute(string $work_time_from): void
    {
        $this->attributes['work_time_from'] = str_replace('/time/', '', $work_time_from);
    }

    /**
     * @param string $work_time_to
     * @return void
     */
    public function setWorkTimeToAttribute(string $work_time_to): void
    {
        $this->attributes['work_time_to'] = str_replace('/time/', '', $work_time_to);
    }

    /**
     * @param string $phone_number
     * @return void
     */
    public function setPhoneNumberAttribute(string $phone_number): void
    {
        $this->attributes['phone_number'] = str_replace('/string/', '', $phone_number);
    }

    /**
     * @param string $url
     * @return void
     */
    public function setUrlAttribute(string $url): void
    {
        $this->attributes['URL'] = str_replace('/string/', '', $url);
    }

    /**
     * @return BelongsToMany
     */
    public function eventRestaurants(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

    /**
     * Function used to remove events from database
     *
     * @param int $id
     * @return bool
     */
    public function removeRestaurant(int $id): bool
    {
        $restaurant = $this->find($id);
        if ($restaurant) {
            $restaurant->eventRestaurants()->detach();
            $restaurant->delete();
            return true;
        }
        return false;
    }
}
