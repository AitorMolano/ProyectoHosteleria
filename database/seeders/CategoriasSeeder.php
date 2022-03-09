<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre'=>'fritos',
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'entrantes',
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'pescado',
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'carne',
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'semifrios',
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'tarta de bizcocho',
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'tarta de hojaldre',
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'tartas variadas',
        ]);
        
        DB::table('categorias')->insert([
            'nombre'=>'variedades',
        ]);
    }
}
