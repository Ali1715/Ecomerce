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
                <h1></h1>  
                <h1></h1>  
                <h6>AGREGAR PARA LA NOTA:</h6>  
                <th>{{$datonota}}</th>
                    
                 
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
                    @foreach ($datos as $dato)
                    
                    <tr>
                    
                        <td>{{$dato->id}}</td>
                        <td>{{$dato->name}}</td>
                        <td>{{$dato->descripcion}}</td>
                        <td>{{$dato->precioStock}}</td>
                        <td>{{$dato->precioUnitario}}</td>
                        <td>{{$dato->nombre}}</td>
                     
                        <td>
                      
                        <a href="{{ url('administrador/detallenotaingreso/'.$datonota.''.$dato->id.'/add') }}" class="btn btn-primary ">Agregar</a>
                   
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
   