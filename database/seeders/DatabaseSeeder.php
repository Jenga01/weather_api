<?php
namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Weather;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(13)->create();
        $weathers = Weather::factory(13)->create();

        Weather::all()->each(function ($product) use ($weathers) {
            $product->products()->attach(
                $weathers->random(rand(1, 5))->pluck('id')->toArray()
            );
        });

    }
}
