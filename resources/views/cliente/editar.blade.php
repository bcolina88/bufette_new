@extends('layout.template')
@section('title')
Editar cliente | Bufette 
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Editar cliente
        <small></small>
    </section>



{!! Form::model($client, ['route'=>['clientes.update', $client->id], 'method'=>'PUT','enctype'=>'multipart/form-data','files'=>'true','accept-charset'=>'UTF-8']) !!}


@include('cliente.forms.cliente')


{!! Form::close() !!}

@stop