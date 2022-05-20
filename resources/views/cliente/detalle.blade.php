@extends('layout.template')
@section('title')
Detalle de cliente | Bufette 
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
                        <span class="widget-user-username" style="font-size: 40px"> <b>{{$cliente->nombre}} {{$cliente->apellido}} </b></span>
                        
                     <br><br>
                      </div>

                      

                        <div>
                          <div class="pull-left">
                      

                            <p><b>Telefono</b></p>
                              <p>
                                @if($cliente->telefono == null) 
                                  N/D
                              @else
                                 {{$cliente->telefono}} 
                              @endif

                             </p>

                              <p><b>Email</b></p>
                            <p>

                              @if($cliente->email == null) 
                                  N/D
                              @else
                                 {{$cliente->email}} 
                              @endif


                            </p>
                          </div>

                          <div class="pull-right">
                            

                            <p><b>Ciudad</b></p>
                            <p>

                             @if($cliente->ciudad == null) 
                                  N/D
                              @else
                                 {{$cliente->ciudad}} 
                              @endif

                           </p>
                          </div>


                         
                        </div>

       


                        <br><br><br>


                      </div>



                  </div>


                  <!-- ./col -->

                  <!-- ./col -->

           
          <!-- /.widget-user -->
        </div>


     

       
        <div class="box-body">

            <a href="{{route('clientes.index')}}" class="btn btn-default  btn-flat pull-right"><b>Regresar listado de clientes</b></a>
     
        </div>
       


  


</section>

</section>


@stop