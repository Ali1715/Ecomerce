@extends('cliente.cliente')
@section('content')
    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1>Formulario - Cambiar Password</h1>
        </div>
        <div class="card-header d-inline-flex">
            <a href="{{ route('password.index') }}" class="primary-btn order-submit">
                <i class="fa fa-arrow-left"></i>
                Volver</a>
        </div>
        <br>
        <div class="card-body">
            <form action="{{ route('password.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data"
                id="update">
                @method('PUT')
                @include('perfilC.partials.formPass')
            </form>
        </div>
        <div class="card-footer">
            <Button class="primary-btn order-submit" form="update">
                <i class="fa fa-pencil"></i> Cambiar
            </Button>
        </div>
    </div>
@endsection
