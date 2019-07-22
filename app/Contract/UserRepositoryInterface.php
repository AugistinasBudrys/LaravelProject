<?php

namespace App\Contract;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface UserRepositoryInterface
 * @package App\Contract
 */
interface UserRepositoryInterface
{
    /**
     * @param int $userId
     * @return User
     */
    public function find(int $userId): User;

    /**
     * @param int $userId
     * @return User
     */
    public function get(int $userId): User;

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all();

    /**
     * @param int $userId
     * @return bool
     */
    public function remove(int $userId): bool;

    /**
     * @param int $userId
     * @param array $userData
     * @return User
     */
    public function update(int $userId, array $userData): User;

    /**
     * @param int $pag
     * @return LengthAwarePaginator
     */
    public function paginate(int $pag): LengthAwarePaginator;

    /**
     * @param array $userData
     * @return User
     */
    public function create(array $userData): User;

    /**
     * @return User
     */
    public function current(): User;
}