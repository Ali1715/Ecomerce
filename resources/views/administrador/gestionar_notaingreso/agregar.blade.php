@extends('administrador.admin')


@section('content')
<h1>Buscar Producto</h1>




<select class="form-select" aria-label="Default select example" action="{{ url('administrador/notaingreso/store')}}" method="POST" enctype="multipart/form-data">

@foreach ($dato as $dato)
  <option placeholder="buscar producto" value="name">{{$dato->id}} {{$dato->name}}</option>
  @endforeach

  
  </select>





  <a href="{{ url('administrador/notaingreso/'.$dato->id.'/agregardetalle')}}" class="btn btn-info">Agregar</a>



@endsection
   