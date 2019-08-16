<?php

namespace App\Repositories;

use App\Contract\VoteRepositoryInterface;
use App\Models\Vote;
use Auth;
use Illuminate\Http\Request;

/**
 * Class VoteRepository
 * @package App\Repositories
 */
class VoteRepository implements VoteRepositoryInterface
{
    public function find(int $id)
    {
        return Vote::get()->where('event_id', $id);
    }

    public function create(Request $request)
    {
        return Vote::create($request->all());
    }
}