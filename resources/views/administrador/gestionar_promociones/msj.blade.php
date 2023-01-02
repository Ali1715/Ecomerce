@extends('administrador.admin')

@section('content')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-110">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="text-center mt-3">
                    </div>
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4">
                            <h1 class="h2">Mensaje - Promoción {{ $promocion->descuento }}%</h1>
                            <p class="lead">
                                Asegurese de ingresar los datos correctos
                            </p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <!--route de form -->
                                    <form action="{{ route('promoMail.update', $promocion->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <!--  {{ csrf_field() }}  -->
                                        <!--  -->
                                        <div class="mb-3">
                                            <label class="form-label">Cuerpo del mensaje</label>
                                            <div class="form-control">
                                                <textarea class="input" placeholder="Mensaje" name="mensaje" rows="3" cols="60"></textarea>
                                            </div>
                                            @error('mensaje')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!--
                                            <div class="mb-3">
                                                <label class="form-label">Imagen</label>
                                                <input class="form-control" type="file" name="imagen" />
                                            </div>
                                        -->
                                        <div class="mb-3">
                                            <label class="form-label">Enviar a:</label>
                                            <select name="idcliente" class="form-control">
                                                <option selected value=""> Seleccione Un Cliente... </option>
                                                <option value="todos"> Enviar a todos los clientes </option>
                                                @foreach ($clientes as $cliente)
                                                    <option value="{{ $cliente->id }}">
                                                        {{ $cliente->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('idcliente')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <input type="hidden" name="idpromocion" class="form-control"
                                            value="{{ $promocion->id }}" />
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Enviar
                                                <i class="fas fa-envelope"></i>
                                            </button>
                                            <a href="{{ url('administrador/promociones') }}"
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
