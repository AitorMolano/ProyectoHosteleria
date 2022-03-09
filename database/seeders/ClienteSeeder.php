<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ES_es');

        for ($i=0; $i < 5; $i++) { 
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => $faker->password(),
                'telefono' => $faker-> phoneNumber(),
                'rol' => $faker->boolean(false),
                'direccion' => $faker->address(),
                'remember_token' => $faker->text(10),
            ]);
        }
    }
}
