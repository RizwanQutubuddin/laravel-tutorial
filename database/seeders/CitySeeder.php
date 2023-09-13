<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities=[
            [
                'cityName'=>'Delhi',
            ],
        [
            'cityName'=>'Mumbai',
        ],
        [
            'cityName'=>'Chennai',
        ]];

        // dd($cities);$city
        foreach ($cities as $key => $city) {
        
            City::create(
                [
                    'cityName'=>$city["cityName"],
                ]
            );
        }
    }
}
