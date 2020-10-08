<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function index(Request $request, $placecode)
    {
        try {
            
            $client = new Client([
                'base_uri' => 'https://api.meteo.lt/v1/',
            ]);

            $response = $client->request('GET', "places/$placecode/forecasts/long-term", [
                'query' => [
                    $placecode => $request->city,
                ],

            ]);
            if($response->getStatusCode() == 200) {
                return $response->getBody()->getContents();

            }
        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
