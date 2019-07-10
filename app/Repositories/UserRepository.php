<?php


namespace App\Repositories;

use App\User;

class UserRepository implements UserRepositoryInterface
{
    public function find($user_id)
    {
        return User::find($user_id);
    }
    
    public function all()
    {
        return User::all();
    }
    
    public function delete($user_id)
    {
        return User::destroy($user_id);
    }
    
    public function update($user_id, array $user_data)
    {
        return User::find($user_id)->update($user_data);
    }
    
    public function paginate(int $pag)
    {
        return User::paginate($pag);
    }
    
    
}