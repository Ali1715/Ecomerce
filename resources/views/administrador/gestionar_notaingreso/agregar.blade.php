<!-- extiene el panel del adinistrador -->
@extends('administrador.admin')
<!-- ***************************** -->
<!--   Nota :encabezado-->



@section('content')
<div>
@include('administrador.gestionar_notaingreso.agregarnota')

<!--  ****************************************-->
 

<!--           agregar producto -->




<a href="{{ url('administrador/detallenotaingreso/'.$dato->id.'/producto') }}" class="btn btn-primary ">Agregar</a>
<!-- ***************************** -->


<!--           agregar detalle -->



@endsection

<!-- ***************************** -->
 
