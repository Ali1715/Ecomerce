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
                            <center><b>CATEGORIAS</b></center>
                        </h2>
                        <a href="{{ url('administrador/categoria/create') }}" class="btn btn-primary float-end">Nueva
                            Categoria</a>
                    </h4>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->nombre }}</td>
                                <td>
                                    <a href="{{ url('administrador/categoria/' . $categoria->id . '/edit') }}"
                                        class="btn btn-info">Editar</a>
                                    <button type="submit" class="btn btn-danger" form="delete_{{ $categoria->id }}"
                                        onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                        <i class="fas fa-trash">Eliminar</i>
                                    </button>
                                    <form action="{{ route('categoria.destroy', $categoria->id) }}"
                                        id="delete_{{ $categoria->id }}" method="POST" enctype="multipart/form-data"
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
