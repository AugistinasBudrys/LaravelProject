<?php


namespace App\Repositories;

use App\role;

class RoleRepository implements RoleRepositoryInterface
{
    /**
     * @param int $role_id
     * @return role
     */
    public function get(int $role_id): role
    {
        return Role::find($role_id);
    }

    /**
     * @return role[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all()
    {
        return Role::all();
    }

    /**
     * @param int $role_id
     * @return int|mixed
     */
    public function delete(int $role_id)
    {
        return Role::destroy($role_id);
    }

    /**
     * @param int $role_id
     * @param array $role_data
     * @return role
     */
    public function update(int $role_id, array $role_data): role
    {
        return Role::find($role_id)->update($role_id);
    }
}