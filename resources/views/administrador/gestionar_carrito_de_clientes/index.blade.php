@extends('administrador.admin')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline">
            <h1>
                <center><b>CARRITOS DE CLIENTES</b></center>
            </h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="pagination justify-content-end">
                    {{ $carritos->links() }}
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
                            <th>Total Bs</th>
                            <th>Estado Del Carrito</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $valor = 1;
                        ?>
                        @foreach ($carritos as $carrito)
                            @foreach ($clientes as $cliente)
                                @if ($carrito->idCliente == $cliente->id)
                                    <tr>
                                        <th scope="row">{{ $valor++ }}</th>
                                        <td>{{ $cliente->name }}</td>
                                        <td>{{ $cliente->email }}</td>
                                        <td>{{ $cliente->ci }}</td>
                                        <td>{{ $cliente->sexo }}</td>
                                        <td>{{ $cliente->celular }}</td>
                                        <td>{{ $carrito->total }}</td>
                                        <td>{{ $carrito->estado }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('carritosClientes.edit', $carrito->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagination justify-content-end">
            {{ $carritos->links() }}
        </div>
    </div>
@endsection
