<?php

namespace App\Http\Controllers\Admin;

use App\event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use \Illuminate\Http\RedirectResponse;

class eventcontroller extends Controller
{
    public function index(): view
    {
        return view('admin.events.index')->with('events', event::paginate(10));
    }

    public function destroy(int $id): redirectresponse
    {
        $event = new event();
        if ($event->remove($id) === true) {
            return redirect()->route('admin.events.index')->with('success', 'User has been deleted');
        } else {
            return redirect()->route('admin.events.index')->with('warning', 'this User cannot be deleted');
        }
    }
}
