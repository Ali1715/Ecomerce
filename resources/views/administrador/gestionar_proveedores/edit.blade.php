@extends('administrador.admin')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1>Formulario - Editar Proveedores</h1>
        </div>
        <div class="card-header d-inline-flex">
            <a href="{{ route('proveedor.index') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>
        <div class="card-body">
            <form action="{{ route('proveedor.update', $gestionar_proveedore) }}" method="POST" enctype="multipart/form-data"
                id="create">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating">
                            <input value= "{{$gestionar_proveedore->nombre}}" type="text" placeholder="name" class="form-control" name="nombre">
                            <label>Nombre</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input value= "{{$gestionar_proveedore->celular}}" type="number" placeholder="celular" class="form-control" name="celular">
                            <label>Teléfono</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input value= "{{$gestionar_proveedore->direccion}}" type="text" placeholder="domicilio" class="form-control" name="direccion">
                            <label>Direccion</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating">
                            <input value= "{{$gestionar_proveedore->correo}}" type="email" placeholder="email" class="form-control" name="correo">

                            <label>Correo</label>
                        </div>
                    </div>

                </div>

            </form>
        </div>
        <div class="card-footer">
            <Button class="btn btn-primary" form="create">
                <i class="fas fa-plus"></i> Actualizar
            </Button>
        </div>
    </div>
@endsection
