@extends('administrador.admin')

@section('content')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-110">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4">
                            <h1 class="h2">Modificar Nota De Baja</h1>
                            <p class="lead">
                                Asegurese de ingresar los datos correctos
                            </p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <!--route de form -->
                                    <form action="{{ route('notaBaja.update', $notaBaja->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <!--  {{ csrf_field() }}  -->
                                        <div class="mb-3">
                                            <label class="form-label">Trabajadores</label>
                                            <select name="idempleado" class="form-control">
                                                @foreach ($empleados as $empleado)
                                                    <option value="{{ $empleado->id }}"
                                                        @if ($empleado->id == $notaBaja->idempleado) selected @endif>
                                                        {{ $empleado->name }}
                                                    </option>
                                                @endforeach
                                                <option value=""> Seleccione Un Trabajador... </option>
                                            </select>
                                            @error('idempleado')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-pencil-alt"></i> Guardar</button>
                                            <a href="{{ url('administrador/notaBaja') }}"
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
