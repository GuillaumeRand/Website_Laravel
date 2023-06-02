<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/*
• sleep (location [, constraints]) -> list of available accommodations
    TripAdvisor (https://developer-tripadvisor.com/content-api/)
 */

class SleepController extends Controller
{
    public function __invoke()
    {
        dd("SleepController");
    }
}
