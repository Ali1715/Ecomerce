@extends('administrador.admin')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline">
            <h1><center><b>EMPLEADOS</b></center></h1>
        </div>
        <div class="card-body">
            <div class="row">
                @can('empleado.create')
                    <div class="col-2">
                        <a href="{{ route('empleados.create') }}" class="btn btn-primary ml-auto">
                            <i class="fas fa-plus"></i>
                            Agregar</a>
                    </div>
                @endcan
                <div class="pagination justify-content-end">
                    {{ $empleados->links() }}
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>CI</th>
                            <th>Sexo</th>
                            <th>Celular</th>
                            <th>Domicilio</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $valor = 1;
                        ?>
                        @foreach ($empleados as $empleado)
                            @if ($empleado->tipoe == 1)
                                <tr>
                                    <th scope="row">{{ $valor++ }}</th>
                                    <td>{{ $empleado->name }}</td>
                                    <td>{{ $empleado->email }}</td>
                                    <td>{{ $empleado->ci }}</td>
                                    <td>{{ $empleado->sexo }}</td>
                                    <td>{{ $empleado->celular }}</td>
                                    <td>{{ $empleado->domicilio }}</td>
                                    <td>{{ $empleado->estadoemp }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @can('empleado.update')
                                                <a href="{{ route('empleados.edit', $empleado->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                            @endcan
                                            @can('empleado.delete')
                                                <button type="submit" class="btn btn-danger" form="delete_{{ $empleado->id }}"
                                                    onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <form action="{{ route('empleados.destroy', $empleado->id) }}"
                                                    id="delete_{{ $empleado->id }}" method="POST"
                                                    enctype="multipart/form-data" hidden>
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagination justify-content-end">
            {{ $empleados->links() }}
        </div>
    </div>
@endsection
