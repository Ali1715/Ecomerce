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
                                        <a href="{{ route('notaIngreso.create') }}" class="btn btn-primary ml-auto">
                                            <i class="fas fa-plus"></i>
                                            Agregar</a>
                                    </div>
                                    <div class="pagination justify-content-end">
                                        {{ $notasIng->links() }}
                                    </div>
                                </div>
                                <table class="table table-bordered border-primary align-middle">
                                    <div class="m-sm-4">
                                        <h1 class="h2">Notas De Ingreso</h1>
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">FechaHora</th>
                                                <th scope="col">Trabajador</th>
                                                <th scope="col">proveedor</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            @foreach ($notasIng as $notaIng)
                                                <tr>
                                                    <td>{{ $notaIng->id }}</td>
                                                    <td>{{ $notaIng->fechaHora }}</td>
                                                    @foreach ($empleados as $empleado)
                                                        @if ($empleado->id == $notaIng->idempleado)
                                                            <td>{{ $empleado->name }}</td>
                                                        @endif
                                                    @endforeach
                                                    @foreach ($proveedores as $proveedor)
                                                        @if ($proveedor->id == $notaIng->idproveedor)
                                                            <td>{{ $proveedor->nombre }}</td>
                                                        @endif
                                                    @endforeach
                                                    <td>{{ $notaIng->total }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="{{ url('administrador/notaIngreso/' . $notaIng->id . '/edit') }}"
                                                                class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                            <a href="{{ route('notaIngreso.show', $notaIng->id) }}"
                                                                class="btn btn-dark"><i class="fas fa-eye"></i></a>
                                                            <button type="submit" class="btn btn-danger"
                                                                form="delete_{{ $notaIng->id }}"
                                                                onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                            <form action="{{ route('notaIngreso.destroy', $notaIng->id) }}"
                                                                id="delete_{{ $notaIng->id }}" method="POST"
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
                                        {{ $notasIng->links() }}
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
