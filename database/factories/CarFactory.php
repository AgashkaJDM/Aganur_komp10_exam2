<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brand = \App\Models\Brand::inRandomOrder()->first();
        $model = \App\Models\Modeli::inRandomOrder()->first();
        return [
            'brand_id' => $brand->id,
            'modeli_id' => $model->id,
            'name' => fake()->sentence(3),
            'year' => fake()->dateTimeBetween(),
            'description' => fake()->paragraph(),
            'engine' => fake()->bothify('# ??-??'),
            'wheel_drive' => fake()->randomElement(['FWD', 'RWD', 'AWD']),  
        ];
    }
}
