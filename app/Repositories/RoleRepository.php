<?php


namespace App\Repositories;

use App\role;

class RoleRepository implements RoleRepositoryInterface
{
    public function get($role_id)
    {
        return Role::find($role_id);
    }
    
    public function all()
    {
        return Role::all();
    }
    
    public function delete($role_id)
    {
        return Role::destroy($role_id);
    }
    
    public function update($role_id, array $role_data)
    {
        return Role::find($role_id)->update($role_id);
    }
}