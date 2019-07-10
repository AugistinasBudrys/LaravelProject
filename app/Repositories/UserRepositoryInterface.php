<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function find($user_id);
    
    public function all();
    
    public function delete($user_id);
    
    public function update($user_id, array $user_data);
    
    public function paginate(int $pag);
}