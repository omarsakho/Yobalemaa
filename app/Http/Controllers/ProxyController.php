<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProxyController extends Controller
{
    public function getDistance(Request $request)
    {
        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?' . http_build_query($request->all());

        $client = new \GuzzleHttp\Client();
        $response = $client->get($url);

        return $response->getBody();
    }
}
