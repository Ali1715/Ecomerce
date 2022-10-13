@extends('administrador.admin')


@section('content')




<!-- ****************************************************-->
@yield('content')
<div class="row">
    <div class="col-md-12">

    @if (session('message'))
    <div class="alert alert-success">{{ session('message')}}</div>
    @endif
        <div class="card">
            <div class="card-header">
                <h4>CATEGORIAS
                <h1></h1>  
                <h1></h1>  
                <h1></h1>  

                    <a href="{{ url('administrador/categoria/create') }}" class="btn btn-primary float-end">Nueva Categoria</a>

                    <h1></h1>  
              
                </h4>
            </div>
        
            <div class="card-body"></div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th> ID</th>
                        <th>Nombre</th>
                        
                        
                       
                        <th></th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dato as $dato)
                    <tr>
                        <td>{{$dato->id}}</td>
                        <td>{{$dato->nombre}}</td>
                       
                     
                        <td>
                      <!--  <a href="{{ url('administrador/categoria/'.$dato->id.'/edit')}}" class="btn btn-info">Editar</a> -->
                       <!-- <a href="#" wire:click="deleteCliente({{$dato->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal"class="btn btn-danger">Eliminar</a> -->
                      
                   
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
   