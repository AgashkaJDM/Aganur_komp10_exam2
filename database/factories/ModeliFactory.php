<?php

namespace Database\Factories;

use App\Models\Modeli;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;

/**
 * @extends Factory<Modeli>
 */
class ModeliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brand = Brand::inRandomOrder()->first();
        return [
            'name'=>fake()->word(),
            'brand_id'=>$brand->id,
        ];
    }
}
