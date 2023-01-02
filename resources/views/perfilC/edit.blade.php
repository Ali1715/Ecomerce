@extends('cliente.cliente')
@section('content')
    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1>Formulario - Editar Perfil</h1>
        </div>
        <div class="card-header d-inline-flex">
            <a href="{{ route('perfil.index') }}" class="primary-btn order-submit">
                <i class="fa fa-arrow-left"></i>
                Volver</a>
        </div>
        <br>
        <div class="card-body">
            <form action="{{ route('perfil.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data"
                id="update">
                @method('PUT')
                @include('perfilC.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <Button class="primary-btn order-submit" form="update">
                <i class="fa fa-pencil"></i> Editar
            </Button>
            <a class="primary-btn order-submit" href="{{ route('password.edit', auth()->user()->id) }}">
                {{ __('Cambiar Contraseña') }} <i class="fa fa-arrow-right"></i>
            </a>
        </div>
    </div>
@endsection
