@include('layouts.messages')
@csrf
<div class="row">
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="name" class="form-control" name="name"
                value="{{ isset($cliente) ? $cliente->name : old('name') }}">
            <label>Nombre</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="number" placeholder="ci" class="form-control" name="ci"
                value="{{ isset($cliente) ? $cliente->ci : old('ci') }}">
            <label>CI</label>
        </div>
    </div>
    <div class="col-12">
        <h5>Género</h5>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="M"
                @if ((isset($cliente->sexo) ? $cliente->sexo : old('sexo')) == 'M') checked @endif>
            <label class="form-check-label" for="flexRadioDefault1">
                Masculine
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="F"
                @if ((isset($cliente->sexo) ? $cliente->sexo : old('sexo')) == 'F') checked @endif>
            <label class="form-check-label" for="flexRadioDefault2">
                Female
            </label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="number" placeholder="celular" class="form-control" name="celular"
                value="{{ isset($cliente) ? $cliente->celular : old('celular') }}">
            <label>Teléfono</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="domicilio" class="form-control" name="domicilio"
                value="{{ isset($cliente) ? $cliente->domicilio : old('domicilio') }}">
            <label>Domicilio</label>
        </div>
    </div>
    <div class="col-12">
        <h5>Estado</h5>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="estadocli" id="flexRadioDefault1" value="Inactivo"
                @if ((isset($cliente->estadocli) ? $cliente->estadocli : old('estadocli')) == 'Inactivo') checked @endif>
            <label class="form-check-label" for="flexRadioDefault1">
                Inactivo
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="estadocli" id="flexRadioDefault1" value="Activo"
                @if ((isset($cliente->estadocli) ? $cliente->estadocli : old('estadoemp')) == 'Activo') checked @endif>
            <label class="form-check-label" for="flexRadioDefault1">
                Activo
            </label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="email" placeholder="email" class="form-control" name="email"
                value="{{ isset($cliente) ? $cliente->email : old('email') }}">
            <label>E-Mail</label>
        </div>
    </div>
    @if ((isset($cliente->id) ? $cliente->id : '') == '')
        <div class="col-12">
            <div class="form-floating">
                <input type="password" placeholder="password" class="form-control" name="password"
                    value="{{ isset($cliente) ? $cliente->password : old('password') }}">
                <label>Contraseña</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
                <input type="password" placeholder="password_confirmation" class="form-control"
                    name="password_confirmation" value="{{ isset($cliente) ? $cliente->password : old('password') }}">
                <label>Confirmar Contraseña</label>
            </div>
        </div>
    @endif
    <input type="hidden" name="tipoc" class="form-control" id="exampleInputPassword1" value="1">
    <input type="hidden" name="tipoe" class="form-control" id="exampleInputPassword1" value="0">
</div>
