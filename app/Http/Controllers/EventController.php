<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request, string $city = null)
    {
        return inertia()->render('event/index')
            ->with('city', $city);
    }
}
