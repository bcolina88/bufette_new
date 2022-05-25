<?php
use App\Model\User;
use App\Model\Cliente;

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
       'nombre' => 'admin',
       'apellido' => 'admin',
       'idrole'  => 1,
       'active'  => true,
       'email' => 'admin@admin.com',
       'password' => bcrypt('secret'),
       'ciudad'=> '',
       'telefono'=> '',

       ]);

       User::create([
       'nombre' => 'abogado',
       'apellido' => 'abogado',
       'idrole'  => 2,
       'active'  => true,
       'email' => 'abogado@abogado.com',
       'password' => bcrypt('secret'),
       'ciudad'=> '',
       'telefono'=> '',

       ]);

       User::create([
       'nombre' => 'abogado2',
       'apellido' => 'abogado2',
       'idrole'  => 2,
       'active'  => true,
       'email' => 'abogado2@abogado.com',
       'password' => bcrypt('secret'),
       'ciudad'=> '',
       'telefono'=> '',

       ]);

       Cliente::create([
       'nombre' => 'Cliente1',
       'apellido' => 'Cliente2',
       'email' => 'cliente1@gmail.com',
       'ciudad'=> '',
       'telefono'=> '',

       ]);


       Cliente::create([
       'nombre' => 'Cliente2',
       'apellido' => 'Cliente2',
       'email' => 'cliente2@gmail.com',
       'ciudad'=> '',
       'telefono'=> '',

       ]);
   

    }
}
