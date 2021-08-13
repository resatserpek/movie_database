<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::truncate();
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 5; $i++) {
            Movie::create([
                'title' => $faker->sentence,
                'description'=>$faker->sentences($nb = 3, $asText = true),
                'image'=> $faker->imageUrl( $width = 100, $height = 80, 'people', true) ,
                'year' => $faker->year($max = 'now'),
                'rank' => $faker->numberBetween(1,5) 
            ]);
        }
    }
}
