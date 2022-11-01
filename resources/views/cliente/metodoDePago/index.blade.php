@extends('cliente.cliente')
@section('content')
    <div class="d-table-cell align-middle">
        <div class="text-center mt-4">
            <h1 class="h2">Elegir un tipo de pago</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="m-sm-4">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                @foreach ($tiposPagos as $tipoPago)
                                    <tr>
                                        <td>{{ $tipoPago->nombre }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('pagos.show', $tipoPago->id) }}"
                                                    class="btn btn-primary"><i class="fa fa-check"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
