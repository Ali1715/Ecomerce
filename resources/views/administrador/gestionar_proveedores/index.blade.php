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
                <h4>PROVEEDOR
                <h1></h1>  
                <h1></h1>  
                <h1></h1>  

                    <a href="{{ url('administrador/gestionar_proveedores/create') }}" class="btn btn-primary float-end">Añadir Proveedor</a>

                    <h1></h1>  
                    
              
                 
                </h4>
            </div>
            <div class="card-body">
            <a class="navbar-brand ">Listar</a>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th> ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Celular</th>
                        <th>Direccion</th>
                        <th>Accion</th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $proveedor)
                            <tr>
                                <td> {{$proveedor->id}}</td>
                                <td>{{ $proveedor->nombre }}</td>
                                <td>{{ $proveedor->correo }}</td>
                                <td>{{ $proveedor->celular }}</td>
                                <td>{{ $proveedor->direccion }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('gestionar_proveedores.edit', $proveedor->id) }}"
                                            class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('gestionar_proveedores.destroy', $proveedor->id) }}"
                                                method="POST"
                                                >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                                    Borrar
                                                </button>
                                        </form>
                                    </div>
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
</div>

@endsection
   