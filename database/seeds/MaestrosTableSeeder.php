<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class MaestrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      DB::table('maestros')
          ->insert([
          			[ 'titulo' => 'Escritorio', 'idpadre' => 1, 'ruta' => 'home', 'tipo' => 'ver'],
                    [ 'titulo' => 'Clientes', 'idpadre' => 2, 'ruta' => 'clientes', 'tipo' => 'ver'],
                    [ 'titulo' => 'Citas', 'idpadre' => 3, 'ruta' => 'citas', 'tipo' => 'ver'],
                    [ 'titulo' => 'Expedientes', 'idpadre' => 4, 'ruta' => 'expedientes', 'tipo' => 'ver'],
                    [ 'titulo' => 'Casos', 'idpadre' => 5, 'ruta' => 'casos', 'tipo' => 'ver'],
                    [ 'titulo' => 'Audiencias', 'idpadre' => 6, 'ruta' => 'audiencias', 'tipo' => 'ver'],
                    [ 'titulo' => 'Configuracion', 'idpadre' => 7, 'ruta' => '', 'tipo' => 'ver'],
                    [ 'titulo' => 'Usuarios', 'idpadre' => 8, 'ruta' => 'usuarios', 'tipo' => 'agregar'],
                    [ 'titulo' => 'Roles', 'idpadre' => 9, 'ruta' => 'roles', 'tipo' => 'ver'],
                    [ 'titulo' => 'Cambio de contraseña', 'idpadre' => 10, 'ruta' => 'resetPassword', 'tipo' => 'ver'],
       
                 
                ]);
    }
}
