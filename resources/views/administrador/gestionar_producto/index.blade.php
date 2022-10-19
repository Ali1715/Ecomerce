@extends('administrador.admin')

@section('content')
    <!-- ****************************************************-->
    @yield('content')
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>PRODUCTOS
                        <h1></h1>
                        <h1></h1>
                        <h1></h1>
                        <a href="{{ url('administrador/producto/create') }}" class="btn btn-primary float-end">Nuevo
                            Producto</a>
                        <h1></h1>
                        <a href="{{ url('administrador/notaingreso/create') }}" class="btn btn-primary ">Nota de Ingreso</a>
                        <a href="{{ url('administrador/producto/create') }}" class="btn btn-primary me-md-6">Dar de Baja</a>
                        <a href="{{ url('administrador/categoria') }}" class="btn btn-primary ">Categorias</a>
                        <a href="{{ url('administrador/marca') }}" class="btn btn-primary me-md-6">Marcas</a>
                    </h4>
                </div>

                <div class="card-body"></div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th> ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Marca</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dato as $dato)
                            <tr>
                                <td>{{ $dato->id }}</td>
                                <td>{{ $dato->name }}</td>
                                <td>{{ $dato->descripcion }}</td>
                                <td>{{ $dato->stock }}</td>
                                <td>{{ $dato->precioUnitario }}</td>
                                <td>{{ $dato->nombre }}</td>

                                <td>
                                    <a href="{{ url('administrador/producto/' . $dato->id . '/edit') }}"
                                        class="btn btn-info">Editar</a>
                                    <!-- <a href="#" wire:click="deleteCliente({{ $dato->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal"class="btn btn-danger">Eliminar</a> -->

                                    <button type="submit" class="btn btn-danger" form="delete_{{ $dato->id }}"
                                        onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                        <i class="fas fa-trash">Eliminar</i>
                                    </button>
                                    <form action="{{ route('producto.destroy', $dato->id) }}"
                                        id="delete_{{ $dato->id }}" method="POST" enctype="multipart/form-data"
                                        hidden>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
