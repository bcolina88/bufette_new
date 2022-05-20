<section class="content">
<div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header">
                  <section class="content-header">
      <h1>
        Información personal <br>
  </section>
                  <hr>
                       <div class="row">
<div class="col-md-9">
  @if ($errors->any())
    <ul>
    <div class="alert alert-warning">
  <b>Corrige Los Siguientes Errores:</b>
  @foreach ($errors->all() as $error)
  <li>
  {{$error}}
</li>
@endforeach
</div>
</ul>

@endif
</div>
</div>
                </div><!-- /.box-header -->
                <!-- form start -->               
                <form role="form">
                  <div class="box-body">
                    <div class="col-md-12">
                    <div class="form-group">
                      
                    <div class="col-md-6">
                      <br>
                      <label for="exampleInputPassword1">Nombre</label> <span style="color: #E6674A;">*</span>
                 
                     {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
                    </div>

                   

                    <div class="col-md-6">
                      <br>
                      <label for="exampleInputPassword1">Apellido</label> <span style="color: #E6674A;">*</span>
                  
                       {!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Apellido', 'required']) !!}
                    </div>



                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Ciudad</label> <span style="color: #E6674A;">*</span>
                 
                     {!! Form::text('ciudad', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'required']) !!}
                    </div>



                 
                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Contraseña</label>   @if (!$user2)<span style="color: #E6674A;">*</span> @endif
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
                    </div>


                     <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Correo Elecronico</label> <span style="color: #E6674A;">*</span>
                      

                      {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com','required']) !!}


                    </div> 

                  
                    <div class="col-md-4">
                      <br>
                    <label for="exampleInputPassword1">Rol</label>  <span style="color: #E6674A;">*</span>

                         
                        <select class="form-control select2" id="idrole" name="idrole" required style="width: 100%;">

   
                          <option value="">Seleccione rol</option>
            
                          @foreach ($roles as $key => $role)

                          <option value="{{$role->id}}">{{$role->tipo}}</option>

                          @endforeach

                        </select>
                    
                         


                    </div>

                   


                   


                    <div class="col-md-4">
                    <br>
                        <label for="exampleInputPassword1">Telefono</label> 
                        {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => '(000)-0000-0000', 'data-inputmask'=>'"mask": "(999) 99999999"','data-mask']) !!}

                  
                    </div> 




                    @if ($user2)


                          <div class="col-md-4">
                            <br>
                            <label for="exampleInputPassword1">Estado</label> 
    
                              <select class="form-control select2" id="estado" name="estado" style="width: 100%;">
                                <option value="">Seleccione estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                              </select>
                              
                          </div>

                    @endif


                    <div class="col-md-12">
                       <br><br>
                      <div class="col-md-12" id="ver-image"></div> 
       
                      <span style="color: #E6674A;">*</span> Campos Obligatorios
                      <br><br>
                    </div>

                  </div><!-- /.box-body --> 
                  </div><!-- /.box-body -->
                  </div><!-- /.box-body -->

                  <input type="hidden" name="tipo" id="tipo" value="{{$tipo}}">

                
                  <div class="box-footer">


                   <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                  </div>
              </form>
              </div><!-- /.box -->
          </div>

  <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
@section('javascript')

<script>

   @if (Auth::user()->idrole == 3)

      $("#idrole").val(4).trigger('change');
      $("#idrole").prop('disabled',true);


   @endif

  $('[data-mask]').inputmask()
  $('.select2').select2();


   /* $('#datepicker_inicio').datetimepicker({
      format: 'YYYY-MM-DD'
    });

    $('#datepicker_contrato').val(moment(new Date()).format("YYYY-MM-DD"))
    $('#datepicker_contrato').datetimepicker({
      format: 'YYYY-MM-DD'
    });

    $('#datepicker_despido').datetimepicker({
      format: 'YYYY-MM-DD'
    });*/


  @if ($user2)
 
      $("#idrole").val("{{$user2->idrole}}").trigger('change');     
    //  $("#tipo_pago").val("{{$user2->tipo_pago}}").trigger('change');
     // $("#datepicker_contrato").val("{{$user2->fecha_contrato}}").trigger('change');
   //   $("#datepicker_despido").val("{{$user2->fecha_despido}}").trigger('change');
   //   $("#datepicker_inicio").val("{{$user2->fecha_nacimiento}}").trigger('change');
      $("#estado").val("{{$user2->active}}").trigger('change');
   //   $("#seguro_social").val("{{$user2->seguro_social}}").trigger('change');

     


    /*  var images = "{{$user2->images}}";
      var dd = images.split(",");
      var text="";

      for (var i = 0; i < dd.length - 1; i++) {
        text+="<img class='logo-mini' style='padding-right:30px;' src='"+dd[i]+"' width='200' height='200'>";  
      
      };


      $('#ver-image').html(text);*/



  @endif


$('#ingresar').click(function(){



         if (( $('[name="nombre"]').val() ==="") ||  ($('[name="apellido"]').val() ==="")|| ($('[name="ciudad"]').val() ==="")|| ($('[name="estado"]').val() ==="")|| ($('[name="codigo_postal"]').val() ==="")|| ($('[name="correo"]').val() ==="")) {
    


            swal({
              title: 'Verifique los campos obligatorios',
              
              icon: 'warning',
              buttons: {
    
                cancel: {
                  text: "Salir",
                  value: false,
                  visible: true
                }
              }
            });






        }else{
                agregarOrden(); 
        };


  


});



function agregarOrden(){


      var data = getFiles();
      data=getFormData("formCreate",data);


      $.ajax({
          url: "{{ route('create_product') }}",                                          
          data: data,
          contentType: false,
          processData: false,
          method: 'POST',
      })
      .done(function(msg) {

        if (msg === "guardar") {
          var message = 'El Usuario Fue Creado Correctamente';

        };

        if (msg === "editar") {
          var message = 'El Usuario Fue Actualizado Correctamente';

        };

          window.location.href = "{{ route('usuarios.index') }}";

      })
      .fail(function(msg) {
            //console.log("error en createAlbarane");
      });



}



function getFiles(){

  var idFiles=document.getElementById("images");
  var archivos=$("#images")[0].files;
  var data=new FormData();

  for (var i = 0; i < archivos.length; i++) {
    data.append("images[]",archivos[i])
  };

  data.append("tipo","{{$tipo}}");

  @if ($user2)

    data.append("id","{{$user2->id}}");

  @endif
  

  return data;

}

function getFormData(id,data){

  $("#"+id).find("input,select").each(function(i, v) {
      if (v.type!=="file") {
       

          if (v.type==="checkbox"){

              if(v.checked===false) {
                 data.append(v.name,"off");
              }

              if(v.checked===true) {
                 data.append(v.name,"on");
              }

             
          }else{


            if (v.type==="radio"){

                if(v.checked===true) {
                   data.append(v.name,v.value);
                }
               
            }else{
              data.append(v.name,v.value);
            }

          }

      };
  });




  return data;

}



</script>
@endsection
