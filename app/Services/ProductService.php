<?php
namespace App\Services;

use App\Models\Weather;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductService
{

    public function getProduct($condition)
    {
       return Weather::with('products')->where('condition', $condition)->get();
    }

}
