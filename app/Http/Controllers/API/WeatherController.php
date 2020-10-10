<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Weather;
use App\Services\WeatherService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;


class WeatherController extends Controller
{
    protected $weatherservice;

    public function __construct(WeatherService $weatherservice)
    {
        $this->weatherservice = $weatherservice;
    }

    public function index(Request $request, $postcode){

        $weather = $this->weatherservice->index($request, $postcode);

        return $weather;
    }

}
