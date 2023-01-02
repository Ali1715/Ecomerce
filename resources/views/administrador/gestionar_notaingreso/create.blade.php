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
                            <h1 class="h2">Agregar Nueva Nota De Ingreso</h1>
                            <p class="lead">
                                Asegurese de ingresar los datos correctos
                            </p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <!--route de form -->
                                    <form action="{{ route('notaIngreso.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <!--  {{ csrf_field() }}  -->
                                        <!--  -->
                                        <div class="mb-3">
                                            <label class="form-label">Proveedor</label>
                                            <select name="idproveedor" class="form-control">
                                                @foreach ($proveedores as $proveedor)
                                                    <option value="{{ $proveedor->id }}">
                                                        {{ $proveedor->nombre }}
                                                    </option>
                                                @endforeach
                                                <option selected value=""> Seleccione Un Proveedor... </option>
                                            </select>
                                            @error('idproveedor')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <?php 
                                        date_default_timezone_set('America/La_Paz');
                                        $fechaHora = date('Y-m-d H:i:s');
                                        $idempleado = auth()->user()->id;
                                        ?>
                                        <input value="0" type="hidden" name="total"/>
                                        <input value="{{$idempleado}}" type="hidden" name="idempleado"/>
                                        <input value="{{$fechaHora}}" type="hidden" name="fechaHora"/>
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
