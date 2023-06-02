<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Http;

class TicketMasterService
{
    /**
     * @var Http
     */
    private Client $client;

    /**
     * @var string
     */
    private string $apiKey;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    /**
     * Make request.
     *
     * @param string $method
     * @param string $endpoint
     * @param array $query
     * @param array $params
     * @return array
     */
    protected function makeRequest(string $method, string $endpoint, array $query = [], array $params = [])
    {
        try {
            $response = $this->client->request($method, $endpoint, [
                'query' => $query + $this->client->getConfig('query'),
                'body' => json_encode($params)
            ]);
            return json_decode((string) $response->getBody(), true);
        } catch(GuzzleException $e) {
            \Log::error($e->getMessage());
        }
    }

    /**
     * @return string
     */
    private function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    private function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param int $zipcode
     * @return array
     */
    public function getEventsFromZipcode(int $zipcode): array
    {
        return $this->makeRequest('get', 'events', ['postalCode' => $zipcode]);
    }

    /**
     * @param string $city
     * @return array
     */
    public function getEventsFromCity(string $city = null, int $page = 1, $itemPerPage = 10): array
    {
        return $this->makeRequest('get', 'events', ['city' => $city, 'page' => $page, 'size' => $itemPerPage]);
    }

    /**
     * @param float $latitude
     * @param float $longitude
     * @param int $radius
     * @return array
     */
    public function getEventsFromLatLng(float $latitude, float $longitude, int $radius = 100): array
    {
        return $this->makeRequest('get', 'events', ['geoPoint' => $latitude . ',' . $longitude, 'radius' => $radius, 'unit' => 'km', 'size' => 10, 'page' => 2]);
    }
}
