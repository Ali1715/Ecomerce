@extends('administrador.admin')

@section('content')
    <!-- ****************************************************-->
    @yield('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <h2>
                            <center><b>PROMOCIONES</b></center>
                        </h2>
                        <a href="{{ url('administrador/promociones/create') }}" class="btn btn-primary float-end">Nuevo
                            promocion</a>
                    </h4>
                </div>
                <div class="pagination justify-content-end">
                    {{ $promociones->links() }}
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Send</th>
                            <th>ID</th>
                            <th>Descuento (%)</th>
                            <th>Lanzamiento</th>
                            <th>Finalización</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($promociones as $promocion)
                            <tr>
                                <td>
                                    <a href="{{ route('promoMail.edit', $promocion->id) }}"
                                        class="btn btn-warning"><i class="fas fa-envelope"></i><i
                                            class="fas fa-arrow-right"></i></a>
                                </td>
                                <td>{{ $promocion->id }}</td>
                                <td>{{ $promocion->descuento }}</td>
                                <td>{{ $promocion->fhiniciada }}</td>
                                <td>{{ $promocion->fhfinalizada }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('administrador/promociones/' . $promocion->id . '/edit') }}"
                                            class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                        <button type="submit" class="btn btn-danger" form="delete_{{ $promocion->id }}"
                                            onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form action="{{ route('promociones.destroy', $promocion->id) }}"
                                            id="delete_{{ $promocion->id }}" method="POST" enctype="multipart/form-data"
                                            hidden>
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-end">
                    {{ $promociones->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
