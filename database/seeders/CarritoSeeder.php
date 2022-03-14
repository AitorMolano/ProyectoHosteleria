<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carritos')->insert([
            'id_producto'=>2,
            'id_pedido'=>1,
        ]);
        DB::table('carritos')->insert([
            'id_producto'=>3,
            'id_pedido'=>1,
        ]);
        DB::table('carritos')->insert([
            'id_producto'=>4,
            'id_pedido'=>1,
        ]);

        DB::table('carritos')->insert([
            'id_producto'=>34,
            'id_pedido'=>2,
        ]);
        DB::table('carritos')->insert([
            'id_producto'=>32,
            'id_pedido'=>2,
        ]);

        DB::table('carritos')->insert([
            'id_producto'=>32,
            'id_pedido'=>3,
        ]);
        
    }
}
