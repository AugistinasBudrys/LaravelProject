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
     * Returns all roles
     *
     * @return Role[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all()
    {
        return Role::all();
    }

    /**
     * Used in attaching user role to newly registered users
     *
     * @return Role
     */
    public function select(): Role
    {
        return Role::select('id')->where('name', 'user')->first();
    }
}