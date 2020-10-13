<?php
namespace App\Repositories;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MeteoDataService implements Interfaces\ResponseInterface
{
    public function getMeteoData(Request $request, $placecode)
    {
        $client = new Client([
            'base_uri' => 'https://api.meteo.lt/v1/',
        ]);

        $response = $client->request('GET', "places/$placecode/forecasts/long-term", [
            'query' => [
                $placecode => $request->city,
            ],

        ]);
        return $response;
    }
}
