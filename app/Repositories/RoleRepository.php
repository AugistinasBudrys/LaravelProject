<?php


namespace App\Repositories;

use App\Contract\RoleRepositoryInterface;
use App\Models\Role;

/**
 * Class RoleRepository
 * @package App\Repositories
 */
class RoleRepository implements RoleRepositoryInterface
{
    /**
     * returns all
     *
     * @return Role[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all()
    {
        return Role::all();
    }

    /**
     * used in attaching user role to newly registered users
     *
     * @return string
     */
    public function select(): string
    {
       return Role::select('id')->where('name', 'user')->first();
    }
}