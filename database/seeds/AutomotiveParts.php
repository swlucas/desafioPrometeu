<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\AutomotiveParts as Automotive;
use Faker\Factory as Faker;

class AutomotiveParts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($qtd = 0; $qtd < 30; $qtd ++ ){

            Automotive::create([
                'manufacturer' => $faker->company,
                'name' => $faker->name,
                'description' => $faker->text(20),
                'price' => $faker->numberBetween(1,100),
            ]);
        }
    }
}
