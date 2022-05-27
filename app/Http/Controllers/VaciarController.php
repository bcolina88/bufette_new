<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use App\Model\User;

class VaciarController extends Controller
{
    
    public function run()
    {
        $this->truncateTables([
            'audiencias',
            'casos',
            'citas',
            'expedientes',
            'notificaciones'
        ]);
  
        // Ejecutar los seeders:
        //$this->call(ProfessionSeeder::class);
    }

    public function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }


}
