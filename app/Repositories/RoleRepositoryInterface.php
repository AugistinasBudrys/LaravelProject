<?php

namespace App\Repositories;

interface RoleRepositoryInterface
{
    /**
     * @param int $role_id
     * @return mixed
     */
    public function get(int $role_id);

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param int $role_id
     * @return mixed
     */
    public function delete(int $role_id);

    /**
     * @param int $role_id
     * @param array $role_data
     * @return mixed
     */
    public function update(int $role_id, array $role_data);
}