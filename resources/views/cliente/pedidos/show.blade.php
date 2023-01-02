@extends('cliente.cliente')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline">
            <h1>
                <center><b>Detalles - Pedido</b></center>
            </h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <a href="{{ route('pedidosCliente.index') }}" class="primary-btn order-submit">
                        <i class="fa fa-arrow-left"></i>
                        Volver</a>
                </div>
                <div class="pagination justify-content-end">
                    {{ $detallesCarritos->links() }}
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio (Bs)</th>
                            <th>Total (Bs)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $valor = 1;
                        ?>
                        @foreach ($detallesCarritos as $detalleCarrito)
                            @foreach ($productos as $producto)
                                @if ($detalleCarrito->idProducto == $producto->id)
                                    <tr>
                                        <th scope="row">{{ $valor++ }}</th>
                                        <td>{{ $producto->name }}</td>
                                        <td>{{ $detalleCarrito->cantidad }}</td>
                                        <td>{{ $detalleCarrito->precio }}</td>
                                        <td>{{ $detalleCarrito->cantidad * $detalleCarrito->precio }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Costo De Envío</th>
                            <td>150</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Monto Total</th>
                            <td>{{ $carritoCliente->total + 150 }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-header d-inline">
            <h1>
                <center><b>Dirección</b></center>
            </h1>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Dirección 1</th>
                                <th>Dirección 2</th>
                                <th>Ciudad</th>
                                <th>Departamento</th>
                                <th>Bolivia</th>
                                <th>Código Postal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $valor = 1;
                            ?>
                            <tr>
                                <th scope="row">{{ $valor++ }}</th>
                                <td>{{ $direccion->address_1 }}</td>
                                <td>{{ $direccion->address_2 }}</td>
                                <td>{{ $direccion->city }}</td>
                                <td>{{ $direccion->department }}</td>
                                <td>{{ $direccion->country }}</td>
                                <td>{{ $direccion->postal_code }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="pagination justify-content-end">
            {{ $detallesCarritos->links() }}
        </div>
    </div>
@endsection
