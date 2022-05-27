<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use App\Model\User;
use App\Model\Caso;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        date_default_timezone_set("America/Chicago");

        $casos_mes = Caso::whereMonth('fecha',now()->month)->get();
        $dinero_mes = Caso::whereMonth('fecha',now()->month)->where('estado','=','Ganado')->sum('tarifa');
        $casos_ganados_mes = Caso::whereMonth('fecha',now()->month)->where('estado','=','Ganado')->get();
        $casos_fallidos_mes = Caso::whereMonth('fecha',now()->month)->where('estado','=','Fallido')->get();
        $casos_en_disputa_mes = Caso::whereMonth('fecha',now()->month)->where('estado','=','En disputa')->get();


        $total_casos_mes           = count($casos_mes);
        $total_casos_ganados_mes   = count($casos_ganados_mes);
        $total_casos_fallidos_mes  = count($casos_fallidos_mes);
        $total_casos_en_disputa_mes = count($casos_en_disputa_mes);
    

        return view('dashboard.index', compact('total_casos_en_disputa_mes','total_casos_mes','total_casos_ganados_mes','total_casos_fallidos_mes','dinero_mes'));

    }

    public function logout()
    {
      Auth::logout();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {


        return redirect(route('home'));

    }

    public function cambiarPassword(Request $request)
    {

        $email = Auth::user()->email;
        $change=false;
        $errorr="false";
        return view('auth.passwords.password', compact('change','email','errorr'));

    }


    public function resetPass(Request $request)
    {


        $email = Auth::user()->email;
        $change=false;
        $errorr="false";


        $user = User::find(Auth::user()->id);

        if (!$request->password || !$request->confirmation || $request->password !== $request->confirmation) {
            $errorr = "true";

            return view('auth.passwords.password', compact('change','email','errorr'));

        }

        // update password
        //$fields = array_merge(['password' => bcrypt($request->password)]);


        $user->fill([
            'password' => bcrypt($request->password),
        ]);

        $user->save();

        //$user->update($fields);
        $change=true;




        return view('auth.passwords.password', compact('change','email','errorr'));
    }

    public function resetBD(Request $request)
    {
       
       $responsebd = false;
       return view('auth.passwords.vaciar', compact('responsebd'));
    }


    public function vaciar()
    {
        $this->truncateTables([
            'audiencias',
            'casos',
            'citas',
            'expedientes',
            'notificaciones'
        ]);

        $responsebd = true;
        return view('auth.passwords.vaciar', compact('responsebd'));

  
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
