<section class="content">
<div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header">
         
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
                       <label for="exampleInputPassword1">Prioridad</label>  <span style="color: #E6674A;">*</span>

                         
                        <select class="form-control select2" id="prioridad" name="prioridad" required style="width: 100%;">

   
                          <option value="">Seleccione prioridad</option>
                          <option value="Alta">Alta</option>
                          <option value="Baja">Baja</option>

                        </select>
                    
                       
                    </div>


                
                    <div class="col-md-6">
                      <br>
                       <label for="exampleInputPassword1">Clientes</label>  <span style="color: #E6674A;">*</span>

                         
                        <select class="form-control select2" id="cliente_id" name="cliente_id" required style="width: 100%;">

   
                          <option value="">Seleccione cliente</option>
                           @foreach ($clientes as $key => $expe)

                          <option value="{{$expe->id}}">{{$expe->nombre}} {{$expe->apellido}}</option>

                          @endforeach

                        </select>
                    
                       
                    </div>




                    <div class="col-md-6">
                       <br>
                       <label for="exampleInputPassword1">Abogado/Secretario</label>  <span style="color: #E6674A;">*</span>

                         
                        <select class="form-control select2" id="encargado_id" name="encargado_id" required style="width: 100%;">

   
                          <option value="">Seleccione abogado/secretario</option>
                           @foreach ($abogados as $key => $abogado)

                          <option value="{{$abogado->id}}">{{$abogado->nombre}} {{$abogado->apellido}}</option>

                          @endforeach

                        </select>
                    
                       
                    </div>


                    <div class="col-md-6">
                       <br>
                       <label for="exampleInputPassword1">Casos</label>  <span style="color: #E6674A;">*</span>

                         
                        <select class="form-control select2" id="caso_id" name="caso_id" required style="width: 100%;">

   
                          <option value="">Seleccione casos</option>
                           @foreach ($casos as $key => $caso)

                          <option value="{{$caso->id}}">{{$caso->proceso}} </option>

                          @endforeach

                        </select>
                    
                       
                    </div>


                    @if ($cita)
                    <div class="col-md-6">
                       <br>
                       <label for="exampleInputPassword1">Notificar</label>  

                         
                        <select class="form-control select2" id="notificar" name="notificar" style="width: 100%;">

                          <option value="1">Si</option>
                          <option value="0">No</option>

                        </select>
                    
                       <br>
                    </div>
                    @endif



                    <div class="col-md-6">
                      <br>
                      <label for="exampleInputPassword1">Fecha</label> 
                 
            
                         <input type="text" class="form-control" name="fecha" id="datepicker_inicio">
                        
                    </div>



                    <div class="col-md-12">
                    	<br>
                         <label for="exampleInputPassword1">Motivo</label> 

                        <textarea id="editor2" name="motivo" rows="10" cols="80" placeholder="Motivo" >
					    @if ($cita)

                        {{$cita->motivo}}

                        @endif

					    </textarea>        
                       
				    </div>





				    <div class="col-md-12">
                       <br><br>
                    
                      <span style="color: #E6674A;">*</span> Campos Obligatorios
                      <br><br>
                    </div>
                      
                    

                  


                  </div><!-- /.box-body --> 
                  </div><!-- /.box-body -->
                  </div><!-- /.box-body -->

                  <input type="hidden" name="tipo" id="tipo" value="{{$tipo}}">

                  @if ($cita)

                         <input type="hidden" name="id" id="id" value="{{$cita->id}}">

                   @endif

                
                  <div class="box-footer">


                   <button id="ingresar" class="btn btn-primary">Guardar</button>
                  </div>
                  </div>
                  </form>

           
              </div><!-- /.box -->
          </div>

@section('javascript')

<script>

   CKEDITOR.replace('editor2')


  $('[data-mask]').inputmask()
  $('.select2').select2();

  $('#datepicker_inicio').datetimepicker({
      format: 'DD-MM-YYYY'
  });



  @if ($cita)
    

    $('[name="cliente_id"]').val("{{$cita->cliente_id}}").trigger('change');
    $('[name="encargado_id"]').val("{{$cita->encargado_id}}").trigger('change');
    $('[name="abogado"]').val("{{$cita->idabogado}}").trigger('change');
    $('[name="caso_id"]').val("{{$cita->caso_id}}").trigger('change');
    $('[name="prioridad"]').val("{{$cita->prioridad}}").trigger('change');

    $("#datepicker_inicio").val("{{$cita->fecha}}").trigger('change');
    $('[name="notificar"]').val("{{$cita->notificar}}").trigger('change');







  @endif


$('#ingresar').click(function(){



         if (( $('[name="proceso"]').val() ==="") ||  ($('[name="expediente"]').val() ==="")) {
    


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
          url: "{{ route('casos.store') }}",                                          
          data: data,
          contentType: false,
          processData: false,
          method: 'POST',
      })
      .done(function(msg) {

        if (msg === "guardar") {
          var message = 'El Caso Fue Creado Correctamente';

        };

        if (msg === "editar") {
          var message = 'El Caso Fue Actualizado Correctamente';

        };

          window.location.href = "{{ route('casos.index') }}";

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


   var text1 = CKEDITOR.instances['editor2'].getData();


   data.append("expediente",$('[name="expediente"]').val());
   data.append("description",text1);
   data.append("tipo","{{$tipo}}");

   @if ($cita)
     data.append("id","{{$cita->id}}");
    @endif




  return data;

}


</script>
@endsection
