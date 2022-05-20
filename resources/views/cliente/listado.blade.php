@extends('layout.template')
@section('title')
Listado de clientes | Bufette 
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Listado de clientes
        <small></small>
    </section>


    <!-- Main content -->
  <section class="content">

            <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success">
            <div class="box-header with-border">

            <br>
            @if (Session::has('message'))
             <p class="alert alert-info"><b>{{ Session::get('message')}}</b></p>
            @endif

            {!!Form::open(['route'=>'clientes.index', 'method'=>'GET'])!!}
            <div class="input-group">

                      <input type="text" name="search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Buscar..."/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>

            </div>
            {!!Form::close()!!}
 
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin table-striped  table-hover">
                  <thead>
                  <tr>
                    <th>Cliente(E-mail)</th>
                    <th>Nombre y Apellido</th>
                    <th>Ciudad</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($clientes as $key => $cliente)
                  <tr>

                  
                    <td>{{$cliente->email}}</td>
                    <td>{{$cliente->nombre}} {{$cliente->apellido}} </td>
                    <td>{{$cliente->ciudad}} </td>
                    <td>{{$cliente->telefono}} </td>
             
                     
                     <td>
                    
                      <div class="btn-group">
          
                          {!! Form::model($cliente, ['route'=>['clientes.update', $cliente->id], 'method'=>'DELETE']) !!}

                          <a href="{{route("clientes.show", ['id' => $cliente->id])}}" class="btn btn-default btn-success fa fa-search"><b></b></a> 
                          
                          @if (\App\Http\Controllers\RolesController::editar(4))
                          <a href="{{route("clientes.edit", ['id' => $cliente->id])}}" onclick="return confirm('Seguro que Desea Editar a {{$cliente->nombre}}')" class="btn btn-default btn-warning fa fa-pencil"><b></b></a> 
                          @endif


                          @if (\App\Http\Controllers\RolesController::borrar(4))

                          <button type='submit' class="btn btn-default btn-danger fa fa-trash" onclick="return confirm('Seguro que Desea eliminar a {{$cliente->nombre}}')" ></i></button>
                          
                          @endif

                          {!! Form::close() !!}

                      </div>
                                    
                      </td>
                     
                  </tr>
                     @empty

                  No hay Datos que Motrar.
                    @endforelse


                  </tbody>

                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

              @if (\App\Http\Controllers\RolesController::agregar(4))
                <a href="{{route('clientes.create')}}" class="btn btn-default btn-warning btn-flat pull-left"><b>Nuevo cliente</b></a> 
              @endif

              <ul class="pagination pagination-sm no-margin pull-right">
                {{ $clientes->links() }}
              </ul>

            </div>

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

  </section>


@stop