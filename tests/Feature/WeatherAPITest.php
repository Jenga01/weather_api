<?php
namespace Tests\Feature;

use App\Models\Weather;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WeatherAPITest extends TestCase
{
    /** @test */
    public function weather_api_endpoint_call()
    {
        $placecode = 'vilnius';
        $response = $this->get( "/api/products/recommended/{$placecode}");
        $response->assertJson([
            'city' => $placecode
        ]);
        $response->assertStatus( 200);
    }

    /** @test */
    public function weather_belongs_to_many_products()
    {
        $weather = Weather::factory()->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $weather->products);
    }

    /** @test */
    public function returns_recommended_products()
    {
        $product = Weather::factory()->create();

        $placecode = 'vilnius';
        $response = $this->get( "/api/products/recommended/{$placecode}");
        $response->assertJson($product->products->toArray());
        $response->assertStatus(200);
    }
}
