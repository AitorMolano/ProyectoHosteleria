<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            'estado'=>'recibido',
            'created at' => Carbon::now(),
            'updated at' => Carbon::now()
            
        ]);
        DB::table('pedidos')->insert([
            'id_cliente' =>71,
            'suma_precio'=>31,
            'estado'=>'recibido',
            'created at' => Carbon::now(),
            'updated at' => Carbon::now()
        ]);
        DB::table('pedidos')->insert([
            'id_cliente' =>61,
            'suma_precio'=>31,
            'estado'=>'en proceso',
            'created at' => Carbon::now(),
            'updated at' => Carbon::now()
        ]);
    }
}
