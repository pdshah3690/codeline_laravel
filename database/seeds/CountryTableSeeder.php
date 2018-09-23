<?php

use Illuminate\Database\Seeder;
use App\Model\Country;
class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();

        foreach (config('country') as $c) {
            Country::create(['name' => $c['name'], 'code' => $c['code']]);
        }
    }
}
