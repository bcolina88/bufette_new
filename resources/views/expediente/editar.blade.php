@extends('layout.template')
@section('title')
Editar Expediente | Bufette
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Editar Expediente
        <small></small>
    </section>



@include('expediente.forms.expediente')




@stop