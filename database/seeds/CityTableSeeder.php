<?php

use App\Models\City;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
        	'Banteay Meanchey',
        	'Battambang',
        	'Kampong Cham',
        	'Kampong Chhnang',
        	'Kampong Speu',
        	'Kampong Thom',
        	'Kampot',
        	'Kandal',
        	'Kep',
        	'Koh Kong',
        	'Kratie',
        	'Mondul Kiri',
        	'Oddar Meanchey',
        	'Pailin',
        	'Phnom Penh',
        	'Preah Sihanouk',
        	'Preah Vihear',
        	'Prey Veng',
        	'Pursat',
        	'Ratanak Kiri',
        	'Siemreap',
        	'Stung Treng',
        	'Svay Rieng',
        	'Takeo',
        	'Tboung Khmum',
        ];

        collect($cities)->each(function ($name) {
            City::create([
                'name' => $name,
                'country_id' => 38,
            ]);
        });
    }
}
