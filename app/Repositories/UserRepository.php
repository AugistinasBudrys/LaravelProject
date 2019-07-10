<?php


namespace App\Repositories;

use App\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param int $user_id
     * @return User
     */
    public function find(int $user_id): User
    {
        return User::find($user_id);
    }

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all()
    {
        return User::all();
    }

    /**
     * @param int $user_id
     * @return int|mixed
     */
    public function delete(int $user_id)
    {
        return User::destroy($user_id);
    }

    /**
     * @param int $user_id
     * @param array $user_data
     * @return User
     */
    public function update(int $user_id, array $user_data): User
    {
        return User::find($user_id)->update($user_data);
    }

    /**
     * @param int $pag
     * @return User
     */
    public function paginate(int $pag): User
    {
        return User::paginate($pag);
    }
    
    
}