@extends('layout.template')

@section('content')
    <section class="content-header">
      <h1>
        Inicio
        <small>Toda la info Aqui</small>
    </section>

    <!-- Main content -->
  <section class="content">

    @if (Auth::user()->idrole == 1)

	    <div class="row">

	        <div class="col-md-6 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-green"><i class="fa fa-suitcase"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text" style="color:white;">0000</span>
	              <span class="info-box-text">Casos Ganados del mes</span>
	              <span class="info-box-number"> {{ $total_casos_ganados_mes }}</span>
	            </div>
	         
	          </div>
	   
	        </div>

	  
	        <div class="col-md-6 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-red"><i class="fa fa-suitcase"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text" style="color:white;">0000</span>
	              <span class="info-box-text">Casos Fallidos del mes</span>
	              <span class="info-box-number"> {{ $total_casos_fallidos_mes }}</span>
	            </div>
	        
	          </div>
	    
	        </div>
	  

	       
	        <div class="clearfix visible-sm-block"></div>


	        <div class="col-md-6 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-aqua"><i class="fa fa-suitcase"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text" style="color:white;">0000</span>
	              <span class="info-box-text">Casos en disputa del mes</span>
	              <span class="info-box-number"> {{ $total_casos_en_disputa_mes }}</span>
	            </div>
	      
	          </div>
	       
	        </div>

	        
	        <div class="col-md-6 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-yellow"><i class="fa fa-fw fa-money"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text" style="color:white;">0000</span>
	              <span class="info-box-text">Creditos del mes</span>
	              <span class="info-box-number">{{number_format($dinero_mes, 2, ',' , '.' )}}</span>
	            </div>

	          </div>
	     
	        </div>


	        <div class="clearfix visible-sm-block"></div>


	        <div class="col-md-6 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-blue"><i class="fa fa-suitcase"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text" style="color:white;">0000</span>
	              <span class="info-box-text">Casos totales del mes</span>
	              <span class="info-box-number"> {{ $total_casos_mes }}</span>
	            </div>
	      
	          </div>
	       
	        </div>



	        




	  
	    </div>

    @endif
  


@stop