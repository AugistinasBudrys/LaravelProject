<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class defaultController extends Controller
{
    public function index(): Renderable
    {
        return view('default.index');
    }
}
