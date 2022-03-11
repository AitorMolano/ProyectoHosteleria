<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedidos')->insert([
            'id_cliente' =>71,
            'suma_precio'=>17.40,
            'estado'=>'recibido'
        ]);
        DB::table('pedidos')->insert([
            'id_cliente' =>71,
            'suma_precio'=>31,
            'estado'=>'recibido'
        ]);
        DB::table('pedidos')->insert([
            'id_cliente' =>61,
            'suma_precio'=>31,
            'estado'=>'en proceso'
        ]);
    }
}
