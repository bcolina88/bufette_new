<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cliente;
use DB;
use Session;


class ClientesController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */


    private   $photos_path = "documentos";

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


        $clientes = Cliente::Where('clientes.nombre','LIKE','%'.$search.'%')
                      ->orWhere('clientes.apellido','LIKE','%'.$search.'%')
                      ->orWhere('clientes.email','LIKE','%'.$search.'%')
                      ->orWhere('clientes.ciudad','LIKE','%'.$search.'%')
                      ->orWhere('clientes.telefono','LIKE','%'.$search.'%')
                      ->orderBy('clientes.id','DESC')
                      ->select('clientes.*')
                      ->paginate(25);

        return view('cliente.listado', compact('clientes'));




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        $client = [];
        $tipo = "guardar";
        return view('cliente.crear',compact('client','tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data= request()->validate([
            'nombre' => 'min:4|max:255|required',
            'apellido' => 'min:4|max:255|required',
            'email' => 'min:4|max:255|required|email|unique:users,email,',


        ]);



        if($request->tipo === "guardar"){



            $cliente = cliente::firstOrCreate([
             'nombre'          => $request->nombre,
             'apellido'        => $request->apellido,
             'email'           => $request->email, 
             'ciudad'          => $request->ciudad,
             'telefono'        => $request->telefono,

            ]);



            $cliente->save();

            session::flash('message','El cliente fue creado correctamente');
            return redirect(route('clientes.index')); 

        }  


        if($request->tipo === "editar"){ 



                        $cliente = cliente::find($request->id);



                        $cliente->fill([
                         'nombre'          => $request->nombre,
                         'apellido'        => $request->apellido,
                         'email'           => $request->email, 
                         'ciudad'          => $request->ciudad,
                         'telefono'        => $request->telefono,


                        ]);



                        $cliente->save();

                        session::flash('message','El cliente fue actualizado correctamente');
                        return redirect(route('clientes.index')); 



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


        $cliente = cliente::find($id);

        return view('cliente.detalle', compact('cliente'));
    }


    public function profile($id)
    {


        $cliente = cliente::find($id);

        return view('cliente.detalle', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $client = cliente::find($id);
        $tipo = "editar";

        return view('cliente.editar', compact('client','tipo'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $data= request()->validate([
            'nombre' => 'min:4|max:255|required',
            'apellido' => 'min:4|max:255|required',
            'email' => 'min:4|max:255|required|email|unique:users,email,'.$id,

        ]);



        if($request->tipo === "guardar"){





            $cliente = cliente::firstOrCreate([
             'nombre'          => $request->nombre,
             'apellido'        => $request->apellido,
             'email'           => $request->email, 
             'ciudad'          => $request->ciudad,
             'telefono'        => $request->telefono,


            ]);



            $cliente->save();

            session::flash('message','El cliente fue creado correctamente');
            return redirect(route('clientes.index')); 

        }  


        if($request->tipo === "editar"){ 



                            $cliente = cliente::find($id);


                            $cliente->fill([
                             'nombre'          => $request->nombre,
                             'apellido'        => $request->apellido,
                             'ciudad'          => $request->ciudad,
                             'telefono'        => $request->telefono,
                             'email'           => $request->email,

                            ]);

                            $cliente->save();

                            session::flash('message','El cliente fue actualizado correctamente');
                            return redirect(route('clientes.index')); 



         

            


        } 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        cliente::destroy($id);
        session::flash('message','El cliente fue eliminado correctamente');
        return redirect(route('clientes.index')); 
    }



    
}
