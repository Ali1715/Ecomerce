@extends('administrador.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <main class="d-flex w-100">
                <div class="container d-flex flex-column">
                    <div class="row vh-110">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        <a href="{{ route('detalleNotaIngreso.show', $notaIng->id) }}"
                                            class="btn btn-primary ml-auto">
                                            <i class="fas fa-plus"></i>
                                            Producto</a>
                                    </div>
                                    <div class="pagination justify-content-end">
                                        {{ $detallesNotaIng->links() }}
                                    </div>
                                </div>
                                <table class="table table-bordered border-primary align-middle">
                                    <div class="m-sm-4">
                                        <h1 class="h2">Detalle De La Nota De Ingreso {{ $notaIng->id }}</h1>
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">ID Nota</th>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Costo</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            @foreach ($detallesNotaIng as $detalleNotaIng)
                                                <tr>
                                                    <td>{{ $detalleNotaIng->id }}</td>
                                                    <td>{{ $detalleNotaIng->idnotaing }}</td>
                                                    @foreach ($productos as $producto)
                                                        @if ($producto->id == $detalleNotaIng->idproducto)
                                                            <td>{{ $producto->name }}</td>
                                                        @endif
                                                    @endforeach
                                                    <td>{{ $detalleNotaIng->cantidad }}</td>
                                                    <td>{{ $detalleNotaIng->costo }}</td>
                                                    <td>{{ $detalleNotaIng->total }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="{{ url('administrador/detalleNotaIngreso/' . $detalleNotaIng->id . '/edit') }}"
                                                                class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                            <button type="submit" class="btn btn-danger"
                                                                form="delete_{{ $detalleNotaIng->id }}"
                                                                onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                            <form action="{{ route('detalleNotaIngreso.destroy', $detalleNotaIng->id) }}"
                                                                id="delete_{{ $detalleNotaIng->id }}" method="POST"
                                                                enctype="multipart/form-data" hidden>
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </div>
                                </table>
                                <div class="row">
                                    <div class="pagination justify-content-end">
                                        {{ $detallesNotaIng->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
