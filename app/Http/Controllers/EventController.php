<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use App\Contract\EventRepositoryInterface;
use App\Contract\UserRepositoryInterface;

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
     * EventController constructor.
     * @param EventRepositoryInterface $event
     * @param UserRepositoryInterface $user
     */
    public function __construct(EventRepositoryInterface $event, UserRepositoryInterface $user)
    {
        $this->event = $event;
        $this->user = $user;
    }

    /**
     * Returns the view of the event index page
     * View: events/index.blade
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('events.index', ['events' => $this->event->getEvents(4)]);
    }

    /**
     * Function for removing events
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        if ($this->event->deleteEvent($id) === true)
            return redirect()
                ->route('events.index')
                ->with('success', 'Event has been deleted');
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
            'name' => 'required',
            'description' => 'required'
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
     * @return Renderable
     */
    public function moreInfo(): Renderable
    {
        return view('events.moreInfo');
    }
}
