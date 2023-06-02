<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/*
• travel (location [, constraints]) -> list of available transports
 */

class TravelController extends Controller
{
    public function __invoke()
    {
        dd("TravelController");
    }
}
