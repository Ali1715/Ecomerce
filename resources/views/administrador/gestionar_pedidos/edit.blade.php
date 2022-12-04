@extends('administrador.admin')

@section('content')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-110">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4">
                            <h1 class="h2">Modificar Pedido</h1>
                            <p class="lead">
                                Asegurese de ingresar los pedidos correctos
                            </p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <!--route de form -->
                                    <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <!--  {{ csrf_field() }}  -->
                                        <!--  -->
                                        <div class="mb-3">
                                            <label class="form-label">Fecha - Hora Realizada</label>
                                            <input class="form-control form-control-lg" type="dateTime" name="fechaHora"
                                                value="{{ $pedido->fechaHora }}"
                                                placeholder="Ingrese la fecha y la hora en que se realiz+o el pedido" />
                                            @error('fechaHora')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Total</label>
                                            <input class="form-control form-control-lg" type="double" name="total"
                                                value="{{ $pedido->total }}"
                                                placeholder="Ingrese el monto total del pedido" />
                                            @error('total')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Estado</label>
                                            <select name="estado" class="form-control">
                                                <option value="{{$pedido->estado}}">{{$pedido->estado}}</option>
                                                <option value="Pendiente">Pendiente</option>
                                                <option value="Enviado">Enviado</option>
                                                <option value="Pagado">Pagado</option>
                                                <option value="Cancelado">Cancelado</option>
                                                <option value="Completado">Completado</option>
                                                <option value=""> Seleccione Un Estado... </option>
                                            </select>
                                            @error('estado')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Fecha De Envío</label>
                                            <input class="form-control form-control-lg" type="date" name="fechaEnvio"
                                                value="{{ $pedido->fechaEnvio }}"
                                                placeholder="Ingrese la fecha de envio del pedido" />
                                            @error('fechaEnvio')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Fecha De Entrega</label>
                                            <input class="form-control form-control-lg" type="date" name="fechaEntrega"
                                                value="{{ $pedido->fechaEntrega }}"
                                                placeholder="Ingrese la fecha de entrega del pedido" />
                                            @error('fechaEntrega')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Guardar</button>
                                            <a href="{{ url('administrador/pedidos') }}"
                                                class="btn btn-primary float-end">Volver</a>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
