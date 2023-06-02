<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/*
• drink (location [, constraints]) -> list of available bars
    TripAdvisor (https://developer-tripadvisor.com/content-api/)
 */

class DrinkController extends Controller
{
    public function __invoke()
    {
        dd("DrinkController");
    }
}
