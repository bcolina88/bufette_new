<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Role;
use App\Model\Caso;
use App\Model\Cita;
use App\Model\Expediente;
use App\Model\Cliente;
use Illuminate\Support\Facades\File;

use DB;
use Session;


class CitasController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */


    private   $photos_path = "documentos";
     


    //private   $photos_path = "documentos";

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        

        $search = $request->get('search');


        $citas = Cita::Join('clientes', function($f) use($search)
                    {
                        $f->on('clientes.id','=','citas.cliente_id');
                    
                    })->Join('users', function($f) use($search)
                    {
                        $f->on('users.id','=','citas.encargado_id');
                    
                    })->Join('casos', function($f) use($search)
                    {
                        $f->on('casos.id','=','citas.caso_id');
                    
                    })->orWhere('citas.fecha','LIKE','%'.$search.'%')
                      ->orWhere('citas.motivo','LIKE','%'.$search.'%')
                      ->orWhere('citas.prioridad','LIKE','%'.$search.'%')
                      ->orWhere('users.nombre','LIKE','%'.$search.'%')
                      ->orWhere('users.apellido','LIKE','%'.$search.'%')
                      ->orWhere('clientes.nombre','LIKE','%'.$search.'%')
                      ->orWhere('clientes.apellido','LIKE','%'.$search.'%')
                      ->orWhere('casos.proceso','LIKE','%'.$search.'%')
                      ->orderBy('citas.id','DESC')
                      ->select('citas.*')
                      ->paginate(25);

        return view('cita.listado', compact('citas'));
  




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        $cita = [];
        $tipo = "guardar";
        $abogados = user::where('idrole','!=',1)->get();
        $clientes = cliente::all();
        $casos = caso::all();

        return view('cita.crear',compact('abogados','tipo','cita','clientes','casos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $date = $date->format('Y-m-d');


        $images =  '';

        if($request->tipo === "guardar"){


        	/*if ($request->file('images')) {


                            $photos = $request->file('images');

                            if (!is_array($photos)) {
                                $photos = [$photos];
                            }

                            if (!is_dir($this->photos_path)) {
                                mkdir($this->photos_path, 0777);
                            }


                            for ($i = 0; $i < count($photos); $i++) {

                                $photo = $photos[$i];
                                $name = sha1(date('YmdHis') . str_random(30));
                                $save_name = $name . '.' . $photo->getClientOriginalExtension();
                                $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();

                                $photo->move($this->photos_path, $save_name);
                            
                               
                                //$src = url("/{$this->photos_path}/{$save_name}");
                                //$ruta = $request->root();
                                $src = $this->photos_path.'/'.$save_name;

                                $images = $src.','.$images;

                            }

            }*/




            $cita = Cita::firstOrCreate([
              		'fecha' => $request->fecha,
                    'motivo'  => $request->motivo,
                    'prioridad'      => $request->prioridad,
                    'cliente_id'   => $request->cliente_id,
                    'encargado_id'   => $request->encargado_id,
                    'caso_id'   => $request->caso_id,
                    'notificar'    => 1,


            ]);



            $cita->save();

            session::flash('message','La cita fue creada correctamente');
            return redirect(route('citas.index')); 


        }  


        if($request->tipo === "editar"){ 



        


                        $cita = Cita::find($request->id);



                        $cita->fill([
                         
                            'fecha' => $request->fecha,
		                    'motivo'  => $request->motivo,
		                    'prioridad'      => $request->prioridad,
		                    'cliente_id'   => $request->cliente_id,
		                    'encargado_id'   => $request->encargado_id,
		                    'caso_id'   => $request->caso_id,
		                    'notificar'    => $request->notificar,

                        ]);



                        $cita->save();

                        session::flash('message','La cita fue actualizada correctamente');
                        return redirect(route('citas.index')); 



           


        }




   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $cita =  Cita::with(['encargado','cliente','caso'])->where('id',$id)->first();
        return view('cita.detalle', compact('cita'));

    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        
        $cita = Cita::find($id);
       // $ruta = $request->root();
		$tipo = "editar";
        $abogados = user::where('idrole','=',2)->get();
        $clientes = cliente::all();
        $casos = caso::all();

        return view('cita.editar',compact('abogados','tipo','cita','clientes','casos'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    	//$Cita = Cita::find($id);
        //$periodo = explode(",", $Caso->documentos);


       /* for ($i=0; $i < count($periodo); $i++) { 

        	$ruta = $ruta = public_path().'/'.$periodo[$i];
		    File::delete($ruta);
        }*/

        Cita::destroy($id);
        session::flash('message','La cita fue eliminada correctamente');
        return redirect(route('citas.index')); 

    }

    public function word($id)
    {        

    	
      
        $caso = Caso::where('id', $id)->with('expediente')->first();


		$headers = array(
    		"Content-type"=>"application/vnd.openxmlformats-officedocument.wordprocessingml.document",
    		"Content-Disposition"=>"attachment;Filename=PLANTILLA_CASOS.doc"
    	);


    	$datos= '<p><b> Expediente:</b> '.$caso->expediente->numero.'</p>
    	         <p><b> Proceso:</b> '.$caso->proceso.'</p>';


    	$content = '<html>
					<head><meta charset="utf-8"></head>
				
					<body>
                        <p> '.$datos.' </p>
                        <p> '.$caso->descripcion.' </p>
					</body>
				    </html>';


        return \Response::make($content,200,$headers);
        
    }


    public function notificar($id)
    {
        
        $cita =  cita::where('id',$id)->first();

        $cita->fill([
            'notificar'    => 0,
		]);

        $cita->save();

        return view('cita.detalle', compact('cita'));

    }



    
}
