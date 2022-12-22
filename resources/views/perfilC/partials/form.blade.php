@csrf
<div class="row">
    <div class="billing-details">
        <div class="col-md-10">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" placeholder="name" class="input" name="name"
                    value="{{ isset($perfil) ? $perfil->name : old('name') }}">
            </div>
        </div>
        <div class="col-md-10">
            <div class="form-group">
                <label>CI</label>
                <input type="number" placeholder="ci" class="input" name="ci"
                    value="{{ isset($perfil) ? $perfil->ci : old('ci') }}">
            </div>
        </div>
        <div class="col-md-10">
            <br>
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
            <br>
        </div>
        <div class="col-md-10">
            <div class="form-group">
                <label>Teléfono</label>
                <input type="number" placeholder="celular" class="input" name="celular"
                    value="{{ isset($perfil) ? $perfil->celular : old('celular') }}">
            </div>
        </div>
        <div class="col-md-10">
            <div class="form-group">
                <label>Domicilio</label>
                <input type="text" placeholder="domicilio" class="input" name="domicilio"
                    value="{{ isset($perfil) ? $perfil->domicilio : old('domicilio') }}">
            </div>
        </div>
        <div class="col-md-10">
            <div class="form-group">
                <label>E-Mail</label>
                <input type="email" placeholder="email" class="input" name="email"
                    value="{{ isset($perfil) ? $perfil->email : old('email') }}">
            </div>
        </div>
        @if ($perfil->tipoc == 1)
            <input type="hidden" name="tipoc" class="input" id="exampleInputPassword1" value="1">
            <input type="hidden" name="tipoe" class="input" id="exampleInputPassword1" value="0">
        @else
            <div class="col-md-10">
                <h5>Estado</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="estadoemp" id="flexRadioDefault1"
                        value="Inactivo" @if ((isset($perfil) ? $perfil->estadoemp : old('estadoemp')) == 'Inactivo') checked @endif>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Inactivo
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="estadoemp" id="flexRadioDefault1"
                        value="Activo" @if ((isset($perfil) ? $perfil->estadoemp : old('estadoemp')) == 'Activo') checked @endif>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Activo
                    </label>
                </div>
            </div>
            <input type="hidden" name="tipoc" class="input" id="exampleInputPassword1" value="0">
            <input type="hidden" name="tipoe" class="input" id="exampleInputPassword1" value="1">
        @endif
    </div>
</div>
