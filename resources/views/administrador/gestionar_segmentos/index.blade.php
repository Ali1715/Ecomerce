@extends('administrador.admin')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline">
            <H1><center><b>Segmentos</b></center></H1>
        </div>
        
        <div class="card-header d-inline-flex">
            <a href="{{ route('segmentos.create') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Registrar</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($segmentos as $segmento)
                            <tr>
                                <td>{{ $segmento->id }}</td>
                                <td>{{ $segmento->name }}</td>
                                <td>
                                    <a href="{{ route('segmentos.edit', $segmento) }}" class="btn btn-primary"> Editar </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $segmentos->links() }}
        </div>
    </div>
@endsection
