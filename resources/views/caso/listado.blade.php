@extends('layout.template')
@section('title')
Listado de Casos | Bufette Torrez
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Listado de Casos
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

            {!!Form::open(['route'=>'casos.index', 'method'=>'GET'])!!}
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
                    <th>#</th>
                    <th>Nº Expediente</th>
                    <th>Proceso</th>

                    
                    @if (Auth::user()->idrole != 3)
                    <th>Acciones</th>
                    @endif    
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($orders as $key => $user)
                  <tr>

                  
                    <td>#{{$user->id}}</td>
                    <td>{{$user->expediente->numero}}</td>
                    <td>{{$user->proceso}}</td>
          
                    
 
                     
                     <td>
                    
                      <div class="btn-group">
          
                          {!! Form::model($user, ['route'=>['casos.update', $user->id], 'method'=>'DELETE']) !!}

                         <!--  <a href="{{route("casos.show", ['id' => $user->id])}}" class="btn btn-default btn-success fa fa-search"><b></b></a>  -->
                          
                           <a href="{{route("pdf", ["id" => $user->id])}}" class="btn btn-info fa fa-file-pdf-o"><b></b></a> 
                          
                          
                          @if (\App\Http\Controllers\RolesController::editar(5))
                          <a href="{{route("casos.edit", ['id' => $user->id])}}" onclick="return confirm('Seguro que Desea Editar el Caso #{{$user->id}}')" class="btn btn-default btn-warning fa fa-pencil"><b></b></a> 
                          @endif


                          @if (\App\Http\Controllers\RolesController::borrar(5))

                          <button type='submit' class="btn btn-default btn-danger fa fa-trash" onclick="return confirm('Seguro que Desea eliminar el Caso #{{$user->id}}')" ></i></button>
                          
                          @endif

                          {!! Form::close() !!}

                      </div>
                                    
                      </td>
                     
                  </tr>
                     @empty

                  No hay Datos que Mostrar.
                    @endforelse


                  </tbody>

                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

              @if (\App\Http\Controllers\RolesController::agregar(5))
                <a href="{{route('casos.create')}}" class="btn btn-default btn-warning btn-flat pull-left"><b>Nuevo Caso</b></a> 
              @endif

              <ul class="pagination pagination-sm no-margin pull-right">
                {{ $orders->links() }}
              </ul>

            </div>

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

  </section>


@stop