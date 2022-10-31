@extends('administrador.admin')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline">
            <h1>
                <center><b>PRODUCTOS DEL CARRITO</b></center>
            </h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <a href="{{ route('detallesCarritosClientes.create2', $carrito->id) }}" class="btn btn-primary ml-auto">
                        <i class="fas fa-plus"></i>
                        Agregar</a>
                </div>
                <div class="pagination justify-content-end">
                    {{ $detallesCarritos->links() }}
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $valor = 1;
                        ?>
                        @foreach ($detallesCarritos as $detalleCarrito)
                            @foreach ($productos as $producto)
                                @if ($detalleCarrito->idProducto == $producto->id)
                                    <tr>
                                        <th scope="row">{{ $valor++ }}</th>
                                        <td>{{ $producto->name }}</td>
                                        <td>{{ $detalleCarrito->cantidad }}</td>
                                        <td>{{ $detalleCarrito->precio }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('detallesCarritosClientes.edit', $detalleCarrito->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                <button type="submit" class="btn btn-danger"
                                                    form="delete_{{ $detalleCarrito->id }}"
                                                    onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <form
                                                    action="{{ route('detallesCarritosClientes.destroy', $detalleCarrito->id) }}"
                                                    id="delete_{{ $detalleCarrito->id }}" method="POST"
                                                    enctype="multipart/form-data" hidden>
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagination justify-content-end">
            {{ $detallesCarritos->links() }}
        </div>
    </div>
@endsection
