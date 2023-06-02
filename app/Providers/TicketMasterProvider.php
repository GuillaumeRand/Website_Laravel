<?php

namespace App\Providers;

use App\Services\TicketMasterService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class TicketMasterProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TicketMasterService::class, function () {
            $client = new Client([
                'base_uri' => config('services.ticketmaster.baseUri'),
                'query' => [
                    'apikey' => config('services.ticketmaster.key'),
                    'countryCode' => 'FR',
                    'locale' => 'fr',
                    'size' => 10,
                ],
            ]);

            return new TicketMasterService($client);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [TicketMasterService::class];
    }
}
