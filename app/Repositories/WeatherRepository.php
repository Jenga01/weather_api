<?php
namespace App\Repositories;

use App\Repositories\Interfaces\WeatherRepositoryInterface;

class WeatherRepository implements WeatherRepositoryInterface
{
    protected $weather;

    public function getRecommendedProduct()
    {
        return $this->weather->all();
    }
}
