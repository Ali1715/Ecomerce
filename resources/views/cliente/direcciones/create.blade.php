@extends('cliente.cliente')

@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Crear Direccion</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li>Direcciones</li>
                        <li class="active">Crear</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-110" >
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4">
                            <h1 class="h2">Agregar Nueva Dirección</h1>
                            <p class="lead">
                                Asegurese de ingresar los datos correctos
                            </p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <!--route de form -->
                                    <form action="{{ route('AddressClient.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <!--  {{ csrf_field() }}  -->
                                        <!--  -->
                                        <div class="mb-3">
                                            <label class="form-label">Address 1</label>
                                            <input class="input" type="text" name="address_1"
                                                placeholder="Street Address" />
                                            @error('address_1')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="mb-3">
                                            <label class="form-label">Address 2</label>
                                            <input class="input" type="text" name="address_2"
                                                placeholder="Street Address Line 2" />
                                            @error('address_2')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="mb-3">
                                            <label class="form-label">Ciudad</label>
                                            <input class="input" type="text" name="city"
                                                placeholder="Street Address" />
                                            @error('city')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="mb-3">
                                            <label class="form-label">Departamento</label>
                                            <select name="department" class="form-control">
                                                <option value="Beni">Beni</option>
                                                <option value="Pando">Pando</option>
                                                <option value="La Paz">La Paz</option>
                                                <option value="Oruro">Oruro</option>
                                                <option value="Tarija">Tarija</option>
                                                <option value="Santa Cruz">Santa Cruz</option>
                                                <option value="Chuquisaca">Chuquisaca</option>
                                                <option value="Potosí">Potosí</option>
                                                <option value="Cochabamba">Cochabamba</option>
                                                <option selected value=""> Seleccione Un Departamento... </option>
                                            </select>
                                            @error('department')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input class="input" type="hidden" name="country" placeholder=""
                                                value="Bolivia" />
                                            @error('country')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="mb-3">
                                            <label class="form-label">Código Postal</label>
                                            <input class="input" type="text" name="postal_code"
                                                placeholder="Ingrese el código postal" />
                                            @error('postal_code')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input class="input" type="hidden" name="id_client" value={{ $id }}>
                                            @error('id_client')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="text-center mt-3">
                                            <a href="{{ url('cliente/AddressClient') }}"
                                                class="primary-btn order-submit"><i class="fa fa-arrow-left"></i>
                                                Volver</a>
                                            <button type="submit" class="primary-btn order-submit"><i
                                                    class="fa fa-edit"></i> Guardar</button>
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
