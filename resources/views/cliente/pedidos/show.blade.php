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
                    <a href="{{ route('pedidosCliente.index') }}" class="btn btn-primary ml-auto">
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
                            <th>Monto Total</th>
                            <td>{{$carritoCliente->total}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagination justify-content-end">
            {{ $detallesCarritos->links() }}
        </div>
    </div>
@endsection
