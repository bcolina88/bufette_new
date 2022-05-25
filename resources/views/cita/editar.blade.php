@extends('layout.template')
@section('title')
Editar Cita | Bufette
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Editar Cita
        <small></small>
    </section>

{!! Form::model($cita, ['route'=>['citas.store', $cita->id], 'method'=>'POST','enctype'=>'multipart/form-data','files'=>'true','accept-charset'=>'UTF-8']) !!}

@include('cita.forms.cita')

{!! Form::close() !!}


@stop