@extends('layout.template')
@section('title')
Detalle de cita | Bufette Torrez
@endsection
@section('content')


  <section class="content">
    <!-- Main content -->
    <section class="invoice">
    	    <!-- title row -->
          @if (Session::has('message'))
 <p class="alert alert-info"><b>{{ Session::get('message')}}</b></p>
@endif


       <div class="col-md-12">
          <!-- Widget: user widget style 1 -->



                  <!-- ./col -->
                  <div class="col-md-12 small-box bg-aqua">
                    <!-- small box -->

                      <div class="inner">
                         <div class="widget-user-header bg-aqua">
                        <!--<div class="widget-user-image image">
                          <img class="img-circle responsive" src="../dist/img/Sin_foto.png" alt="User Avatar">
                        </div>-->
                        <br><br><br><br>
                        <!-- /.widget-user-image -->
 
                        <span class="widget-user-username" style="font-size: 40px"> <b>Caso: {{$cita->caso->proceso}} </b></span>
                        <br><br>
                      </div>

                        
                        <div class="pull-left">
	                       <p><b>Fecha</b></p>
	                       <p>{{$cita->fecha}}</p>


	                       <p><b>Cliente</b></p>
	                       <p>{{$cita->cliente->nombre}} {{$cita->cliente->apellido}}</p>



                        </div>

                 

                        <div class="pull-right">
                          <p><b>Prioridad</b></p>
                          <p>{{$cita->prioridad}}</p>
               
                          <p><b>Solicitante</b></p>
                          <p>{{$cita->encargado->nombre}} {{$cita->encargado->apellido}}</p>


                        </div>





                        <br><br><br>


                      </div>



                  </div>


                  <!-- ./col -->

                  <!-- ./col -->

          
            <div class="row">

            	{!! $cita->motivo!! }
                
               
            </div>


           
        </div>


     

       
        <div class="box-body">

           <a href="{{route('citas.index')}}" class="btn btn-default  btn-flat pull-right"><b>Regresar listado de citas</b></a>
     

        </div>
       


  


</section>

</section>


@stop