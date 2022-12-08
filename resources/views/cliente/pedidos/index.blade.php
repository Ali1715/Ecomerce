@extends('cliente.cliente')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline">
            <h1>
                <center><b>Pedidos Realizados</b></center>
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
                            <th>ID</th>
                            <th>Fecha - Hora</th>
                            <th>Estado</th>
                            <th>Fecha De Envío</th>
                            <th>Fecha De Entrega</th>
                            <th>Total Pagado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $valor = 1;
                        ?>
                        @foreach ($carritos as $carrito)
                            @foreach ($pedidos as $pedido)
                                @if ($carrito->id == $pedido->id_carrito and $carrito->estado == 0)
                                    <tr>
                                        <th scope="row">{{ $valor++ }}</th>
                                        <td>{{ $pedido->fechaHora }}</td>
                                        <td>{{ $pedido->estado }}</td>
                                        <td>{{ $pedido->fechaEnvio }}</td>
                                        <td>{{ $pedido->fechaEntrega }}</td>
                                        <td>{{ $pedido->total }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('pedidosCliente.show', $pedido->id) }}"
                                                    class="btn btn-primary">Detalles</a>
                                            </div>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('pedidosCliente.edit', $pedido->id) }}"
                                                    class="btn btn-primary">Factura</a>
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
