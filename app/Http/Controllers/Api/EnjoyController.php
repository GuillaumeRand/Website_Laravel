<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EnjoyRequest;
use App\Providers\TicketMasterProvider;
use App\Services\TicketMasterService;
use Illuminate\Http\Request;

/*
• enjoy (location [, constraints]) -> list of existing events|activities
    TicketMaster (https://www.ticketmaster.fr/fr/resultat?ipSearch=montpellier)
    TripAdvisor (https://developer-tripadvisor.com/content-api/)
*/

class EnjoyController extends Controller
{
    public function __invoke(EnjoyRequest $request, TicketMasterService $ticketMaster)
    {
        $eventsCity = $ticketMaster->getEventsFromCity($request->get('search'), $request->get('page'));

        if (!isset($eventsCity['_embedded']['events']) || !isset($eventsCity['page']))
            return response('No events has been found', 404);

        return response()->json([
            'events' => $eventsCity['_embedded']['events'],
            'pagination' => $eventsCity['page'],
        ]);
    }
}
