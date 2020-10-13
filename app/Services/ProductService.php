<?php
namespace App\Services;

use App\Models\Weather;


class ProductService
{
    public function getProduct($condition)
    {
       return Weather::with('products:name,sku,price')->where('condition', $condition)->cacheFor(300)->get(); //query cached for 5mins
    }
}
