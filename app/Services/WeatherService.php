<?php
namespace App\Services;

use App\Repositories\WeatherRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WeatherService
{
    public function __construct(WeatherRepository $weather)
    {
        $this->weather = $weather;
    }
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
                $contents = json_decode($response->getBody(), true);

                $weatherArray = [
                    $day1 = $contents['forecastTimestamps'][0]['forecastTimeUtc'],
                    $day2 = $contents['forecastTimestamps'][24]['forecastTimeUtc'],
                    $day3 = $contents['forecastTimestamps'][48]['forecastTimeUtc'],
                    $weatherDay1 = $contents['forecastTimestamps'][0]['conditionCode'],
                    $weatherDay2 = $contents['forecastTimestamps'][24]['conditionCode'],
                    $weatherDay3 = $contents['forecastTimestamps'][48]['conditionCode'],
                ];

                return  [
                    'city' => $placecode,
                    [
                        'date' => $day1,
                        'city' => $placecode,
                        'current_weather' => $weatherDay1,
                    ],

                    [
                        'date' => $day2,
                        'city' => $placecode,
                        'current_weather' => $weatherDay2,
                    ],

                    [
                        'date' => $day3,
                        'city' => $placecode,
                        'current_weather' => $weatherDay3,
                    ]
                        ];

            }
        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
