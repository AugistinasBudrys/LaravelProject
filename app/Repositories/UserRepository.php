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
     * finds the id and returns it
     *
     * @param int $user_id
     * @return User
     */
    public function find(int $user_id): User
    {
        return User::find($user_id);
    }

    /**
     * gets the id and returns it
     *
     * @param int $user_id
     * @return User
     */
    public function get(int $user_id): User
    {
        return User::get($user_id);
    }

    /**
     * returns all users
     *
     * @return User[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all()
    {
        return User::all();
    }

    /**
     * used in deleting a user and his related role entry
     *
     * @param int $user_id
     * @return bool|mixed
     */
    public function remove(int $user_id)
    {
        $user = new User();
        return $user->remove($user_id);
    }

    /**
     * used in updating users roles in database
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
     * used for limiting the amount of users seen on screen
     *
     * @param int $pag
     * @return LengthAwarePaginator
     */
    public function paginate(int $pag): LengthAwarePaginator
    {
        return User::paginate($pag);
    }

    /**
     * used in new user registration
     *
     * @param array $user_data
     * @return array
     */
    public function create(array $user_data): User
    {
        return User::create([
            'name' => $user_data['name'],
            'email' => $user_data['email'],
            'password' => Hash::make($user_data['password']),
        ]);
    }
}