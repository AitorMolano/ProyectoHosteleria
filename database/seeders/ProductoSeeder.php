<?php

namespace Database\Seeders;

use Faker\Provider\es_ES\Text;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ES_es');

        for ($i=0; $i < 10; $i++) { 
            DB::table('productos')->insert([
                'nombre' => $faker->unique()->title(18),
                'precio' => $faker->randomNumber(2),
                'descripcion' => $faker->text(90),
                'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
                'cantidadMinima' => $faker->randomNumber(10),
            ]);
        }
    }
}
