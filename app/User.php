<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\RedirectResponse;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\role');
    }

    /**
     * @param $role
     * @return bool
     */
    public function hasAnyRole($role):bool
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function Remove(int $id): bool
    {
        $user = User::find($id);
        if ($user) {
            $user->roles()->detach();
            $user->delete();
            return true;
        }
        return false;
    }

    public function events()
    {
        return $this->belongsToMany('App\event');
    }
}
