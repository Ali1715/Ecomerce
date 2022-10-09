@extends('administrador.admin')


@section('content')




<!-- ****************************************************-->

<div class="row">
    <div class="col-md-12">

    @if (session('message'))
    <div class="alert alert-success">{{ session('message')}}</div>
    @endif
        <div class="card">
            <div class="card-header">
                <h4>PRODUCTOS
              
                
                    <a href="{{ url('administrador/producto/create') }}" class="btn btn-primary float-end">Ingresar Producto</a>
                    
                </h4>
            </div>
            <div class="card-body"></div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th> ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Costo</th>
                        <th>Precio</th>
                        <th>Marca</th>
                        
                       
                        <th></th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dato as $dato)
                    <tr>
                        <td>{{$dato->id}}</td>
                        <td>{{$dato->name}}</td>
                        <td>{{$dato->descripcion}}</td>
                        <td>{{$dato->precioStock}}</td>
                        <td>{{$dato->precioUnitario}}</td>
                        <td>{{$dato->nombre}}</td>
                     
                        <td>
                        <a href="{{ url('administrador/producto/'.$dato->id.'/edit')}}" class="btn btn-info">Editar</a>
                       <!-- <a href="#" wire:click="deleteCliente({{$dato->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal"class="btn btn-danger">Eliminar</a> -->
                       <a href="{{ url('administrador/producto/'.$dato->id.'/delete')}}" class="btn btn-info">Dar de Baja</a>    
                   
                         </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
               
            </div>
        </div>
    </div>
</div>



</div>
</div>

@endsection
   