@extends('cliente.cliente')
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Pedidos</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li class="active">Pedidos Realizados</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-header d-inline">
                <div class="card-header d-inline-flex">
                    <a href="{{ url('/home') }}" class="primary-btn order-submit">
                        <i class="fa fa-arrow-left"></i>
                        Volver</a>
                </div>
            </div>
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
                                                    class="btn btn-primary"><i class="fa fa-align-justify"></i> Detalles</a>
                                            </div>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('pedidosCliente.edit', $pedido->id) }}"
                                                    class="btn btn-primary"><i class="fa fa-file"></i> Factura</a>
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
