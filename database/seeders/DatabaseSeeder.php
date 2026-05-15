<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Aganur Parahadow',
            'username' => 'agashka_jdm',
            'password' => bcrypt('12345678')
        ]);
        $this->call([
            \Database\Seeders\BrandSeeder::class,
            \Database\Seeders\ModelSeeder::class,
            \Database\Seeders\CarSeeder::class,
        ]);
        
        \App\Models\Car::factory(1)->create();
        \App\Models\Brand::factory(1)->create();
        \App\Models\Modeli::factory(1)->create();
        // \App\Models\Year::factory(1)->create();
    }
}
