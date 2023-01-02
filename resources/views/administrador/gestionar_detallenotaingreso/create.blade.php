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
                            <h1 class="h2">Agregar Detalle De Nota De Ingreso</h1>
                            <p class="lead">
                                Asegurese de ingresar los datos correctos
                            </p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <!--route de form -->
                                    <form action="{{ route('detalleNotaIngreso.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <!--  {{ csrf_field() }}  -->
                                        <!--  -->
                                        <div class="mb-3">
                                            <label class="form-label">Producto</label>
                                            <select name="idproducto" class="form-control">
                                                @foreach ($productos as $producto)
                                                    <option value="{{ $producto->id }}">
                                                        {{ $producto->name }}
                                                    </option>
                                                @endforeach
                                                <option selected value=""> Seleccione Un Producto... </option>
                                            </select>
                                            @error('idproducto')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Cantidad</label>
                                            <input class="form-control form-control-lg" type="integer" name="cantidad"
                                                placeholder="Ingrese la cantidad de productos" />
                                            @error('cantidad')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Costo Del Producto</label>
                                            <input class="form-control form-control-lg" type="double" name="costo"
                                                placeholder="Ingrese el costo del producto" />
                                            @error('costo')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <input value="0" type="hidden" name="total"/>
                                        <input value="{{$notaIng->id}}" type="hidden" name="idnotaing"/>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-plus"></i>
                                                Guardar</button>
                                            <a href="{{ url('administrador/notaIngreso') }}"
                                                class="btn btn-primary float-end"><i class="fa fa-arrow-left"></i> Volver</a>
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
