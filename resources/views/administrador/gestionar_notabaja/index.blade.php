@extends('administrador.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <main class="d-flex w-100">
                <div class="container d-flex flex-column">
                    <div class="row vh-110">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        <form action="{{ route('notaBaja.store') }}" method="POST"
                                            enctype="multipart/form-data" id="create">
                                            @csrf
                                            <!--  {{ csrf_field() }}  -->
                                            <?php
                                            date_default_timezone_set('America/La_Paz');
                                            $fechaHora = date('Y-m-d H:i:s');
                                            $idempleado = auth()->user()->id;
                                            ?>
                                            <input value="0" type="hidden" name="total" />
                                            <input value="{{ $idempleado }}" type="hidden" name="idempleado" />
                                            <input value="{{ $fechaHora }}" type="hidden" name="fechaHora" />
                                        </form>
                                        <button type="submit" class="btn btn-lg btn-primary" form="create">
                                            <i class="fa fa-plus"></i>
                                        Agregar Nota De Baja</button>
                                    </div>
                                    <div class="pagination justify-content-end">
                                        {{ $notasBaja->links() }}
                                    </div>
                                </div>
                                <table class="table table-bordered border-primary align-middle">
                                    <div class="m-sm-4">
                                        <h1 class="h2">Notas De Baja</h1>
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">FechaHora</th>
                                                <th scope="col">Trabajador</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            @foreach ($notasBaja as $notaBaja)
                                                <tr>
                                                    <td>{{ $notaBaja->id }}</td>
                                                    <td>{{ $notaBaja->fechaHora }}</td>
                                                    @foreach ($empleados as $empleado)
                                                        @if ($empleado->id == $notaBaja->idempleado)
                                                            <td>{{ $empleado->name }}</td>
                                                        @endif
                                                    @endforeach
                                                    <td>{{ $notaBaja->total }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="{{ url('administrador/notaBaja/' . $notaBaja->id . '/edit') }}"
                                                                class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                            <a href="{{ route('notaBaja.show', $notaBaja->id) }}"
                                                                class="btn btn-dark"><i class="fas fa-eye"></i></a>
                                                            <button type="submit" class="btn btn-danger"
                                                                form="delete_{{ $notaBaja->id }}"
                                                                onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                            <form action="{{ route('notaBaja.destroy', $notaBaja->id) }}"
                                                                id="delete_{{ $notaBaja->id }}" method="POST"
                                                                enctype="multipart/form-data" hidden>
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </div>
                                </table>
                                <div class="row">
                                    <div class="pagination justify-content-end">
                                        {{ $notasBaja->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
