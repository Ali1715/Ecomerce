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

                    <a href="{{ url('administrador/proveedor/create') }}" class="btn btn-primary float-end">Añadir Proveedor</a>

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
                        
                       
                        <th></th>
                      
                    </tr>
                </thead>
                <tbody>
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
   