<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Weather;
use App\Services\RecommendedProductService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $recommendedProduct;

    public function __construct(RecommendedProductService $recommendedProduct)
    {
        $this->recommendedProduct = $recommendedProduct;
    }

    public function index(Request $request, $placecode)
    {
        $weatherProduct = $this->recommendedProduct->getRecommendedProduct($request, $placecode);

        return $weatherProduct;
    }

}
