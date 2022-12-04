@csrf
<div class="row">
    <div class="card-header d-inline-flex">
        <h1>Address</h1>
    </div>
    <div class="col-12">
        @foreach ($direcciones as $direccion)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="id_direccion" id="flexRadioDefault1"
                    value={{ $direccion->id }}>
                <label class="form-check-label" for="flexRadioDefault1">
                    {{ $direccion->address_1, $direccion->address_2}}, {{$direccion->city}}, {{$direccion->department }}
                </label>
            </div>
        @endforeach
    </div>
    <div class="card-header d-inline-flex">
        <a href="{{ route('AddressClient.create') }}" class="btn btn-primary ml-auto">
            <i class="fa fa-plus"></i>
            Nueva Direccion</a>
    </div><br>
    <div class="card-header d-inline-flex">
        <h1>Transferencia por {{ $tipoPago->nombre }}</h1>
    </div>
    <div class="col-12">
        <label>Número de cuenta o de telefono a depositar</label>
        <div class="form-floating">
            <input type="number" placeholder="cta" class="form-control" name="cta"
                value="{{ isset($tipoPago) ? $tipoPago->nroCta : old('nroCta') }}" disabled>
        </div>
    </div>
    <br>
    <div class="col-12">
        <label>Identificación de la cuenta (número de cuenta, teléfono, ci)</label>
        <div class="form-floating">
            <input type="number" placeholder="Ingrese la identificación de su cuenta" class="form-control"
                name="ctaOrd" value="{{ isset($pago) ? $pago->ctaOrd : old('ctaOrd') }}">
        </div>
    </div>
    <br>
    <div class="col-12">
        <label>ID de transacción</label>
        <div class="form-floating">
            <input type="number" placeholder="Ingrese el ID de transacción" class="form-control" name="idTrans"
                value="{{ isset($pago) ? $pago->idTrans : old('idTrans') }}">
        </div>
    </div>
    <?php
    date_default_timezone_set('America/La_Paz');
    $dateTime = date('Y-m-d H:i:s');
    $costoEnv = 150;
    $total = $carrito->total + $costoEnv;
    ?>
    <div class="col-12">
        <h1>-----------------------------------------------------------------------</h1>
        <h5>Costo total de productos = {{ $carrito->total }} Bs </h5>
        <h5>(ver detalles de productos en su carrito)</h5>
        <h5>Costo de envío = {{ $costoEnv }} Bs</h5>
        <h5>Monto total a cancelar = {{ $total }} Bs</h5>
        <h1>-----------------------------------------------------------------------</h1>
    </div>
    @if ((isset($tipoPago->qr) ? $tipoPago->qr : '') == '')
    @else
        <label>Opción de pago por QR habilitado</label>
        <br>
        <div class="col-md-4 col-xs-6">
            <div class="product">
                <div class="product-img">
                    <img src="{{ asset('public/img/' . $tipoPago->qr) }}" alt="...">
                </div>
            </div>
        </div>
    @endif
    <input type="hidden" name="costoEnv" class="form-control" id="exampleInputPassword1" value="{{ $costoEnv }}">
    <input type="hidden" name="fechaHora" class="form-control" id="exampleInputPassword1" value="{{ $dateTime }}">
    <input type="hidden" name="monto" class="form-control" id="exampleInputPassword1" value="{{ $total }}">
</div>
<br>
