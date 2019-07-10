<?php

namespace App\Repositories;

interface RoleRepositoryInterface
{
    public function get($role_id);
    
    public function all();
    
    public function delete($role_id);
    
    public function update($role_id, array $role_data);
}