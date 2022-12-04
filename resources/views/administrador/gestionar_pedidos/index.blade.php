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
                        <center><b>PEDIDOS</b></center>
                    </h1>
                </div>
                <div class="pagination justify-content-end">
                    {!! $pedidos->links() !!}
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha - Hora Realizada</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Fecha De Envío</th>
                            <th>Fecha De Entrega</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->fechaHora }}</td>
                                <td>{{ $pedido->total }}</td>
                                <td>{{ $pedido->estado }}</td>
                                <td>{{ $pedido->fechaEnvio }}</td>
                                <td>{{ $pedido->fechaEntrega }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('administrador/pedidos/' . $pedido->id . '/edit') }}"
                                            class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ url('administrador/pedidos/' . $pedido->id . '/show') }}"
                                            class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-end">
                    {!! $pedidos->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
