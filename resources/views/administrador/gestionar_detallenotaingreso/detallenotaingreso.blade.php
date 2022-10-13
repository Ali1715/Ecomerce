@extends('administrador.admin')


@section('content')
@yield('content')
<div class="row">
    <div class="col-md-12">

    @if (session('message'))
    <div class="alert alert-success">{{ session('message')}}</div>
    @endif

<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-110">
            <div class="card">
<div class="card-body">
<table class="table table-bordered border-primary align-middle">

								<div class="m-sm-4">
                                <h1 class="h2">Detalle</h1>
                                <h1 class="h2">{{$idnota}}</h1>
                                
  <thead>
 
    <tr>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Costo</th>
      <th scope="col">Total</th>
    
    </tr>
  </thead>
  <tbody class="table-group-divider">
  @foreach ($dato as $dato)
  <form action="{{ url('administrador/detallenotaingreso/'.$idnota.''.$dato->idproducto.'/update')}}" method="POST" enctype="multipart/form-data" >
										@csrf
										@method('PUT')          
                    <tr>
                      <td >{{$dato->name}}</td>
                        <td>
											<input class="form-control form-control" type="numeric" name="cantidad" value="{{$dato->cantidad}}" placeholder="Ingrese la cantidad" />
										@error('cantidad')
										<small class="text-danger">{{$message}}</small>
										@enderror
										</td>
                        <td>	
                          <input class="form-control form-control" type="numeric" name="costo" value="{{$dato->costo}}" placeholder="Ingrese el costo" />
										@error('costo')
										<small class="text-danger">{{$message}}</small>
										@enderror</td>
                        <td>{{$dato->total}}</td>

                       <!-- <button type="submit" class="btn btn-lg btn-primary">Guardar</button>-->
											<a href="{{ url('administrador/detallenotaingreso/'.$idnota.'/listaproducto')}}" class="btn btn-primary float-end">Volver</a>
                                        
										 
										</div>
										
									</form>
                        
   
    </tr>
    @endforeach
  </tbody>
</table>
</div>
            </div>
            @endsection