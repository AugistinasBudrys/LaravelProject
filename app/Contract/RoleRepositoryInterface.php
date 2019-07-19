<?php

namespace App\Contract;

use App\Models\Role;

/**
 * Interface RoleRepositoryInterface
 * @package App\Contract
 */
interface RoleRepositoryInterface
{
    /**
     * @return Role[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all();

    /**
     * @return Role
     */
    public function select(): Role;
}