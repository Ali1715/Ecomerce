@csrf
@include('layouts.messages')
<div class="row">
    <h5>Productos</h5>
    <div class="col-12">
        @if ((isset($detalleCarrito->id) ? $detalleCarrito->id : '') == '')
            <select name="idProducto" class="form-control">
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->name }}
                    </option>
                @endforeach
                <option selected value=""> Seleccione Una Producto... </option>
            </select>
        @else
            <select name="idProducto" class="form-control">
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}" @if ($detalleCarrito->idProducto == $producto->id) selected @endif>
                        {{ $producto->name }}
                    </option>
                @endforeach
            </select>
        @endif
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="number" placeholder="cantidad" class="form-control" name="cantidad"
                value="{{ isset($detalleCarrito) ? $detalleCarrito->cantidad : old('cantidad') }}">
            <label>Cantidad</label>
        </div>
    </div>
    <input type="hidden" name="precio" class="form-control" id="exampleInputPassword1" value="0">
    <input type="hidden" name="idCarrito" class="form-control" id="exampleInputPassword1" value="{{ $carrito->id }}">
</div>
