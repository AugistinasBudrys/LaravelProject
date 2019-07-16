<?php

namespace App\Contract;

/**
 * Interface RoleRepositoryInterface
 * @package App\Repositories
 */
interface RoleRepositoryInterface
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @return mixed
     */
    public function select();
}