@extends('layout.template')
@section('title')
Crear Expediente | Bufette
@endsection


@section('content')
  <section class="content-header">
      <h1>
        Crear Expediente</h1>
        <small></small>
    </section>



 


@include('expediente.forms.expediente') 



@stop