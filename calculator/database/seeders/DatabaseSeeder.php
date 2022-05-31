<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    static array $apartmentTypeSeederData = [
        ['name' => '1-комнатная квартира'],
        ['name' => '2-комнатная квартира'],
        ['name' => '3-комнатная квартира'],
        ['name' => '4-комнатная квартира'],
        ['name' => '5-комнатная квартира'],
        ['name' => 'Сарай'],
    ];

    static array $apartmentSeederData = [
        [
            'name' => 'Уютная квартира в жилом комплексе Шоколад',
            'price' => 7000000,
            'apartment_type_id' => 1
        ],
        [
            'name' => ' Интересная квартира в жилом комплексе Новострой',
            'price' => 3000000,
            'apartment_type_id' => 2
        ],
        [
            'name' => '3-комн. кв., 99,52 м², 9 этаж',
            'price' => 4000000,
            'apartment_type_id' => 3
        ],
        [
            'name' => 'Быстрый выход на сделку!',
            'price' => 10000000,
            'apartment_type_id' => 4
        ],
        [
            'name' => '5-комн. кв., 1199,52 м², 10 этаж',
            'price' => 100000000,
            'apartment_type_id' => 5
        ],
        [
            'name' => '5-комн. кв., 222,52 м², 9/10 этаж',
            'price' => 5000000,
            'apartment_type_id' => 5
        ],
        [
            'name' => 'Уютный сарай в центре Москвы',
            'price' => 9000000,
            'apartment_type_id' => 6
        ],
    ];

    static array $mortgageSeederData = [
        [
            'name' => 'Выгодное ипотечное предложение',
            'rate' => 10,
            'max_years' => 20,
            'initial_fee' => 10
        ],
        [
            'name' => 'Ипотечное предложение 1',
            'rate' => 11,
            'max_years' => 22,
            'initial_fee' => 15
        ],
        [
            'name' => 'Ипотечное предложение 2',
            'rate' => 10,
            'max_years' => 20,
            'initial_fee' => 50
        ],
        [
            'name' => 'Ипотечное предложение 3',
            'rate' => 10,
            'max_years' => 20,
            'initial_fee' => 10
        ],
        [
            'name' => 'Ипотечное предложение 4',
            'rate' => 10,
            'max_years' => 20,
            'initial_fee' => 10
        ],
        [
            'name' => 'Ипотечное предложение 5',
            'rate' => 11,
            'max_years' => 20,
            'initial_fee' => 19
        ],
        [
            'name' => 'Ипотечное предложение 6',
            'rate' => 16,
            'max_years' => 10,
            'initial_fee' => 80
        ],
    ];
    static array $mortgageApartmentSeederData = [
        ['apartment_id' => 1, 'mortgage_id' => 1],
        ['apartment_id' => 1, 'mortgage_id' => 2],
        ['apartment_id' => 1, 'mortgage_id' => 3],
        ['apartment_id' => 2, 'mortgage_id' => 1],
        ['apartment_id' => 3, 'mortgage_id' => 4],
        ['apartment_id' => 4, 'mortgage_id' => 5],
        ['apartment_id' => 4, 'mortgage_id' => 6],
        ['apartment_id' => 4, 'mortgage_id' => 5],
        ['apartment_id' => 5, 'mortgage_id' => 1],
        ['apartment_id' => 5, 'mortgage_id' => 2],
        ['apartment_id' => 6, 'mortgage_id' => 4],
        ['apartment_id' => 6, 'mortgage_id' => 5],
        ['apartment_id' => 6, 'mortgage_id' => 6],
        ['apartment_id' => 7, 'mortgage_id' => 1],
        ['apartment_id' => 7, 'mortgage_id' => 2],
        ['apartment_id' => 7, 'mortgage_id' => 3],
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$apartmentTypeSeederData as $apartmentTypeSeeder) {
            \App\Models\ApartmentType::factory()->create($apartmentTypeSeeder);
        }
        foreach (self::$apartmentSeederData as $apartmentTypeSeeder) {
            \App\Models\Apartment::factory()->create($apartmentTypeSeeder);
        }
        foreach (self::$mortgageSeederData as $apartmentTypeSeeder) {
            \App\Models\Mortgage::factory()->create($apartmentTypeSeeder);
        }
        foreach (self::$mortgageApartmentSeederData as $apartmentTypeSeeder) {
            \App\Models\ApartmentMortgage::factory()->create($apartmentTypeSeeder);
        }
    }
}
