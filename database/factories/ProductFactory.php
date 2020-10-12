<?php
namespace Database\Factories;

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */



    public function definition()
    {

        {
            return [
                'name' => $this->faker->words(3, true),
                'sku' => $this->faker->unique()->numerify('ABC###'),
                'price' => $this->faker->randomFloat(2, 10, 100),

            ];

        }
    }
}
