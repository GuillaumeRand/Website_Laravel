<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/*
• eat (location [, constraints]) -> list of available restaurants
    TripAdvisor (https://developer-tripadvisor.com/content-api/)
 */

class EatController extends Controller
{
    public function __invoke()
    {
        dd("EatController");
    }
}
