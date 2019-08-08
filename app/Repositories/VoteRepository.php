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
     * gets the by the event id
     *
     * @param int $id
     * @return Collection
     */
    public function find(int $id): Collection
    {
        return Vote::get()->where('event_id', $id);
    }

    /**
     * creates requested votes
     *
     * @param Request $request
     * @return Vote
     */
    public function create(Request $request): Vote
    {
        return Vote::create($request->all());
    }

    /**
     * returns all
     *
     * @return Vote[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all()
    {
        return Vote::all();
    }

    /**
     * checks if a vote exists and if it doesnt creates it
     *
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
     * deletes a singular vote
     *
     * @param Request $request
     * @return mixed
     */
    public function deleteVote(Request $request): int
    {
        return Vote::where(['event_id' => $request->event_id,
            'user_id' => $request->user_id])->delete();
    }

    /**
     * checks if user has already voted
     *
     * @param Request $request
     * @return mixed
     */
    public function checkVote(Request $request)
    {
        return Vote::where(['event_id' => $request->event_id, 'user_id' => $request->user_id])->first();
    }

    /**
     * checks if a user has voted on the selected restaurant
     *
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
     * if user chooses to switch his vote updates the restaurant chosen
     *
     * @param Request $request
     * @return mixed
     */
    public function updateVote(Request $request): int
    {
        return Vote::where(['event_id' => $request->event_id, 'user_id' => $request->user_id])->update($request->all());
    }

    /**
     * used in removing all the votes of an event
     *
     * @param int $event_id
     * @return Vote
     */
    public function eventRemove(int $event_id): int
    {
        return Vote::where('event_id', $event_id)->delete();
    }

    /**
     * cleans up votes when a restaurant, event relationship is removed
     *
     * @param Request $request
     * @return int
     */
    public function voteClean(Request $request): int
    {
       foreach (Vote::where('event_id', $request->event_id)->get() as $vote){
          $num = 0;
          foreach($request->restaurant_id as $restaurant)
          if($vote->restaurant_id === $restaurant) $num++;
          if($num === 0) Vote::where('restaurant_id', $vote->restaurant_id)->delete();
      }
      return 0;
    }
}