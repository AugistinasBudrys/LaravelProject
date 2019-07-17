<?php

namespace App\Contract;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface RestaurantRepositoryInterface
 * @package App\Contract
 */
interface RestaurantRepositoryInterface
{
    /**
     * @param int $pag
     * @return LengthAwarePaginator
     */
    public function paginate(int $pag): LengthAwarePaginator;

    /**
     * @param int $restaurantId
     * @return bool
     */
    public function removeRestaurant(int $restaurantId): bool;

    /**
     * @param Request $request
     * @return Restaurant
     */
    public function create(Request $request): Restaurant;

    /**
     * @return Restaurant[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all();

    /**
     * @param int $restaurantId
     * @return Restaurant
     */
    public function find(int $restaurantId): Restaurant;
}
