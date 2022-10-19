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
                    <h4>
                        <h2>
                            <center><b>PRODUCTOS</b></center>
                        </h2>
                        <a href="{{ url('administrador/producto/create') }}" class="btn btn-primary float-end">Nuevo
                            Producto</a>
                        <a href="{{ url('administrador/notaingreso/create') }}" class="btn btn-primary ">Nota De Ingreso</a>
                        <a href="{{ url('administrador/producto/create') }}" class="btn btn-primary me-md-6">Dar De Baja</a>
                        <a href="{{ url('administrador/categoria') }}" class="btn btn-primary ">Categorias</a>
                        <a href="{{ url('administrador/marca') }}" class="btn btn-primary me-md-6">Marcas</a>
                    </h4>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Marca</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->name }}</td>
                                <td>{{ $producto->descripcion }}</td>
                                <td>{{ $producto->stock }}</td>
                                <td>{{ $producto->precioUnitario }}</td>
                                @foreach ($marcas as $marca)
                                    @if ($marca->id == $producto->idmarca)
                                        <td>{{ $marca->nombre }}</td>
                                    @endif
                                @endforeach
                                @foreach ($categorias as $categoria)
                                    @if ($categoria->id == $producto->idcategoria)
                                        <td>{{ $categoria->nombre }}</td>
                                    @endif
                                @endforeach
                                <td>
                                    <a href="{{ url('administrador/producto/' . $producto->id . '/edit') }}"
                                        class="btn btn-info">Editar</a>
                                    <button type="submit" class="btn btn-danger" form="delete_{{ $producto->id }}"
                                        onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                        <i class="fas fa-trash">Eliminar</i>
                                    </button>
                                    <form action="{{ route('producto.destroy', $producto->id) }}"
                                        id="delete_{{ $producto->id }}" method="POST" enctype="multipart/form-data"
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
