<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    /**
     * @param int $user_id
     * @return mixed
     */
    public function find(int $user_id);

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param int $user_id
     * @return mixed
     */
    public function delete(int $user_id);

    /**
     * @param int $user_id
     * @param array $user_data
     * @return mixed
     */
    public function update(int $user_id, array $user_data);

    /**
     * @param int $pag
     * @return mixed
     */
    public function paginate(int $pag);
}