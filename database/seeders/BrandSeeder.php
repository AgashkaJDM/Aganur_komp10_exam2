<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Toyota',
            'Nissan',
            'Honda',
            'Mazda',
            'Subaru',
            'Mitsubishi',
            'Suzuki',
            'Lexus',
            'Acura',
            'Infiniti',
            'Daihatsu',
            'Isuzu',
            'Hino',
            'Scion',
            'Datsun',
            'UD Trucks',
            'Mitsuoka',
            'Tommy Kaira',
            'ASpark',
            'Dome',
            'Prince',
            'Ohta Jidosha',
            'Kurogane',
            'Tama',
            'Cony',
            'Autozam',
            'Eunos',
            'Efini',
            'Scion',
            'Gorham',
            'Jiotto',
            'Mikasa Motors',
            'Hope',
            'Kyosho',
            'Libra Motors',
            'Wakisaka',
            'Yamato',
            'Tanaka Industries',
            'Shinari',
            'Chiyoda',
            'Sankyo',
            'Hakuyosha',
            'Yokohama',
            'Yue Loong',
            'Fuji Precision Industry',
            'Shatai',
            'Afeela',
            'Toray Industries',
            


            
        ];

        foreach ($brands as $brand) {
            Brand::create(['name' => $brand]);
        }
    }
}
