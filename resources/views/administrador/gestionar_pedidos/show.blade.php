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
                <div class="card-header d-inline">
                    <h1>
                        <center><b>DETALLE - PEDIDO</b></center>
                    </h1>
                </div>
                <div class="pagination justify-content-end">
                    {!! $detallesCarritos->links() !!}
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detallesCarritos as $detalleCarrito)
                            @foreach ($productos as $producto)
                                @if ($detalleCarrito->idProducto == $producto->id)
                                    <tr>
                                        <td>{{ $producto->name }}</td>
                                        <td>{{ $detalleCarrito->cantidad }}</td>
                                        <td>{{ $detalleCarrito->precio }}</td>
                                        <td>{{ $detalleCarrito->cantidad * $detalleCarrito->precio }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-end">
                    {!! $detallesCarritos->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
