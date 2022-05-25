@extends('layout')
@section('css')
  <style media="screen">

    .pull-left {
        float: left !important;
    }

    .pull-right {
        float: right !important;
    }


    .table>tbody>tr>td {
        border-top: 1px solid #fff;
        padding: 0px;
    }

    .table>thead>tr>th {
        border-bottom: 2px solid #fff;
        padding: 0px;
    }

    .table>tbody>tr>th {
        border-bottom: 2px solid #fff;
        padding: 0px;
    }

    .table > thead > tr > th,
	.table > tbody > tr > th,
	.table > tfoot > tr > th,
	.table > thead > tr > td,
	.table > tbody > tr > td,
	.table > tfoot > tr > td {
	  padding: 0px;

	}


	.table-condensed > thead > tr > th,
	.table-condensed > tbody > tr > th,
	.table-condensed > tfoot > tr > th,
	.table-condensed > thead > tr > td,
	.table-condensed > tbody > tr > td,
	.table-condensed > tfoot > tr > td {
	  padding: 0px;
	}


}

  </style>
@endsection

@section('content')

    <div class="col-md-12" style="font-size: 10px;line-height: 0.5">
        <div class="">
            
            <h2><b>Colegio Odontológico de Cipolletti</b></h2>
            <p>Sarmiento 336 - T. 4782952 - (8324) Cipolletti - R.N.</p>
            <p>Pers.Jur.Dto.731/84 - C.U.I.T.30-62567879-6 - Ing.B.Ag.Ret.313/80 - Jub.DRP 62567879-6</p>
        </div>


    </div>

    <div class="col-md-12" style="font-size: 12px;line-height: 0.5;text-align:right;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">


        <div class="">

            <table class="table">
        
                <tbody>
      
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
                        <td style="width: 300px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">00000</td> 
                        <td style="width: 80px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">00000</td>
                        <td style="width: 180px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;text-align:right;" class="text-left">
                            <p><b>Fecha: </b></p>
                         </td>
                        <td style="width: 150px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;" class="text-right;">
                            <p><b>{{$caso->created_at}}</b></p>
                        </td>

                    </tr>
      
                </tbody>
            </table>

            
        </div>

    </div>


    <div class="col-md-12" style="font-size: 12px;line-height: 0.5;text-align:left;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">


        <div class="">

            <table class="table">
        
                <tbody>
      
                    <tr style=" border-top: 0px solid #fff;border-bottom: 0px solid #fff;border-top: 0px solid #fff;border-bottom: 0px solid #fff;">
                        <td style="border-top: 0px solid #fff;border-bottom: 0px solid #fff;text-align:left;" class="text-left">
                            <p><b>Cliente: </b></p>
                         </td>
                        <td style="border-top: 0px solid #fff;border-bottom: 0px solid #fff;" class="text-left;">
                            <p>{{$caso->cliente->nombre}} {{$caso->cliente->apellido}}</p>
                        </td>

                    </tr>

                     <tr style=" border-top: 0px solid #fff;border-bottom: 0px solid #fff;border-top: 0px solid #fff;border-bottom: 0px solid #fff;">
                        <td style="border-top: 0px solid #fff;border-bottom: 0px solid #fff;text-align:left;" class="text-left">
                            <p><b>Posición del cliente: </b></p>
                         </td>
                        <td style="border-top: 0px solid #fff;border-bottom: 0px solid #fff;" class="text-left;">
                            <p>{{$caso->posicion_cliente}}</p>
                        </td>

                    </tr>


                    <tr style=" border-top: 0px solid #fff;border-bottom: 0px solid #fff;border-top: 0px solid #fff;border-bottom: 0px solid #fff;">
                        <td style="border-top: 0px solid #fff;border-bottom: 0px solid #fff;text-align:left;" class="text-left">
                            <p><b>Proceso: </b></p>
                         </td>
                        <td style="border-top: 0px solid #fff;border-bottom: 0px solid #fff;" class="text-left;">
                            <p>{{$caso->proceso }} </p>
                        </td>

                    </tr>
                    <tr style=" border-top: 0px solid #fff;border-bottom: 0px solid #fff;border-top: 0px solid #fff;border-bottom: 0px solid #fff;">
                        <td style="border-top: 0px solid #fff;border-bottom: 0px solid #fff;text-align:left;" class="text-left">
                            <p><b>Tipo de proceso: </b></p>
                         </td>
                        <td style="border-top: 0px solid #fff;border-bottom: 0px solid #fff;" class="text-left;">
                            <p>{{$caso->tipo_proceso}}</p>
                        </td>

                    </tr>
                    <tr style=" border-top: 0px solid #fff;border-bottom: 0px solid #fff;border-top: 0px solid #fff;border-bottom: 0px solid #fff;">
                        <td style="border-top: 0px solid #fff;border-bottom: 0px solid #fff;text-align:left;" class="text-left">
                            <p><b>Estado: </b></p>
                         </td>
                        <td style="border-top: 0px solid #fff;border-bottom: 0px solid #fff;" class="text-left;">
                            <p>{{$caso->estado}}</p>
                        </td>

                    </tr>

                    <tr style=" border-top: 0px solid #fff;border-bottom: 0px solid #fff;border-top: 0px solid #fff;border-bottom: 0px solid #fff;">
                        <td style="border-top: 0px solid #fff;border-bottom: 0px solid #fff;text-align:left;" class="text-left">
                            <p><b>Expediente: </b></p>
                         </td>
                        <td style="border-top: 0px solid #fff;border-bottom: 0px solid #fff;" class="text-left;">
                            <p>{{$caso->expediente->numero}}</p>
                        </td>

                    </tr>

                    <tr style=" border-top: 0px solid #fff;border-bottom: 0px solid #fff;border-top: 0px solid #fff;border-bottom: 0px solid #fff;">
                        <td style="border-top: 0px solid #fff;border-bottom: 0px solid #fff;text-align:left;" class="text-left">
                            <p><b>Abogado: </b></p>
                         </td>
                        <td style="border-top: 0px solid #fff;border-bottom: 0px solid #fff;" class="text-left;">
                            <p>{{$caso->abogado->nombre}} {{$caso->abogado->apellido}}</p>
                        </td>

                    </tr>

                    <tr style=" border-top: 0px solid #fff;border-bottom: 0px solid #fff;border-top: 0px solid #fff;border-bottom: 0px solid #fff;">
                        <td style="border-top: 0px solid #fff;border-bottom: 0px solid #fff;text-align:left;" class="text-left">
                            <p><b>Tipo de pago: </b></p>
                         </td>
                        <td style="border-top: 0px solid #fff;border-bottom: 0px solid #fff;" class="text-left;">
                            <p>{{$caso->tipo_pago}}</p>
                        </td>

                    </tr>
      
                   
      
      
                </tbody>
            </table>

            
        </div>

    </div>

    <div class="col-md-12" style="font-size: 12px;line-height: 0.5;text-align:left;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">


        <div class="">

            <table class="table">
        
                <tbody>
      
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
                        <td style="border-top: 1px solid #fff;border-bottom: 2px solid #fff;text-align:left;" class="text-left">
                            <p><b>Descripción </b></p>
                        </td>
       
      
                    </tr>
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
                      
                        <td style="border-top: 1px solid #fff;border-bottom: 2px solid #fff;text-align:left;" class="text-left">
                            <p><b>{!! $caso->descripcion !!}</b></p>
                        </td>
                        

                    </tr>
      
                </tbody>
            </table>

            
        </div>

    </div>

<br><br>
 

    <div class="col-md-12" style="font-size: 12px;line-height: 0.0000001;text-align:left;border-top: 1px solid #fff;border-bottom: 2px solid #fff;padding: 0px">


        <div class="">




            <table class="table" style="padding: 0px">
        
                <tbody style="padding: 0px">
      
                   

                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;border-top: 1px solid #fff;border-bottom: 2px solid #fff;padding: 0px">
                      
                        <td style="width: 170px;text-align:center;color:white;padding: 0px"> <p>000000</p> </td> 
                        <td style="width: 150px;color:white;padding: 0px"> <p>000000</p> </td> 
                        <td style="width: 170px;padding: 0px">  <p><b>Total Tarifa</b></p> </td> 
                        <td style="width: 150px;text-align:right;padding: 0px"> <p><b>{{number_format($caso->tarifa, 2, ',' , '.' )}}</b></p></td> 

                    </tr>
      
                </tbody>
            </table>

            
        </div>

    </div>



   

                        

    
@endsection