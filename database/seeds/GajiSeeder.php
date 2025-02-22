<?php

use Illuminate\Database\Seeder;
use App\GajiPegawai;
use Faker\Factory as Faker;

class GajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 100; $i++) {
            GajiPegawai::insert([
            'nama' => $faker->name,
            'gajipokok' => $faker->numberBetween(1000000,10000000),
            'gajiumr' => $faker->numberBetween(1000000,10000000)
        ]);
        }
    }
}
