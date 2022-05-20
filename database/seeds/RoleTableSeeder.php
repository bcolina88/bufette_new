<?php

use App\Model\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create([
            'tipo'=> 'Administrador',
        ]);

        Role::create([
            'tipo'=> 'Abogado',
        ]);

        Role::create([
            'tipo'=> 'Secretario',
        ]);
       
       
       
    }
}
