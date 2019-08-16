<?php

namespace App\Repositories;

use App\Contract\RestaurantRepositoryInterface;
use App\Models\Restaurant;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

/**
 * Class RestaurantRepository
 * @package App\Repositories
 */
class RestaurantRepository implements RestaurantRepositoryInterface
{
    /**
     * Splits the amount of restaurants shown on the page into different pages
     *
     * @param int $pag
     * @return LengthAwarePaginator
     */
    public function paginate(int $pag)//: LengthAwarePaginator
    {
        return Restaurant::get()->sortByDesc('created_at');
        //return Restaurant::paginate($pag);
    }

    /**
     * Removes restaurant entry
     *
     * @param int $restaurantId
     * @return bool
     */
    public function removeRestaurant(int $restaurantId): bool
    {
        $restaurant = new Restaurant();
        return $restaurant->removeRestaurant($restaurantId);
    }
    
    /**
     * @param array $params
     * @return Restaurant
     */
    public function create(array $params): Restaurant
    {
        return Restaurant::create($params);
    }

    /**
     * @return Restaurant[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all()
    {
        return Restaurant::all();
    }

    /**
     * @param int $restaurantId
     * @return Restaurant
     */
    public function find(int $restaurantId): Restaurant
    {
        return Restaurant::find($restaurantId);
    }
}
