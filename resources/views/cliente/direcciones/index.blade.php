@extends('cliente.cliente')

@section('content')
    <!-- ****************************************************-->
    @yield('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header d-inline">
                    <h1>
                        <center><b>DIRECCIONES</b></center>
                    </h1>
                    <a href="{{ route('AddressClient.create') }}" class="btn btn-primary float-end">Nueva Dirección</a>
                </div>
                <div class="pagination justify-content-end">
                    {!! $direcciones->links() !!}
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Address 1</th>
                            <th>Address 2</th>
                            <th>Ciudad</th>
                            <th>Departamento</th>
                            <th>País</th>
                            <th>Postal Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($direcciones as $direccion)
                            <tr>
                                <td>{{ $direccion->id }}</td>
                                <td>{{ $direccion->address_1 }}</td>
                                <td>{{ $direccion->address_2 }}</td>
                                <td>{{ $direccion->city }}</td>
                                <td>{{ $direccion->department }}</td>
                                <td>{{ $direccion->country }}</td>
                                <td>{{ $direccion->postal_code }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('cliente/AddressClient/' . $direccion->id . '/edit') }}"
                                            class="btn btn-info">Edit</a>
                                        <button type="submit" class="btn btn-danger" form="delete_{{ $direccion->id }}"
                                            onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                            Delete
                                        </button>
                                        <form action="{{ route('AddressClient.destroy', $direccion->id) }}"
                                            id="delete_{{ $direccion->id }}" method="POST" enctype="multipart/form-data"
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
                    {!! $direcciones->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
