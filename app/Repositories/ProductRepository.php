<?php
namespace App\Repositories;

class ProductRepository implements Interfaces\ProductInterface
{
    protected $product;

    public function getProduct()
    {
        return $this->product->all();
    }
}
