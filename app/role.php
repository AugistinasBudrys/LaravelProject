<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class role
 * @package App
 */
class role extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
