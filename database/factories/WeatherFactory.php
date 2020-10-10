<?php
namespace Database\Factories;

use App\Models\Weather;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeatherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Weather::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        {
            return [
                'condition' =>$this->faker->unique()->randomElement([
                    'clear',
                    'isolated-clouds',
                    'scattered-clouds',
                    'overcast',
                    'light-rain',
                    'moderate-rain',
                    'heavy-rain',
                    'sleet',
                    'light-snow',
                    'moderate-snow',
                    'heavy-snow',
                    'fog',
                    'na',
                ])
                ];
        }
    }
}
