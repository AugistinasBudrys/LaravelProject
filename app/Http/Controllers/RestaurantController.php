<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use App\Contract\RestaurantRepositoryInterface;
use App\Contract\EventRepositoryInterface;
use Illuminate\Support\Facades\URL;
use mysql_xdevapi\Exception;

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
        return view('restaurants.index')->with('restaurants',
            $this->restaurant->paginate(20));
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
        return view('restaurants.create');
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
            'URL' => 'required',
            'logo' => 'required',
            'images' => 'required'
        ]);
        try {
            $parameters = $request->all();
            $logo = $request->logo->store('img');
            $parameters['logo'] = URL::to('/') . '/storage/' . $logo;
            //$imageName = time().'.'.request()->image->getClientOriginalExtension();
            //$imageName = time() . '.' . 'test';
            //request()->image->move(public_path('images'), $imageName);
            //dd($request);
            /*foreach ($request->images as $image) {
                $image_name = $request->image->store('img');
                $parameters['image'] = URL::to('/') . '/storage/' . $image_name;
            }*/
            
            foreach ($request->images as $image) {
                $image_name = $image->store('img');
//                $parameters['images'] = URL::to('/') . '/storage/' . $image_name;
                $img_array[] = URL::to('/') . '/storage/' . $image_name;;
            }
            
            $image = new Restaurant();
            $parameters['images'] = json_encode($img_array);
//            dd(json_encode($img_array));exit;
            $this->restaurant->create($parameters);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        
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
    
    public function moreRestaurantInfo(int $id): Renderable
    {
        $restaurant = $this->restaurant->find($id);
        $images = json_decode($restaurant->images);
        return view('restaurants.description', [
            'restaurant' => $restaurant,
            'images' => $images
        ]);
    }
}
