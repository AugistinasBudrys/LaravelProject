<?php

namespace App\Contract;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Vote;

/**
 * Interface VoteRepositoryInterface
 * @package App\Contract
 */
interface VoteRepositoryInterface
{
    /**
     * @param int $id
     * @return Collection
     */
    public function find(int $id): Collection;

    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request): Vote;

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param Request $request
     * @return mixed
     */
    public function firstOrCreate(Request $request): Vote;

    /**
     * @param Request $request
     * @return mixed
     */
    public function deleteVote(Request $request): int;

    /**
     * @param Request $request
     * @return mixed
     */
    public function checkVote(Request $request);

    /**
     * @param Request $request
     * @return mixed
     */
    public function doubleCheck(Request $request);

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateVote(Request $request): int;
}