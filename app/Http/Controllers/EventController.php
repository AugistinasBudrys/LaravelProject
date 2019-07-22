<?php

namespace App\Http\Controllers;

use App\Contract\RestaurantRepositoryInterface;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use App\Contract\EventRepositoryInterface;
use App\Contract\UserRepositoryInterface;
use Auth;

/**
 * Class EventController
 * @package App\Http\Controllers
 */
class EventController extends Controller
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

    /**
     * EventController constructor.
     * @param EventRepositoryInterface $event
     * @param UserRepositoryInterface $user
     * @param RestaurantRepositoryInterface $restaurant
     */
    public function __construct(
        EventRepositoryInterface $event,
        UserRepositoryInterface $user,
        RestaurantRepositoryInterface $restaurant
    )
    {
        $this->event = $event;
        $this->user = $user;
        $this->restaurant = $restaurant;
    }

    /**
     * Returns the view of the event index page
     * View: events/index.blade
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('events.index', [
            'events' => $this->event->getEvents(4)
        ]);
    }

    /**
     * Function for removing events
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        if ($this->event->deleteEvent($id) === true) {
            return redirect()
                ->route('events.index')
                ->with('success', 'Event has been deleted');
        }
        return redirect()
            ->route('events.index')
            ->with('warning', 'This event cannot be deleted');
    }

    /**
     * Returns the view of the event creation page
     * View: events/create.blade
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('events.create')->with('events');
    }

    /**
     * Stores new event into database
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'name' => 'required',
            'description' => 'required',
            'address' => 'required'
        ]);

        $this->event->create($request);

        return redirect()->route('events.index');
    }

    /**
     * Returns the view of the event edit
     * View: events/edit.blade
     *
     * @param Event $event
     * @return Renderable
     */
    public function edit(Event $event): Renderable
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Updates the event entries in the database
     *
     * @param Request $request
     * @param Event $event
     * @return RedirectResponse
     */
    public function update(Request $request, Event $event): RedirectResponse
    {
        $request->validate([
            'date' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        $event->update($request->all());

        return redirect()->route('events.index');
    }

    /**
     * returns event description view
     * View: events/description.blade.php
     *
     * @param int $id
     * @return Renderable
     */
    public function moreInfo(): Renderable
    {
        return view('events.description');
    }

    /**
     * @param int $event_id
     * @return RedirectResponse
     */
    public function join(int $event_id): RedirectResponse
    {

        if ($this->event->joinEvent($event_id)) {
            return redirect()->route('events.description', [
                'event' => $this->event->find($event_id)
            ])->with('success', 'you have left :(');
        }
        return redirect()->route('events.description', [
            'event' => $this->event->find($event_id)
        ])->with('success', 'you have successfully joined \(*.*)/');
    }
    
    public function add()
    {
        return view('events.addevent');
    }
    
    public function r_create()
    {
        return view('events.create');
    }
}
