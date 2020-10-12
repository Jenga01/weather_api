<?php
namespace App\Repositories;

use App\Repositories\Interfaces\WeatherRepositoryInterface;

class WeatherRepository implements WeatherRepositoryInterface
{
    protected $weather;

    public function getWeather()
    {
        return $this->weather->all();
    }
}
