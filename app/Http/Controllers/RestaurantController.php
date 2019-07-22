<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use App\Contract\RestaurantRepositoryInterface;
use App\Contract\EventRepositoryInterface;

/**
 * Class RestaurantController
 * @package App\Http\Controllers
 */
class RestaurantController extends Controller
{
    /**
     * @var RestaurantRepositoryInterface
     */
    public $restaurant;

    /**
     * @var EventRepositoryInterface
     */
    public $event;

    /**
     * RestaurantController constructor.
     * @param RestaurantRepositoryInterface $restaurant
     * @param EventRepositoryInterface $event
     */
    public function __construct(RestaurantRepositoryInterface $restaurant, EventRepositoryInterface $event)
    {
        $this->restaurant = $restaurant;
        $this->event = $event;
    }

    /**
     * Returns restaurant view
     * View: restaurants/index.blade
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('restaurants.index')->with('restaurants', $this->restaurant->paginate(10));
    }

    /**
     * Function for removing restaurants
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        if ($this->restaurant->removeRestaurant($id) === true) {
            return redirect()
                ->route('restaurants.index')
                ->with('success', 'Restaurant has been deleted');
        }
        return redirect()
            ->route('restaurants.index')
            ->with('warning', 'This restaurant cannot be deleted');
    }

    /**
     * Returns the view of the restaurant entry page
     * View: restaurants/create.blade
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('restaurants.create')->with('events');
    }

    /**
     * Stores new restaurant entry into database
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'work_time_from' => 'required',
            'work_time_to' => 'required',
            'phone_number' => 'required',
            'URL' => 'required'
        ]);

        $this->restaurant->create($request);

        return redirect()->route('restaurants.index');
    }

    /**
     * Edit restaurant entries view
     * View: restaurants/edit.blade
     *
     * @param Restaurant $restaurant
     * @return Renderable
     */
    public function edit(Restaurant $restaurant): Renderable
    {
        return view('restaurants.edit', compact('restaurant'));
    }

    /**
     * Update edited restaurant entries
     *
     * @param Request $request
     * @param Restaurant $restaurant
     * @return RedirectResponse
     */
    public function update(Request $request, Restaurant $restaurant): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'work_time' => 'required',
            'phone_number' => 'optional'
        ]);

        $restaurant->update($request->all());

        return redirect()->route('restaurants.index');
    }

    /**
     * @param int $restaurant_id
     * @param int $event_id
     * @return RedirectResponse
     */
    public function add(int $restaurant_id, int $event_id): RedirectResponse
    {
        $restaurant = $this->restaurant->find($restaurant_id);
        $restaurant->eventRestaurants()->attach($event_id);

        return redirect()->route('events.description', [
            'event' => $this->event->find($event_id),
            'restaurants' => $this->restaurant->all()
        ]);
    }
}
