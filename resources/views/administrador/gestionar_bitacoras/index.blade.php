@extends('administrador.admin')
@section('content')
    <div class="card mt-3" id="content">
        <div class="card-header d-inline">
            <h1>
                <center><b>BITÁCORA</b></center>
            </h1>
        </div>
        <div class="card-body">
            <div class="pagination justify-content-end">
                {!! $bitacoras->links() !!}
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Tipo De Usuario</th>
                            <th>Actividad</th>
                            <th>Fecha - Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bitacoras as $bitacora)
                            <tr>
                                <th>{{ $bitacora->id }}</th>
                                <td>{{ $bitacora->name }}</td>
                                <td>{{ $bitacora->tipou }}</td>
                                <td>{{ $bitacora->actividad }}</td>
                                <td>{{ $bitacora->fechaHora }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagination justify-content-end">
            {!! $bitacoras->links() !!}
        </div>
    </div>
@endsection
