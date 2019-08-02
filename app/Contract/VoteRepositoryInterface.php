<?php

namespace App\Contract;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface VoteRepositoryInterface
 * @package App\Contract
 */
interface VoteRepositoryInterface
{
    public function find(int $id);

    public function create(Request $request);
}