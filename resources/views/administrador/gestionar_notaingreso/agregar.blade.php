<!-- extiene el panel del adinistrador -->
@extends('administrador.admin')
<!-- ***************************** -->
<!--   Nota :encabezado-->



@section('content')
<div>
@include('administrador.gestionar_notaingreso.agregarnota')

<!--  ****************************************-->
 

<!--           agregar producto -->




<a href="{{ url('administrador/detallenotaingreso/'.$dato->id.'/listaproducto') }}" class="btn btn-primary ">Agregar Detalle</a>
<!-- ***************************** -->
</div>

<!--           agregar detalle -->

<div>

</div>

@endsection

<!-- ***************************** -->
 
