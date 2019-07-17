<?php

namespace App\Contract;

use App\Models\Event;
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
    public function removeEvent(int $eventId): bool;

    /**
     * @param Request $request
     * @return Event
     */
    public function create(Request $request): Event;
}
