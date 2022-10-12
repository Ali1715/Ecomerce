@extends('administrador.admin')
@section('content')
    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1>Formulario - Editar Perfil</h1>
        </div>
        <div class="card-header d-inline-flex">
            <a href="{{ route('perfil.index') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>
        <div class="card-body">
            <form action="{{ route('perfil.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data"
                id="update">
                @method('PUT')
                @include('perfil.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <Button class="btn btn-primary" form="update">
                <i class="fas fa-pencil-alt"></i> Editar
            </Button>
        </div>
    </div>
@endsection
