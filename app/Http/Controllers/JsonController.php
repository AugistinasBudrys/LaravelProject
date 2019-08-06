<?php

namespace App\Http\Controllers;

use App\Contract\EventRepositoryInterface;
use App\Contract\RestaurantRepositoryInterface;
use App\Contract\UserRepositoryInterface;
use App\Contract\VoteRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JsonController extends Controller
{

    /**
     * @var EventRepositoryInterface
     */
    public $event;

    /**
     * @var UserRepositoryInterface
     */
    public $user;

    /**
     * @var RestaurantRepositoryInterface
     */
    public $restaurant;

    public $vote;

    /**
     * JsonController constructor.
     * @param EventRepositoryInterface $event
     * @param UserRepositoryInterface $user
     * @param RestaurantRepositoryInterface $restaurant
     * @param VoteRepositoryInterface $vote
     */
    public function __construct(
        EventRepositoryInterface $event,
        UserRepositoryInterface $user,
        RestaurantRepositoryInterface $restaurant,
        VoteRepositoryInterface $vote
    )
    {
        $this->event = $event;
        $this->user = $user;
        $this->restaurant = $restaurant;
        $this->vote = $vote;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function join(Request $request): JsonResponse
    {
        if ($this->event->joinEvent($request->data)) {
            $event = $this->event->find($request->data)->toArray();
            return response()->json($event);
        }
        $event = $this->event->find($request->data)->toArray();
        return response()->json($event);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addRestaurant(Request $request): JsonResponse
    {
        $event = $this->event->find($request->event_id);
        $event->restaurants()->sync($request->restaurant_id);
        return response()->json($event);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function Vote(Request $request): JsonResponse
    {
        $check = $this->vote->checkVote($request);
        if($check === null){
        $this->vote->firstOrCreate($request);
        return response()->json();}
        else if($this->vote->doubleCheck($request) !== null){
        $this->vote->deleteVote($request);
        return response()->json();
        }
        $this->vote->updateVote($request);
        return response()->json();
    }
}
