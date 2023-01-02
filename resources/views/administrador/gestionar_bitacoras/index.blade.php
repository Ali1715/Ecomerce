@extends('administrador.admin')
@section('content')
    <div class="card mt-3" id="content">
        <div class="card-header d-inline">
            <h1>
                <center><b>BITÁCORA</b></center>
            </h1>
        </div>
        <?php
        $csv = 'csv';
        $xlsx = 'xlsx';
        ?>
        <div class="card-body">
            <a href="{{ route('bitacoras.edit', $csv) }}" class="btn btn-info">
                Log CSV <i class="fa fa-file"></i></a>
            <a href="{{ route('bitacoras.edit', $xlsx) }}" class="btn btn-info">
                Log XLSX <i class="fa fa-file-excel"></i></a>
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
                            <th>Direccion IP</th>
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
                                <td>{{ $bitacora->ip }}</td>
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
