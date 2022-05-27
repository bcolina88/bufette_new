@extends('layout.template')
@section('title')
Crear Cita | Bufette Torrez
@endsection


@section('content')
  <section class="content-header">
      <h1>
        Crear Cita</h1>
        <small></small>
    </section>


{!! Form::open(['route'=>'citas.store','enctype'=>'multipart/form-data','method'=>'POST','files'=>'true','accept-charset'=>'UTF-8']) !!}

@include('cita.forms.cita') 

{!! Form::close() !!}


@stop