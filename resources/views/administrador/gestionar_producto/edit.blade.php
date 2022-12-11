@extends('administrador.admin')

@section('content')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-110">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4">
                            <h1 class="h2">Modificar Producto</h1>
                            <p class="lead">
                                Asegurese de ingresar los datos correctos
                            </p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <!--route de form -->
                                    <form action="{{ route('producto.update', $producto->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <!--  {{ csrf_field() }}  -->
                                        <!--  -->
                                        <div class="mb-3">
                                            <label class="form-label">Nombre</label>
                                            <input class="form-control form-control-lg" type="text" name="name"
                                                value="{{ $producto->name }}" placeholder="Ingrese el nombre del producto" />
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Descripcion</label>
                                            <input class="form-control form-control-lg" type="text" name="descripcion"
                                                value="{{ $producto->descripcion }}" placeholder="Ingrese una descripcion" />
                                            @error('descripcion')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Stock</label>
                                            <input class="form-control form-control-lg" type="integer" name="stock"
                                                value="{{ $producto->stock }}" placeholder="" />
                                            @error('stock')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Precio</label>
                                            <input class="form-control form-control-lg" type="decimal" name="precioUnitario"
                                                value="{{ $producto->precioUnitario }}" placeholder="00.00" />
                                            @error('precioUnitario')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Categoria</label>
                                            <select name="idcategoria" class="form-control">
                                                @foreach ($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}"
                                                        @if ($categoria->id == $producto->idcategoria) selected @endif>
                                                        {{ $categoria->nombre }}
                                                    </option>
                                                @endforeach
                                                <option value=""> Seleccione Una Categoria... </option>
                                            </select>
                                            @error('idcategoria')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Marca</label>
                                            <select name="idmarca" class="form-control">
                                                @foreach ($marcas as $marca)
                                                    <option value="{{ $marca->id }}"
                                                        @if ($marca->id == $producto->idmarca) selected @endif>
                                                        {{ $marca->nombre }}
                                                    </option>
                                                @endforeach
                                                <option value=""> Seleccione Una Marca... </option>
                                            </select>
                                            @error('idmarca')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Imagen</label>
                                            <input class="form-control" type="file" name="imagen" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Promoción - Descuento</label>
                                            <select name="idpromocion" class="form-control">
                                                <option value=""> Seleccione Una Promocion... </option>
                                                @foreach ($promociones as $promocion)
                                                    <option value="{{ $promocion->id }}"
                                                        @if ($promocion->id == $producto->idpromocion) selected @endif>
                                                        - {{ $promocion->descuento }} %
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('idpromocion')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Guardar</button>
                                            <a href="{{ url('administrador/producto') }}"
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
