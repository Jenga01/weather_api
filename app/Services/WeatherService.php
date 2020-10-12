<?php
namespace App\Services;

use App\Repositories\WeatherRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Weather;

class WeatherService
{
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getWeather(Request $request, $placecode)
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

                $date = [
                    $day1 = $contents['forecastTimestamps'][0]['forecastTimeUtc'],
                    $day2 = $contents['forecastTimestamps'][24]['forecastTimeUtc'],
                    $day3 = $contents['forecastTimestamps'][48]['forecastTimeUtc']
                ];

                $condition = [
                    $weatherDay1 = $contents['forecastTimestamps'][0]['conditionCode'],
                    $weatherDay2 = $contents['forecastTimestamps'][24]['conditionCode'],
                    $weatherDay3 = $contents['forecastTimestamps'][48]['conditionCode'],
                ];

                $recommendedProduct = $this->productService->getProduct($condition[0]);
                $recommendedProduct2 = $this->productService->getProduct($condition[1]);
                $recommendedProduct3 = $this->productService->getProduct($condition[2]);


                return  [
                    'city' => $placecode,
                   [
                       'recommendations',

                    [
                        'date' => $date[0],
                        'city' => $placecode,
                        'product' => $recommendedProduct

                    ],


                    [
                        'date' => $date[1],
                        'city' => $placecode,
                        'product' => $recommendedProduct2
                    ],

                    [
                        'date' => $date[2],
                        'city' => $placecode,
                        'product' => $recommendedProduct3
                    ],

                        ]
                    ];

            }
        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}
