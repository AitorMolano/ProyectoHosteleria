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

        //FRITOS

        DB::table('productos')->insert([
            'nombre' => 'Croquetas de hongos',
            'precio' => 5.30,
            'descripcion' => 'Croquetas de hongos',
            'foto' => 'img/croquetas_hongos.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 2,
            'categoria' => 1,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Croquetas de jamon iberico',
            'precio' => 5.30,
            'descripcion' => 'Croquetas de jamon iberico',
            'foto' => 'img/croquetas.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 2,
            'categoria' => 1,
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Croquetas de txipiron',
            'precio' => 5.30,
            'descripcion' => 'Croquetas de txipiron',
            'foto' => 'img/croquetas-de-chipiron.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 2,
            'categoria' => 1,
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Tigres',
            'precio' => 5.70,
            'descripcion' => 'Mejillones rellenos',
            'foto' => 'img/tigre.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 12,
            'categoria' => 1,
        ]);

        //ENTRANTES

        DB::table('productos')->insert([
            'nombre' => 'Escalibada de verduras',
            'precio' => 7.80,
            'descripcion' => 'Escalibada de verduras con ventresca de bonito',
            'foto' => 'img/escalibada.png',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 2,
            'categoria' => 1,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Canelones rellenos de espinacas y hongos',
            'precio' => 4.10,
            'descripcion' => 'Canelones rellenos de espinacas y hongos',
            'foto' => 'img/canelones.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 2,
            'categoria' => 2
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Pencas de acelga rellenas de paleta de Basatxerri',
            'precio' => 4.50,
            'descripcion' => 'Pencas de acelga rellenas de paleta de Basatxerri',
            'foto' => 'img/pencas.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 2,
            'categoria' => 2
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Piquillos rellenos de merluza y gambas',
            'precio' => 5.20,
            'descripcion' => 'Piquillos rellenos de merluza y gambas',
            'foto' => 'img/piquillos.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 2,
            'categoria' => 2,
        ]);

        //PESCADOS

        DB::table('productos')->insert([
            'nombre' => 'Bacalao a la bizkaina',
            'precio' => 10.20,
            'descripcion' => 'Bacalao a la bizkaina',
            'foto' => 'img/bacalao.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 2,
            'categoria' => 3,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Bacalao ajoarriero con langostinos',
            'precio' => 8.60,
            'descripcion' => 'Bacalao ajoarriero con langostinos',
            'foto' => 'img/bacalao-langostino.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 2,
            'categoria' => 3,
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Chipirones en su tinta',
            'precio' => 6.80,
            'descripcion' => 'Chipirones en su tinta',
            'foto' => 'img/chipirones.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 2,
            'categoria' => 3,
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Kokotxas de bacalao con gulas',
            'precio' => 11.50,
            'descripcion' => 'Kokotxas de bacalao con gulas',
            'foto' => 'img/kokotxas.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 2,
            'categoria' => 3,
        ]);


        //CARNES

        DB::table('productos')->insert([
            'nombre' => 'Albóndigas de pollo en salsa verde',
            'precio' => 4.80,
            'descripcion' => 'Albóndigas de pollo en salsa verde',
            'foto' => 'img/albondigas.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 2,
            'categoria' => 4,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Carrilleras ibéricas al Rioja Alavesa',
            'precio' => 6.80,
            'descripcion' => 'Carrilleras ibéricas al Rioja Alavesa',
            'foto' => 'img/carrilleras.jfif',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 2,
            'categoria' => 4,
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Lengua rellena de Idiazabal y salsa agridulce',
            'precio' => 5.60,
            'descripcion' => 'Lengua rellena de Idiazabal y salsa agridulce',
            'foto' => 'img/lengua.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 2,
            'categoria' => 4,
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Callos y morros de ternera en salsa bizkaina',
            'precio' => 6.80,
            'descripcion' => 'Callos y morros de ternera en salsa bizkaina',
            'foto' => 'img/callos.jfif',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 2,
            'categoria' => 4,
        ]);

        //SEMIFRIOS

        DB::table('productos')->insert([
            'nombre' => 'Delicia de arroz y canela',
            'precio' => 14,
            'descripcion' => 'Delicia de arroz y canela',
            'foto' => 'img/delicia.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 5,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Mousse de chocolate',
            'precio' => 15,
            'descripcion' => 'Mousse de chocolate',
            'foto' => 'img/mousse.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 5,
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Charlota de crema',
            'precio' => 15,
            'descripcion' => 'Charlota de crema',
            'foto' => 'img/charlota.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 5,
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Bavarroi de frutas',
            'precio' => 15,
            'descripcion' => 'Bavarroi de frutas',
            'foto' => 'img/bavarroi.jfif',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 5,
        ]);


        //TARTAS DE BIZCOCHO

        DB::table('productos')->insert([
            'nombre' => 'Brazo de gitano de chocolate',
            'precio' => 15,
            'descripcion' => 'Brazo de gitano de chocolate',
            'foto' => 'img/brazo.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 6,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Brazo de gitano de yema',
            'precio' => 15,
            'descripcion' => 'Brazo de gitano de yema',
            'foto' => 'img/brazo-yema.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 6,
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Brazo de gitano de nata',
            'precio' => 15,
            'descripcion' => 'Brazo de gitano de nata',
            'foto' => 'img/brazo-nata.jfif',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 6,
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Brazo de gitano de crema',
            'precio' => 15,
            'descripcion' => 'Brazo de gitano de crema',
            'foto' => 'img/brazo-crema.jfif',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 6,
        ]);

        //TARTAS DE HOJALDRE

        DB::table('productos')->insert([
            'nombre' => 'Milhojas de nata',
            'precio' => 17,
            'descripcion' => 'Milhojas de nata',
            'foto' => 'img/milhojas.jfif',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 7,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Milhojas de crema',
            'precio' => 17,
            'descripcion' => 'Milhojas de crema',
            'foto' => 'img/milhojas-crema.jfif',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 7,
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Tarta Gasteiz',
            'precio' => 14,
            'descripcion' => 'Tarta Gasteiz',
            'foto' => 'img/gasteiz.jfif',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 7,
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Banda de manzana',
            'precio' => 14,
            'descripcion' => 'Banda de manzana',
            'foto' => 'img/banda.jfif',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 7,
        ]);

        //TARTAS VARIADAS

        DB::table('productos')->insert([
            'nombre' => 'Tarta de manzana',
            'precio' => 12,
            'descripcion' => 'Tarta de manzana',
            'foto' => 'img/tarta-manzana.jfif',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 8,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Tatín de frutas',
            'precio' => 12,
            'descripcion' => 'Tatín de frutas',
            'foto' => 'img/tarta-fruta.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 8,
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Pastel vasco',
            'precio' => 12,
            'descripcion' => 'Pastel vasco',
            'foto' => 'img/pastel-vasco.jpg',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 8,
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Tarta de queso cocida',
            'precio' => 13,
            'descripcion' => 'Tarta de queso cocida',
            'foto' => 'img/tarta-queso.jfif',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 8,
        ]);

        //VARIEDADES

        DB::table('productos')->insert([
            'nombre' => 'Rosquillas Fritas',
            'precio' => 11,
            'descripcion' => 'Rosquillas Fritas',
            'foto' => 'img/rosquillas.jfif',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 6,
            'categoria' => 9,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Pastas',
            'precio' => 18,
            'descripcion' => 'Pastas (cajas de 600 gramos)',
            'foto' => 'img/pastas.jfif',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 1,
            'categoria' => 9,
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Galletas cookies',
            'precio' => 15,
            'descripcion' => 'Galletas cookies',
            'foto' => 'img/cookie.jfif',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 6,
            'categoria' => 9,
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Polvorones',
            'precio' => 15,
            'descripcion' => 'Polvorones',
            'foto' => 'img/polvoron.jfif',
            'disponible' => $faker->boolean($chanceOfGettingTrue = 70),
            'cantidadMinima' => 10,
            'categoria' => 9,
        ]);


    }
}
