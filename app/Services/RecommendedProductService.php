<?php
namespace App\Services;

use Illuminate\Http\Request;

class RecommendedProductService
{
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getRecommendedProduct(Request $request, $placecode)
    {
        $meteoData = new MeteoDataService();
        $response = $meteoData->getMeteoData($request, $placecode);

        try {

            if ($response->getStatusCode() == 200) {
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

                $conditionData = [
                    $conditionDataDay1 = $this->productService->getProduct($condition[0]),
                    $conditionDataDay2 = $this->productService->getProduct($condition[1]),
                    $conditionDataDay3 = $this->productService->getProduct($condition[2]),
                ];

                return [
                    'city' => $placecode,
                    [
                        'recommendations',

                        [
                            'date' => $date[0],
                            $conditionData[0]

                        ],

                        [
                            'date' => $date[1],
                            $conditionData[1]
                        ],

                        [
                            'date' => $date[2],
                            $conditionData[2]
                        ],

                    ]
                ];
            }
        }
        catch
        (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
