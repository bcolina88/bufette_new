@extends('layout.template')
@section('title')
Vaciar BD | Bufette Torrez
@endsection
@section('content')


<div class="container">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">

            <br><br><br><br><br><br><br><br><br><br>

            <div class="panel panel-default" >
                <div class="panel-heading">Vaciar Base de Datos</div>

                <div class="panel-body">

                    <div style="text-align: center;font-size: 16px;" >Se vaciaran las siguientes tablas: Audiencias, Casos, Citas y Expedientes.</div>

                    <form class="form-horizontal" method="POST" action="{{ route('vaciar') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <br>
                            <div style="text-align: center;">
                                <button type="submit" class="btn btn-primary">
                                    Vaciar Base de Datos 
                                </button>
                            </div>
                            <br><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="advertencia" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        
        <div class="modal-body" >

            <br><br>
            <div class="swal-title">La base de datos fue vaciada con exito.</div>

            <br><br>
        </div>
        <div class="modal-footer">

           <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>

   
        </div>
      </div>
    </div>
  </div>



@section('javascript')
<script>


$(function () {


        @if ($responsebd)

          $('#advertencia').modal('toggle'); 

        @endif



      /*  swal({
              title: 'El Password fue cambiando con exito.',
              text: "Debe salir del sistema y usar su nuevo password.",
              
              icon: 'warning',
              buttons: {
                confirm: {
                  text: "Salir",
                  value: true,
                  visible: true
                }
              }
            }).then((result) => {
              if (result) {
                window.location.href = "{{ route('logout') }}";

                //var vv =  $('[name="_token"]').val();

                //console.log


               // var url = '{{ route("logout", ":slug") }}';
               // url = url.replace(':slug',vv);
               // window.location.href=url;



                
              }
            });





        






        swal({
              title: 'No coinciden Password y Confirm',
              
              icon: 'warning',
              buttons: {
    
                cancel: {
                  text: "Salir",
                  value: false,
                  visible: true
                }
              }
            }).then((result) => {});

            */



        



    



});

</script>
   
@endsection




@endsection
