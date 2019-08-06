<?php

namespace App\Repositories;

use App\Contract\VoteRepositoryInterface;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class VoteRepository
 * @package App\Repositories
 */
class VoteRepository implements VoteRepositoryInterface
{
    /**
     * @param int $id
     * @return Collection
     */
    public function find(int $id): Collection
    {
        return Vote::get()->where('event_id', $id);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request): Vote
    {
        return Vote::create($request->all());
    }

    /**
     * @return Vote[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all()
    {
        return Vote::all();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function firstOrCreate(Request $request): Vote
    {
        return Vote::firstOrCreate([
            'event_id' => $request->event_id,
            'restaurant_id' => $request->restaurant_id,
            'user_id' => $request->user_id
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function deleteVote(Request $request): int
    {
        return Vote::where(['event_id' => $request->event_id,
            'user_id' => $request->user_id])->delete();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function checkVote(Request $request)
    {
        return Vote::where(['event_id' => $request->event_id, 'user_id' => $request->user_id])->first();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function doubleCheck(Request $request)
    {
        return Vote::where([
            'event_id' => $request->event_id,
            'restaurant_id' => $request->restaurant_id,
            'user_id' => $request->user_id
        ])->first();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateVote(Request $request): int
    {
        return Vote::where(['event_id' => $request->event_id, 'user_id' => $request->user_id])->update($request->all());
    }
}