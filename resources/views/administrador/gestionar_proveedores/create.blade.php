@extends('administrador.admin')
@section('content')
@if (session('message'))
<div class="alert alert-success">{{ session('message')}}</div>
@endif
    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1>Formulario - Crear Proveedores</h1>
        </div>
        <div class="card-header d-inline-flex">
            <a href="{{ route('proveedor.index') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>
        <div class="card-body">
            <form action="{{route('proveedor.store')}}" method="POST" enctype="multipart/form-data" id="create">
                @include('administrador.gestionar_proveedores.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <Button class="btn btn-primary" form="create">
                <i class="fas fa-plus"></i> Crear
            </Button>
        </div>
    </div>
@endsection
