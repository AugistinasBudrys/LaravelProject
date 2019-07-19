<?php

namespace App\Contract;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface EventRepositoryInterface
 * @package App\Contract
 */
interface EventRepositoryInterface
{
    /**
     * @param int $pag
     * @return LengthAwarePaginator
     */
    public function paginate(int $pag): LengthAwarePaginator;

    /**
     * @param int $eventId
     * @return bool
     */
    public function deleteEvent(int $eventId): bool;

    /**
     * @param Request $request
     * @return Event
     */
    public function create(Request $request): Event;

    /**
     * @param int $id
     * @return Event
     */
    public function find(int $id): Event;

    /**
     * @param int $num
     * @return Collection
     */
    public function getEvents(int $num): Collection;
}
