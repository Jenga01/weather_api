<?php
namespace App\Repositories;

use App\Repositories\Interfaces\WeatherRepositoryInterface;
use App\Models\Weather;


class WeatherRepository implements WeatherRepositoryInterface
{
    protected $weather;

    public function getWeather()
    {
        return $this->weather->all();
    }
}
