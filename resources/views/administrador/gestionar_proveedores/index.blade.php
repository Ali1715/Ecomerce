@extends('administrador.admin')

@section('content')
    <!-- ****************************************************-->
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header d-inline">
                    <h1>
                        <center><b>PROVEEDORES</b></center>
                    </h1>

                    <a href="{{ route('proveedor.create') }}" class="btn btn-primary float-end">
                        <i class="fa fa-plus"></i> Nuevo Proveedor</a>
                    <a href="{{ route('reportes.proveedor', 'pdf') }}" class="btn btn-info">
                        Reporte PDF <i class="fa fa-file"></i></a>
                    <a href="{{ route('reportes.proveedor', 'csv') }}" class="btn btn-info">
                        Reporte CSV <i class="fa fa-file"></i></a>
                    <a href="{{ route('reportes.proveedor', 'xlsx') }}" class="btn btn-info">
                        Reporte XLSX <i class="fa fa-file-excel"></i></a>

                    <div class="pagination justify-content-end">
                        {{ $proveedores->links() }}
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Celular</th>
                                <th>Direccion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proveedores as $proveedor)
                                <tr>
                                    <td> {{ $proveedor->id }}</td>
                                    <td>{{ $proveedor->nombre }}</td>
                                    <td>{{ $proveedor->correo }}</td>
                                    <td>{{ $proveedor->celular }}</td>
                                    <td>{{ $proveedor->direccion }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('proveedor.edit', $proveedor->id) }}"
                                                class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('proveedor.destroy', $proveedor->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-end">
                        {{ $proveedores->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
