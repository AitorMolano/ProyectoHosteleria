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
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('pedidos')->insert([
            'id_cliente' =>71,
            'suma_precio'=>31,
            'estado'=>'recibido',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('pedidos')->insert([
            'id_cliente' =>61,
            'suma_precio'=>31,
            'estado'=>'en proceso',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('pedidos')->insert([
            'id_cliente' =>71,
            'suma_precio'=>17.40,
            'estado'=>'recibido',
            'created_at' => Carbon::now()->subMonths(5),
            'updated_at' => Carbon::now()->subMonths(5)
        ]);
        DB::table('pedidos')->insert([
            'id_cliente' =>21,
            'suma_precio'=>17.40,
            'estado'=>'recibido',
            'created_at' => Carbon::now()->subMonths(4),
            'updated_at' => Carbon::now()->subMonths(4)
        ]);
        DB::table('pedidos')->insert([
            'id_cliente' =>51,
            'suma_precio'=>17.40,
            'estado'=>'recibido',
            'created_at' => Carbon::now()->subMonths(11),
            'updated_at' => Carbon::now()->subMonths(11)
        ]);
        DB::table('pedidos')->insert([
            'id_cliente' =>61,
            'suma_precio'=>17.40,
            'estado'=>'recibido',
            'created_at' => Carbon::now()->subMonths(1),
            'updated_at' => Carbon::now()->subMonths(1)
        ]);
    }
}
