@csrf
<div class="row">
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="name" class="form-control" name="name"
                value="{{ isset($perfil) ? $perfil->name : old('name') }}">
            <label>Nombre</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="number" placeholder="ci" class="form-control" name="ci"
                value="{{ isset($perfil) ? $perfil->ci : old('ci') }}">
            <label>CI</label>
        </div>
    </div>
    <div class="col-12">
        <h5>Género</h5>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="M"
                @if ((isset($perfil) ? $perfil->sexo : old('sexo')) == 'M') checked @endif>
            <label class="form-check-label" for="flexRadioDefault1">
                Masculine
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="F"
                @if ((isset($perfil) ? $perfil->sexo : old('sexo')) == 'F') checked @endif>
            <label class="form-check-label" for="flexRadioDefault2">
                Female
            </label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="number" placeholder="celular" class="form-control" name="celular"
                value="{{ isset($perfil) ? $perfil->celular : old('celular') }}">
            <label>Teléfono</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="domicilio" class="form-control" name="domicilio"
                value="{{ isset($perfil) ? $perfil->domicilio : old('domicilio') }}">
            <label>Domicilio</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="email" placeholder="email" class="form-control" name="email"
                value="{{ isset($perfil) ? $perfil->email : old('email') }}">
            <label>E-Mail</label>
        </div>
    </div>
    @if ($perfil->tipoc == 1)
        <input type="hidden" name="tipoc" class="form-control" id="exampleInputPassword1" value="1">
        <input type="hidden" name="tipoe" class="form-control" id="exampleInputPassword1" value="0">
    @else
        <div class="col-12">
            <h5>Estado</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="estadoemp" id="flexRadioDefault1" value="Inactivo"
                    @if ((isset($perfil) ? $perfil->estadoemp : old('estadoemp')) == 'Inactivo') checked @endif>
                <label class="form-check-label" for="flexRadioDefault1">
                    Inactivo
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="estadoemp" id="flexRadioDefault1" value="Activo"
                    @if ((isset($perfil) ? $perfil->estadoemp : old('estadoemp')) == 'Activo') checked @endif>
                <label class="form-check-label" for="flexRadioDefault1">
                    Activo
                </label>
            </div>
        </div>
        <input type="hidden" name="tipoc" class="form-control" id="exampleInputPassword1" value="0">
        <input type="hidden" name="tipoe" class="form-control" id="exampleInputPassword1" value="1">
    @endif

</div>
