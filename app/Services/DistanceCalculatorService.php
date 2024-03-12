<?php

namespace App\Services;

use GuzzleHttp\Client;

class DistanceCalculatorService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function calculateDistance($origin, $destination)
    {
        $apiKey = 'AIzaSyBufFsip-IBd1I0P7yoJuNI3NmWjde0Xno';
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=$origin&destinations=$destination&key=$apiKey";

        $response = $this->client->request('GET', $url);
        $data = json_decode($response->getBody(), true);

        // Extract distance data from API response
        $distance = $data['rows'][0]['elements'][0]['distance']['text'];

        return $distance;
    }
}
