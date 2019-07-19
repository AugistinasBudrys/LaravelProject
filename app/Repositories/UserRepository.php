<?php

namespace App\Repositories;

use App\Contract\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository implements UserRepositoryInterface
{
    /**
     * Finds the id and returns it
     *
     * @param int $user_id
     * @return User
     */
    public function find(int $user_id): User
    {
        return User::find($user_id);
    }

    /**
     * Gets the id and returns it
     *
     * @param int $user_id
     * @return User
     */
    public function get(int $user_id): User
    {
        return User::get($user_id);
    }

    /**
     * Returns all users
     *
     * @return User[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all()
    {
        return User::all();
    }

    /**
     * Used in deleting a user and his related role entry
     *
     * @param int $user_id
     * @return bool
     */
    public function remove(int $user_id): bool
    {
        $user = new User();
        return $user->remove($user_id);
    }

    /**
     * Used in updating users roles in database
     *
     * @param int $user_id
     * @param array $user_data
     * @return User
     */
    public function update(int $user_id, array $user_data): User
    {
        return User::find($user_id)->update($user_data);
    }

    /**
     * Used for limiting the amount of users seen on screen
     *
     * @param int $pag
     * @return LengthAwarePaginator
     */
    public function paginate(int $pag): LengthAwarePaginator
    {
        return User::paginate($pag);
    }

    /**
     * Used in new user registration
     *
     * @param array $user_data
     * @return User
     */
    public function create(array $user_data): User
    {
        return User::create([
            'name' => $user_data['name'],
            'email' => $user_data['email'],
            'password' => Hash::make($user_data['password'])
        ]);
    }
}