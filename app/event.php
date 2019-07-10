<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    public function eventusers()
    {
        return $this->belongsToMany('App\User');
    }
    public function Remove($id)
    {
        $event = event::find($id);
        if ($event) {
            $event->eventusers()->detach();
            $event->delete();
            return true;
        }
        return false;
    }
}
