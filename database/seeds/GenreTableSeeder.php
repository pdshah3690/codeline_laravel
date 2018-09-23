<?php

use Illuminate\Database\Seeder;
use App\Model\Genre;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::truncate();

        foreach (config('genre') as $g) {
            Genre::create(['name' => $g]);
        }
    }
}
