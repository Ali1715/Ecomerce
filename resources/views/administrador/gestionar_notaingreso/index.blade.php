
@extends('administrador.admin')


@section('content')


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
                                <h1 class="h2">Nueva Nota de Ingreso</h1>
  <thead>
 
    <tr>
      <th scope="col">#</th>
      <th scope="col">FechaHora</th>
      <th scope="col">Elaborado por</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  @foreach ($dato as $dato)
                    <tr>
                    <td >{{$dato->id}}</td>
                        <td>{{$dato->created_at}}</td>
                        <td>{{$dato->name}}</td>
                        <td>{{$dato->total}}</td>
   
    </tr>
    @endforeach
  </tbody>
</table>
</div>
            </div>
            @endsection